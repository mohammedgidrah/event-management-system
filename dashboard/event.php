<?php
include ("includes/header.php"); 
// session_start();
if(isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin'):
?>

<?php
 ?>
<?php include ("includes/sidebar.php"); ?>
<?php
include '../connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event_id'])) {
  $eventID = $_POST['event_id'];
  $deleteSuccess = false;
  $errorMessage = '';

  $conn->begin_transaction();

  try {

    $stmt = $conn->prepare("DELETE FROM ticket_prices WHERE event_id = ?");
    $stmt->bind_param("i", $eventID);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM event_images WHERE event_id = ?");
    $stmt->bind_param("i", $eventID);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM events WHERE event_id = ?");
    $stmt->bind_param("i", $eventID);
    $stmt->execute();
    $stmt->close();

    $conn->commit();
    $deleteSuccess = true;
  } catch (Exception $e) {
    $conn->rollback();
    $errorMessage = "Error deleting event: " . $e->getMessage();
  }
}
?>
<?php if (isset($deleteSuccess)): ?>
  <script>
    window.onload = function () {
      <?php if ($deleteSuccess): ?>
        Swal.fire('Deleted!', 'The event has been deleted successfully.', 'success');
      <?php else: ?>
        Swal.fire('Error!', '<?php echo $errorMessage; ?>', 'error');
      <?php endif; ?>
    }
  </script>
<?php endif; ?>
<main id="main" class="main">
<div class="pagetitle">
    <h1>Events</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Events</li>
        </ol>
    </nav>
    </div>






    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Our Event </h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>

                    <th>Event Name</th>
              
                    <th>
                    Location 
                    </th>
                    
                   
                   
                    <th data-type="date" data-format="YYYY/DD/MM"> Start Date </th>
                    <th data-type="date" data-format="YYYY/DD/MM">End Date </th>
                    <th data-type="time" data-format="HH:mm">Start Time</th>
                    <th data-type="time" data-format="HH:mm">End Time</th>

                    <th>Capacity</th>
                    <th>Delete</th>
                    <th>Edit</th>
                   
                  </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT `event_id`,  `title`, `location`, `start_date`, `end_date`, `start_time`, `end_time`, `capacity` FROM `events`
 ";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // echo "<td>{$row['event_id']}</td>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['location']}</td>";
                        echo "<td>{$row['start_date']}</td>";
                        echo "<td>{$row['end_date']}</td>";
                        echo "<td>{$row['start_time']}</td>";
                        echo "<td>{$row['end_time']}</td>";
                        echo "<td>{$row['capacity']}</td>";
                        echo "<td>";

                    echo "<form id='deleteForm{$row['event_id']}' action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='event_id' value='{$row['event_id']}'>";
                    echo "<button type='button' onclick='confirmDelete({$row['event_id']})' class='btn btn-danger btn-sm'><i class='bi bi-trash3' style='font-size:1.2em;'></i></button>";
                    echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form action='edit_event.php' method='get' style='display:inline;'>";
                        echo "<input type='hidden' name='event_id' value='" . htmlspecialchars($row["event_id"], ENT_QUOTES, 'UTF-8') . "'>";
                        echo "<button type='submit' name='edit' class='btn btn-success btn-sm'>
                            <i class='bi bi-pencil-square' style='font-size:1.2em;'></i>
                          </button>";
                        echo "</form>";
                                            echo "</td>";
                        echo "</tr>";
                    }

                }
                ?>
             
                  
         
                  
              
                 
                
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>


</main>
<script>
function confirmDelete(eventId) {
    Swal.fire({
        title: 'Are You Sure You Want TO Delete',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm' + eventId).submit();
        }
    });
}
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

     <?php if (isset($_GET['success'])): ?>
      Swal.fire('Success!', 'Event updated successfully.', 'success');
    <?php endif; ?>
  });
</script>


<?php include ("includes/footer.php");?>
<?php elseif(!isset($_SESSION['roles'])):{
        header('location: ../index.php');
    }?>
<?php endif;?>