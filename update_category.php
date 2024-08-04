<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];
    $cat_name = $_POST['cat_name'];

    $stmt = $conn->prepare("SELECT icon FROM event_categories WHERE category_id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $current_icon = $row['icon'];
    $stmt->close();

    if (!empty($_FILES['file']['name'])) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $icon = $fileName;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        $icon = $current_icon;
    }

    $stmt = $conn->prepare("UPDATE event_categories SET name = ?, icon = ? WHERE category_id = ?");
    $stmt->bind_param("ssi", $cat_name, $icon, $category_id);

    if ($stmt->execute()) {
        header("Location: category.php?success=1");
    }
    $stmt->close();
}