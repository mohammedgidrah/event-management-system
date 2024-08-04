<?php
session_start();
include ("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT user_id, roles, pass FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $role, $stored_password);
        $stmt->fetch();

        // Verify the password (plaintext comparison)
        if ($password == $stored_password) {
            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['roles'] = $role;

            // Redirect based on user role
            if ($role == "admin") {
                header("Location: index_dash.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
    