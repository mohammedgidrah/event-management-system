<?php
include ("includes/header.php");
?>
<?php
// session_start();
if(isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin'):
?>

<?php include ("includes/sidebar.php"); ?>
<?php
include '../connection.php';

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Events</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Add Event</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Event</h5>

                        <!-- General Form Elements -->
                        <form action="upload_event.php" method="post" enctype="multipart/form-data">
                            <!-- Event Name -->
                            <div class="row mb-3">
                                <label for="eventName" class="col-sm-2 col-form-label">Event Name :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="eventName" name="title"  required>
                                </div>
                            </div>

                            <!-- Event Description -->
                            <div class="row mb-3">
                                <label for="eventDescription" class="col-sm-2 col-form-label">Event Description
                                    :</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="eventDescription" name="description"
                                        style="height: 100px" required ></textarea>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Location :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="location" name="location" required>
                                </div>
                            </div>

                            <!-- Image -->
                            <div class="row mb-3">
                                <label for="eventImage" class="col-sm-2 col-form-label">Image :</label>
                                <div class="col-sm-10">
                                    <input style="background-color:white" class="form-control" type="file" id="eventImage" name="file" required>
                                </div>
                            </div>

                            <!-- Start Date -->
                            <div class="row mb-3">
                                <label for="startDate" class="col-sm-2 col-form-label">Start Date :</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="startDate" name="start_date" required>
                                </div>
                            </div>

                            <!-- End Date -->
                            <div class="row mb-3">
                                <label for="endDate" class="col-sm-2 col-form-label">End Date :</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="endDate" name="end_date" required>
                                </div>
                            </div>

                            <!-- Start Time -->
                            <div class="row mb-3">
                                <label for="startTime" class="col-sm-2 col-form-label">Start At :</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="startTime" name="start_time" required >
                                </div>
                            </div>

                            <!-- End Time -->
                            <div class="row mb-3">
                                <label for="endTime" class="col-sm-2 col-form-label">End At :</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="endTime" name="end_time" required >
                                </div>
                            </div>

                            <!-- Capacity -->
                            <div class="row mb-3">
                                <label for="capacity" class="col-sm-2 col-form-label">Capacity :</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="capacity" name="capacity" required >
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mb-3">
                                <label for="economyPrice" class="col-sm-2 col-form-label">Economy price</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" id="economyPrice"
                                        name="economy_price" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="midSeatPrice" class="col-sm-2 col-form-label">Mid Seat price :</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" id="midSeatPrice"
                                        name="mid_seat_price" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="vipPrice" class="col-sm-2 col-form-label">VIP price:</label>
                                <div class="col-sm-10">
                                    <input type="number" step="0.01" class="form-control" id="vipPrice" name="vip_price"
                                    required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit">Create Event</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    </main>


    <?php include ("includes/footer.php");?>
    <?php elseif(!isset($_SESSION['roles'])):{
        header('location: ../index.php');
    }?>
    <?php endif;?>
