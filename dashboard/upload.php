<?php
include '../connection.php';

$statusMsg = '';

$targetDir = "uploads/";

if (isset($_POST["submit"])) {
    $catName = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';

    if (!empty($_FILES["file"]["name"]) && !empty($catName)) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                if ($conn instanceof mysqli) {
                    $stmt = $conn->prepare("INSERT INTO `event_categories` (`name`, `icon`) VALUES (?, ?)");
                    $icon = $fileName;
                    $stmt->bind_param("ss", $catName, $icon);
                    if ($stmt->execute()) {
                        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    }
                    $stmt->close();
                }
            }
        }
    }
    header("Location: category.php ");
    exit;
}
