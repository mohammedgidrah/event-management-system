<?php include("includes/header.php") ?>
<?php
// session_start();
if(isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin'):
?>
  <?php include("includes/sidebar.php") ?>
  <?php
  include '../connection.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_id'])) {
      $deleteSuccess = false;
      $errorMessage = '';
      $categoryID = $_POST['category_id'];
      $conn->begin_transaction();
    
      $stmt1 = $conn->prepare("SELECT COUNT(*) FROM event_category_assignment WHERE category_id = ?");
      $stmt1->bind_param("i", $categoryID);

      $stmt1->execute();
      $stmt1->bind_result($count);
      $stmt1->fetch();
      $stmt1->close();
    try {
if ($count > 0) {
        $errorMessage = "you cannot delete bcause there is at events related to this category ";
        $deleteSuccess = false;
      } else {
      $stmt = $conn->prepare("DELETE FROM event_categories WHERE category_id = ?");
      $stmt->bind_param("i", $categoryID);
      $stmt->execute();
      $stmt->close();
        $deleteSuccess = true;
        $conn->commit();
      }


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
      <h1>Categories</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Icon</th>
                    <th scope="col">Delete Category</th>
                    <th scope="col">Edit Category</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT `category_id`, `name`, `icon` FROM `event_categories`";
                  $result = $conn->query($query);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>{$row['category_id']}</td>";
                      echo "<td>{$row['name']}</td>";
                      echo "<td><img src='uploads/{$row['icon']}' style=width:50px></td>";
                      echo "<td>";
                      echo "<form id='deleteForm{$row['category_id']}' action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline;'>";
                      echo "<input type='hidden' name='category_id' value='{$row['category_id']}'>";
                      echo "<button type='button' onclick='confirmDelete({$row['category_id']})' class='btn btn-danger btn-sm'><i class='bi bi-trash3' style='font-size:1.2em;'></i></button>";
                      echo "</form>";
                      echo "</td>";
                      echo "<td>";
                      echo "<form action='edit_category.php' method='get' style='display:inline;'>";
                      echo "<input type='hidden' name='category_id' value='" . htmlspecialchars($row["category_id"], ENT_QUOTES, 'UTF-8') . "'>";
                      echo "<button type='submit' name='edit' class='btn btn-success btn-sm'><i class='bi bi-pencil-square' style='font-size:1.2em;'></i></button>";

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

      <?php if (isset($_GET['success'])) : ?>
        Swal.fire('Success!', 'Category updated successfully.', 'success');
      <?php endif; ?>
    });
  </script>

  <?php include("includes/footer.php"); ?>
  <?php elseif(!isset($_SESSION['roles'])):{
        header('location: ../index.php');
    }?>
  <?php endif; ?>