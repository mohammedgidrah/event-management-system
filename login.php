<?php
session_start();
include("connection.php");
include("includes/header.php");




$login_err = $email_err = $password_err = "";  // Initialize error variables

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
                        header("Location: login.php");
                        $login_err = "Invalid email or password.";
                    }
                }
            } else {
                header("Location: login.php");
                $login_err = "Invalid email or password.";
            }

            // Close statement
            $stmt->close();
        } else {
            header("Location: login.php");
            $login_err = "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close connection
    $conn->close();
}


?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body class="login_body">
    <section class="text">login/signup</section>
    <section class="sctione_header">
        <section></section>
    </section>    
    <div class="container_login">
        <input type="checkbox" id="check">
        <div class="logins forms">


            <div class="login_div">


                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div>
                        <input placeholder="Email" type="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                        <span style="color: red;"><?php echo $email_err; ?></span>
                    </div>
                    <div>
                        <input placeholder="Password" type="password" name="password">
                        <span style="color: red;"><?php echo $password_err; ?></span>
                        <?php
                        if (!empty($login_err)) {
                            echo '<div style="color: red;">' . $login_err . '</div>';
                        }
                        ?>
                    </div>
                    <div>
                        <input class="buttons" type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div class="signup_contaner">
                <span class="signup">Don't have an account?
                    <label for="check">Signup</label>
                </span>
            </div>
        </div>
        <div class="registrations forms">
            <!-- <header>SignUp</header> -->
            <form id="sign-up-form" action="add_user.php" method="post">
                <input id="firstName-input-sign-up" type="text" placeholder="First name" name="Fname" required>
                <small class="error-message" id="fname-error"></small>
                <input id="lastName-input-sign-up" type="text" placeholder="Last name" name="Lname" required>
                <small class="error-message" id="lname-error"></small>
                <input id="email-input-sign-up" type="email" placeholder="Email" name="email" required>
                <small class="error-message" id="email-error"></small>
                <input id="password-input-sign-up" type="password" placeholder="Password" name="password" required>
                <small class="error-message" id="password-error"></small>
                <input type="submit" class="buttons" value="Signup">
                <!-- <input type="hidden" class="button" value="Signup" name="role"> -->

            </form>
            <div class="signup_contaner">
                <span class="signup">Already have an account?
                    <label for="check">Login</label>
                </span>
            </div>
        </div>
    </div>
<?php
include('includes/footer.php');
?>
    <script src="script/login.js?v echo time(); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>


</html>