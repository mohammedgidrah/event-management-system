<?php


include 'connection.php';

$statusMsg = '';
$targetDir = "uploads_events/";

if (isset($_POST["submit"])) {
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
    $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
    $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
    $end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';
    $capacity = isset($_POST['capacity']) ? $_POST['capacity'] : '';

    $economy_price = isset($_POST['economy_price']) ? $_POST['economy_price'] : '';
    $mid_seat_price = isset($_POST['mid_seat_price']) ? $_POST['mid_seat_price'] : '';
    $vip_price = isset($_POST['vip_price']) ? $_POST['vip_price'] : '';

    $image = '';

    if (!empty($_FILES["file"]["name"])) {
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            $image = $_FILES["file"]["name"];
        } else {
            $statusMsg = "Error uploading image.";
        }
    }

    if (!empty($title) && !empty($description) && !empty($location) && !empty($start_date) && !empty($end_date) && !empty($start_time) && !empty($end_time) && !empty($capacity)) {
        if ($conn instanceof mysqli) {
            $conn->begin_transaction();

            try {
                $stmt = $conn->prepare("INSERT INTO events (title, description, location, start_date, end_date, start_time, end_time, capacity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssi", $title, $description, $location, $start_date, $end_date, $start_time, $end_time, $capacity);

                if ($stmt->execute()) {
                    $event_id = $stmt->insert_id;
                    echo "Event inserted with ID: $event_id\n"; // Debug message

                    if ($image) {
                        $stmt = $conn->prepare("INSERT INTO event_images (event_id, image_url) VALUES (?, ?)");
                        $stmt->bind_param("is", $event_id, $image);
                        if ($stmt->execute()) {
                            echo "Image inserted successfully\n"; // Debug message
                        } else {
                            echo "Error inserting image: " . $stmt->error . "\n"; // Debug message
                        }
                    }

                    $ticket_types = ['Economy', 'Mid Seat', 'VIP'];
                    $prices = [$economy_price, $mid_seat_price, $vip_price];

                    foreach ($ticket_types as $index => $type) {
                        $stmt = $conn->prepare("INSERT INTO ticket_prices (event_id, ticket_type_id, price) VALUES (?, (SELECT ticket_type_id FROM ticket_types WHERE name = ?), ?)");
                        $stmt->bind_param("isd", $event_id, $type, $prices[$index]);

                        if ($stmt->execute()) {
                            echo "Ticket price inserted for type: $type\n"; // Debug message
                        } else {
                            echo "Error inserting ticket price for type $type: " . $stmt->error . "\n"; // Debug message
                        }
                    }

                    $conn->commit();
                    $statusMsg = "Event and ticket prices created successfully.";
                } else {
                    throw new Exception("Error creating event: " . $stmt->error);
                }
            } catch (Exception $e) {
                $conn->rollback();
                $statusMsg = $e->getMessage();
            }

            $stmt->close();
        } else {
            $statusMsg = "Failed to connect to the database.";
        }
    } else {
        // $statusMsg = "All fields are required.";
    }

    if ($statusMsg) {
        header("Location: event.php");
        exit;
        // echo "<script>alert('$statusMsg'); window.location.href='event.php';</script>";
    } else {
        header("Location: event.php");
        exit;
    }

    exit;
}
?>

