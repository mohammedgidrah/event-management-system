
<?php
include ("connection.php");


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
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login"> 
        <!-- <input type="hidden" class="button" value="Signup" name="role"> -->

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
        <!-- <input type="hidden" class="button" value="Signup" name="role"> -->

      </form>
      <div class="signup">
        <span class="signup">Already have an account?
          <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
  <script src="login.js?v<?php echo time();?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>