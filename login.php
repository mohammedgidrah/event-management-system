<?php
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
        $login_err = "Invalid email or password.";
      }

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



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="logic.php" method="post">
        <input id="email-input-sign-up" type="text" name="email" placeholder="Enter your email">
        <input id="password-input-sign-up" type="password" name="password" placeholder="Enter your password">
        <input type="submit" class="button" value="Login">

      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
          <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>SignUp</header>
      <form id="sign-up-form" action="add_user.php" method="post">
        <input id="firstName-input-sign-up" type="text" placeholder="First name" name="Fname" required>
        <small class="error-message" id="fname-error"></small>
        <input id="lastName-input-sign-up" type="text" placeholder="Last name" name="Lname" required>
        <small class="error-message" id="lname-error"></small>
        <input id="email-input-sign-up" type="email" placeholder="Email" name="email" required>
        <small class="error-message" id="email-error"></small>
        <input id="password-input-sign-up" type="password" placeholder="Password" name="password" required>
        <small class="error-message" id="password-error"></small>
        <input type="submit" class="button" value="Signup">

      </form>
      <div class="signup">
        <span class="signup">Already have an account?
          <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
  <script src="login.js?<?php echo time(); ?>"></script>


</body>

</html>