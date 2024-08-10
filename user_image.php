

<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "event"; 

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    $profile_img = addslashes(file_get_contents($_FILES['profile_img']['tmp_name']));

    $sql = "UPDATE users SET profile_img = '$profile_img' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Profile image updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
