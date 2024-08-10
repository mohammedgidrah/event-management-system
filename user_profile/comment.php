<?php
include '../connection.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $comment = $_POST['comment'];
    $sql = "INSERT INTO reviews (user_id, comment) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $comment);
    if ($stmt->execute()) {
        header("Location: index_user.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
