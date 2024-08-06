<?php
session_start();
include '../connection.php';
$user_id = $_SESSION['user_id'];
// echo $user_id ;
// die();

$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$count_sql = "SELECT COUNT(*) AS ticket_count FROM tickets WHERE user_id = ?";
$count_stmt = $conn->prepare($count_sql);
$count_stmt->bind_param("i", $user_id);
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$count_row = $count_result->fetch_assoc();
$ticket_count = $count_row['ticket_count'];

$ticket_sql = "SELECT t.ticket_id, e.title AS event_title, t.date, tp.price, tt.name AS ticket_type
                FROM tickets t
                JOIN events e ON t.event_id = e.event_id
                JOIN ticket_prices tp ON t.ticket_price_id = tp.ticket_price_id
                JOIN ticket_types tt ON tp.ticket_type_id = tt.ticket_type_id
                WHERE t.user_id = ?";
$ticket_stmt = $conn->prepare($ticket_sql);
$ticket_stmt->bind_param("i", $user_id);
$ticket_stmt->execute();
$ticket_result = $ticket_stmt->get_result();

$conn->close();
?>
