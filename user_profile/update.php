<?php
session_start();
$user_id = $_SESSION['user_id'];

include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // retrieve 
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!empty($password)) {
        $sql = "UPDATE users SET fname = ?, lname = ?, email = ?, password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $fname, $lname, $email, $password, $user_id);
    } else {
        $sql = "UPDATE users SET fname = ?, lname = ?, email = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $fname, $lname, $email, $user_id);
    }
    if ($stmt->execute()) {
        header("Location: index_user.php?user_id=$user_id");
        exit();
    } else {
        echo "err didnt update" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
include 'includes/footer.php';
?>
