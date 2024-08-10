<?php
include ("includes/header.php");
include ("includes/sidebar.php");
include '../connection.php';

$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';

$query = "SELECT * FROM `events` WHERE `event_id` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();
$stmt->close();

$query = "SELECT `image_url` FROM `event_images` WHERE `event_id` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$image_result = $stmt->get_result();
$image = $image_result->fetch_assoc();
$stmt->close();
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>
        </nav>
    </div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Event</h5>
                    <form action="update_event.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="event_id"
                            value="<?php echo htmlspecialchars($event['event_id']); ?>">

                        <div class="row mb-3">
                            <label for="eventName" class="col-sm-2 col-form-label">Event Name :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="eventName" name="title"
                                    value="<?php echo htmlspecialchars($event['title']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="eventDescription" class="col-sm-2 col-form-label">Event Description :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="eventDescription" name="description"
                                    style="height: 100px"
                                    ><?php echo htmlspecialchars($event['description']); ?></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="location" class="col-sm-2 col-form-label">Location :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="location" name="location"
                                    value="<?php echo htmlspecialchars($event['location']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="eventImage" class="col-sm-2 col-form-label">Image :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="eventImage" name="file">
                                <?php if ($image) { ?>
                                    <img src="uploads_events/<?php echo htmlspecialchars($image['image_url']); ?>"
                                        alt="Current Image" style="max-width: 200px; margin-top: 10px;">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="startDate" class="col-sm-2 col-form-label">Start Date :</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="startDate" name="start_date"
                                    value="<?php echo htmlspecialchars($event['start_date']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="endDate" class="col-sm-2 col-form-label">End Date :</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="endDate" name="end_date"
                                    value="<?php echo htmlspecialchars($event['end_date']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="startTime" class="col-sm-2 col-form-label">Start At :</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="startTime" name="start_time"
                                    value="<?php echo htmlspecialchars($event['start_time']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="endTime" class="col-sm-2 col-form-label">End At :</label>
                            <div class="col-sm-10">
                                <input type="time" class="form-control" id="endTime" name="end_time"
                                    value="<?php echo htmlspecialchars($event['end_time']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="capacity" class="col-sm-2 col-form-label">Capacity :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="capacity" name="capacity"
                                    value="<?php echo htmlspecialchars($event['capacity']); ?>" >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" name="submit">Update Event</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

</main>

<?php include ("includes/footer.php"); ?>