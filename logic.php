<?php
session_start();
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT roles, pass FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($role, $pass);
        $stmt->fetch();

        if ($password == $pass) {
            $_SESSION=$_POST['user_id'];
            $_SESSION=$_POST['roles'];


            if ($role == "admin") {
                header("Location: index_dash.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }

    $stmt->close();
    $conn->close();
}
