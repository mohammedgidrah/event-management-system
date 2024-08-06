<?php
// include("connection.php");

// $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $firstName = $_POST['Fname'];
//     $lastName = $_POST['Lname'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];


//     $stmt = $conn->prepare("INSERT INTO users (fname, lname , email,pass) VALUES (?, ?, ?,?)");
//     $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

//     if ($stmt->execute()) {
//         header("Location: login.php");
//         exit();
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
// }

session_start(); // Start a session

// Include your database connection file
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $fname = mysqli_real_escape_string($conn, $_POST['Fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['Lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the fname (username or first name) already exists in the database
    $check_stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE fname = ? and lname=?");
    $check_stmt->bind_param('ss', $fname, $lname);
    $check_stmt->execute();
    $check_stmt->bind_result($count);
    $check_stmt->fetch();
    $check_stmt->close();

    if ($count > 0) {
        echo "<script>
        alert('Error: The name '{$fname}  {$lname}' is already taken. Please choose a different name.');
        
        </script>";
        // If the fname already exists, handle the error
        // echo "Error: The name '{$fname}  {$lname}' is already taken. Please choose a different name.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (fname,lname, email, pass) VALUES (?, ?, ?,?)");
        $stmt->bind_param('ssss', $fname, $lname, $email, $password);

        if ($stmt->execute()) {
            // If signup is successful, log the user in

            // Retrieve the user ID of the newly created user
            $user_id = $stmt->insert_id;

            // Check if the user is an admin (if you're assigning roles at signup)
            // Otherwise, you can set it manually for testing purposes
            $role = 'user'; // Default role
            if ($email == 'admin@gmail.com') {
                $role = 'admin';
                // Optionally update the role in the database if not done during signup
                $update_stmt = $conn->prepare("UPDATE users SET roles = ? WHERE user_id = ?");
                $update_stmt->bind_param('si', $role, $user_id);
                $update_stmt->execute();
                $update_stmt->close();
            }

            // Store user information in session variables to log them in
            $_SESSION['user_id'] = $user_id;
            $_SESSION['Fname'] = $fname;
            $_SESSION['Lname'] = $lname;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;

            // Redirect based on the user's role
            if ($role === 'admin') {
                header("Location: index_dash.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            // Handle any errors during signup (e.g., duplicate email)
            echo "Error: Could not sign up. Please try again.";
        }

        $stmt->close(); // Close the prepared statement
        $conn->close(); // Close the database connection
    }
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Retrieve and sanitize form data
//     $fname = mysqli_real_escape_string($conn, $_POST['Fname']);
//     $lname = mysqli_real_escape_string($conn, $_POST['Lname']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);

//     // Hash the password for security
//     // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

//     // Insert the new user into the database
