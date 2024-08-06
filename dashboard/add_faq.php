<?php
include '../connection.php';

if (isset($_POST["submit"])) {
    
    $question = isset($_POST['faq_question']) ? $_POST['faq_question'] : '';
    $answer = isset($_POST['faq_answer']) ? $_POST['faq_answer'] : '';

    $stmt = $conn->prepare("INSERT INTO `faq`( `faq_question`, `faq_answer`) VALUES (?,?)");
    $stmt->bind_param("ss", $question, $answer);

    if ($stmt->execute()) {
        header("Location: FAQ_dash.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

         $stmt->close();
}