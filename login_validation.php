 <?php
// session_start();
// include 'connection.php'; // Include your database connection file

// $email = $password = "";
// $email_err = $password_err = $login_err = "";

// // Processing form data when form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // Validate email
//     if (empty(trim($_POST["email"]))) {
//         $email_err = "Please enter an email.";
//     } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
//         $email_err = "Please enter a valid email address.";
//     } else {
//         $email = trim($_POST["email"]);
//     }

//     // Validate password
//     if (empty(trim($_POST["password"]))) {
//         $password_err = "Please enter your password.";
//     } else {
//         $password = trim($_POST["password"]);
//     }

//     // Validate credentials
//     if (empty($email_err) && empty($password_err)) {
//         // Prepare a select statement
//         $sql = "SELECT user_id , email, pass FROM users WHERE email = ?";
        
//         if ($stmt = mysqli_prepare($conn, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "s", $param_email);

//             // Set parameters
//             $param_email = $email;

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 // Store result
//                 mysqli_stmt_store_result($stmt);

//                 // Check if email exists, if yes then verify password
//                 if (mysqli_stmt_num_rows($stmt) == 1) {
//                     // Bind result variables
//                     mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
//                     if (mysqli_stmt_fetch($stmt)) {
//                         if (password_verify($password, $hashed_password)) {
//                             // Password is correct, so start a new session
//                             session_start();

//                             // Store data in session variables
//                             $_SESSION["loggedin"] = true;
//                             $_SESSION["id"] = $id;
//                             $_SESSION["email"] = $email;

//                             // Redirect user to welcome page
//                             header("location: index_.php");
//                         } else {
//                             // Password is not valid, display a generic error message
//                             $login_err = "Invalid email or password.";
//                         }
//                     }
//                 } else {
//                     // Email doesn't exist, display a generic error message
//                     $login_err = "Invalid email or password.";
//                 }
//             } else {
//                 echo "Oops! Something went wrong. Please try again later.";
//             }
            

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Close connection
//     mysqli_close($conn);
// }
?>


