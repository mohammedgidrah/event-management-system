<?php
include("connection.php");

// $hashedPassword = password_hash($password, PASSWORD_BCRYPT);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['Fname'];
    $lastName = $_POST['Lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("INSERT INTO users (fname, lname , email,pass) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}






// Regex patterns for validation
$nameRegex = "/^[a-zA-Z]+(?:[' -][a-zA-Z]+)*$/";
$emailRegex = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
$passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

// Validate first name
if (!preg_match($nameRegex, $firstName)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Invalid first name.'
            });
            </script>";
    exit(); // Stop further execution if validation fails
}


// Validate last name
if (!preg_match($nameRegex, $lastName)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid last name.'
                });
                </script>";
    exit(); // Stop further execution if validation fails
}

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($emailRegex, $email)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid email address.'
                    });
                    </script>";
    exit(); // Stop further execution if validation fails
}

// Validate password
if (!preg_match($passwordRegex, $password)) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.'
                        });
                        </script>";
    exit(); // Stop further execution if validation fails
}



// If validation passes, hash the password and insert into the database

// Prepare and execute the SQL query
// include("db_connection.php");

