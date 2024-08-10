<?php
include '../connection.php';






$statusMsg = '';
$targetDir = "uploads_events/";

if (isset($_POST["submit"])) {
    $event_id = isset($_POST['event_id']) ? $_POST['event_id'] : '';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
    $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
    $end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';
    $capacity = isset($_POST['capacity']) ? $_POST['capacity'] : '';
    $image = '';

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $image = $fileName;
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    }

    if (!empty($event_id) && !empty($title) && !empty($description) && !empty($location) && !empty($start_date) && !empty($end_date) && !empty($start_time) && !empty($end_time) && !empty($capacity)) {
        if ($conn instanceof mysqli) {
            $stmt = $conn->prepare("UPDATE `events` SET `title` = ?, `description` = ?, `location` = ?, `start_date` = ?, `end_date` = ?, `start_time` = ?, `end_time` = ?, `capacity` = ? WHERE `event_id` = ?");
            $stmt->bind_param("ssssssssi", $title, $description, $location, $start_date, $end_date, $start_time, $end_time, $capacity, $event_id);

            if ($stmt->execute()) {
                $statusMsg = "The event has been updated successfully.";
                header("Location: event.php?success=1");
                exit;
                
                if ($image) {
                    $stmt = $conn->prepare("UPDATE `event_images` SET `image_url` = ? WHERE `event_id` = ?");
                    $stmt->bind_param("si", $image, $event_id);
                    
                    if ($stmt->execute()) {
                        $statusMsg .= " Image also updated.";
                    } else {
                        $statusMsg .= " But there was an error updating the image.";
                    }
                }
                 
                header("Location: event.php");
        exit;
            
             
            } else {
                $statusMsg = "Error updating event: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $statusMsg = "Database connection error.";
        }
    } else {
        $statusMsg = "All fields are required.";
    }

}



?>
