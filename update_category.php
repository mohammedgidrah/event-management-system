<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_id = $_POST['category_id'];
    $cat_name = $_POST['cat_name'];
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
    
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $target_file);
        $icon = basename($file["name"]);
    } else {

    }
$statusMsg = "The category has been updated successfully.";
    $query = "UPDATE `event_categories` SET `name` = ?, `icon` = ? WHERE `category_id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $cat_name, $icon, $category_id);
    $stmt->execute();
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
        Swal.fire({
            title: 'success',
            text: 'The category has been updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = 'category.php';
        });
    </script>";
    exit;
 
}
