<?php
session_start();
include("connection.php");




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate email
    if (empty($email)) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    }

    // Validate password
    if (empty($password)) {
        $password_err = "Please enter your password.";
    }

    // If there are no validation errors
    if (empty($email_err) && empty($password_err)) {
        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT user_id, roles, pass FROM users WHERE email = ?");
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_id, $role, $hashed_password);
                if ($stmt->fetch()) {
                    // Verify the password (hashed password comparison)
                    if ($password == $hashed_password) {
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
                        echo "<script>
                        if(confirm('Invalid email or password')){
                        window.location.href = 'login.php';

                    }
                                             </script>";
                        $login_err = "Invalid email or password.";
                    }
                }
            } else {
                echo "<script>
                if(confirm('Invalid email or password')){
                window.location.href = 'login.php';

            }
                                     </script>";
                $login_err = "Invalid email or password.";            }

            // Close statement
            $stmt->close();
        } else {
            echo "<script>
            if(confirm('Invalid email or password')){
            window.location.href = 'login.php';

        }
                                 </script>";
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close connection
    $conn->close();
}
?>
