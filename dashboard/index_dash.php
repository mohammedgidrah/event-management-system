<?php include("includes/header.php"); ?>
<?php
// session_start();
if(isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin'):
?>


<?php include("includes/sidebar.php"); ?>
<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
   
    $userID = $_POST['user_id'];
        $deleteSuccess = false;
        $errorMessage = '';
      $conn->begin_transaction();
    try {
    $stmt4 = $conn->prepare("DELETE FROM tickets WHERE user_id = ?");
    $stmt4->bind_param("i", $userID);
    $stmt4->execute();
    $stmt1 = $conn->prepare("DELETE FROM reviews WHERE user_id = ?");
    $stmt1->bind_param("i", $userID);
    $stmt1->execute();
    $stmt2 = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt2->bind_param("i", $userID);
    $stmt2->execute();
    $stmt2->close();
    $stmt1->close();
    $stmt4->close(); 
    $conn->commit();
        $deleteSuccess = true;

  } catch (Exception $e) {
            $conn->rollback();
            $errorMessage = "Error deleting event: " . $e->getMessage();
        }}
?>
 <?php if (isset($deleteSuccess)): ?>
        <script>
            window.onload = function () {
                <?php if ($deleteSuccess): ?>
                    Swal.fire('Deleted!', 'The user has been deleted successfully.', 'success');
                <?php else: ?>
                    Swal.fire('Error!', '<?php echo $errorMessage; ?>', 'error');
                <?php endif; ?>
            }
        </script>
    <?php endif; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['admin'])){
    $userID = $_POST['user_id'];

    $stmt3 = $conn->prepare("UPDATE `users` SET `roles`='admin' WHERE user_id=?");
    $stmt3->bind_param("i", $userID);
    if ($stmt3->execute()) {
    }else{
      echo "Error: " . $stmt3->error;
    }
    $stmt3->close();
  }
}
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dear Users</h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th>UserID</th>
                  <th>
                    <b>F</b>name
                  </th>
                  <th>
                    <b>L</b>name
                  </th>

                  <th>Role</th>
                  <th>Email</th>
                  <th>DELETE</th>
                  <th>To Admin</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT `user_id`, `fname`, `lname`,  `roles`,`email`, `created_at` FROM `users`where roles='user  ' ";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['user_id']}</td>";
                    echo "<td>{$row['fname']}</td>";
                    echo "<td>{$row['lname']}</td>";
                    echo "<td>{$row['roles']}</td>";
                    echo "<td>{$row['email']}</td>";
                    // echo "<td>{$row['created_at']}</td>";
                    echo "<td>";
                    echo "<form id='deleteForm{$row['user_id']}' action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='user_id' value='{$row['user_id']}'>";
                    echo "<button type='button' onclick='confirmDelete({$row['user_id']})' class='btn btn-danger btn-sm'><i class='bi bi-person-dash-fill' style=\"font-size:1.2em;\"></i></button>";
                    echo "</td>";
                    echo "</form>";
                    echo "<td>";
                    echo "<form action='' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='user_id' value='{$row['user_id']}'>";
                    echo "<button type='submit' name='admin' class='btn btn-primary btn-sm'><i class='bi bi-person-fill-add' style=\"font-size:1.2em;\"></i></button>";
                    echo "</form>";
                    echo "</td>";
                    // echo "</td>";
                    echo "</tr>";
                  }
                }
                ?>




              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

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


<?php include ("includes/footer.php");?>
<?php elseif(!isset($_SESSION['roles']) || $_SESSION['roles'] == 'user'):{
        header('location: ../index.php');
    }?>
 <?php endif;
  ?>