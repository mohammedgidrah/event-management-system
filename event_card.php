<?php
include 'connection.php';
// include 'create_event.php';
// if(isset($_GET['event_id'])){
// $id = $_GET['event_id'];
// echo $id;
// }
// else{
    
//     echo "hi";
// }
$id=55;
$ticket_type_id = isset($_POST['ticket_type']) ? intval($_POST['ticket_type']) : 1;

// Fetch event details
$stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$event = $stmt->get_result()->fetch_assoc();

// Fetch event images
$stmt1 = $conn->prepare("SELECT image_url FROM event_images WHERE event_id = ?");
$stmt1->bind_param("i", $id);
$stmt1->execute();
$image = $stmt1->get_result()->fetch_assoc();

// Fetch ticket type and price
$stmt2 = $conn->prepare("SELECT ticket_prices.price, ticket_types.name FROM ticket_prices JOIN ticket_types ON ticket_prices.ticket_type_id = ticket_types.ticket_type_id WHERE ticket_prices.event_id = ? AND ticket_prices.ticket_type_id = ?");
$stmt2->bind_param("ii", $id, $ticket_type_id);
$stmt2->execute();
$ticket = $stmt2->get_result()->fetch_assoc();
$price = $ticket ? $ticket['price'] : 'not available';

// Fetch all ticket types for dropdown
$ticket_types_stmt = $conn->prepare("SELECT * FROM ticket_types");
$ticket_types_stmt->execute();
$ticket_types = $ticket_types_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['register'])) {
    // $user_id = $_GET['user_id'];
$user_id=72;
    $stmt3 = $conn->prepare("INSERT INTO tickets (event_id, user_id, ticket_price_id) SELECT ?, ?, ticket_price_id FROM ticket_prices WHERE event_id = ? AND ticket_type_id = ?");
    $stmt3->bind_param("iiii", $id, $user_id, $id, $ticket_type_id);
    if ($stmt3->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "err";
    }
    $stmt3->close();
}

$stmt->close();
$stmt1->close();
$stmt2->close();
$ticket_types_stmt->close();
$conn->close();

if (!$event) {
    $message = "No event found.";
    exit;
}

$formattedDateTime = date('Y-m-d\TH:i:s', strtotime($event['start_date'] . ' ' . $event['start_time']));
?>
