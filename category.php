  
<?php include ("event/includes/header.php") ?>
<?php include ("event/includes/sidebar.php")?>
<?php
include 'connection.php';

$deleteMessage = '';
$deleteStatus = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  $categoryID = $_POST['category_id'];

  $stmt = $conn->prepare("DELETE FROM event_categories WHERE category_id = ?");
  $stmt->bind_param("i", $categoryID);

  if ($stmt->execute()) {
    $deleteMessage = "The category has been deleted successfully.";
    $deleteStatus = "success";
  } else {
    $deleteMessage = "Error: " . $stmt->error;
    $deleteStatus = "error";
  }

  $stmt->close();
}
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Categories</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
                    echo "<td>{$row['icon']}</td>";
                    echo "<td>";
                    echo "<form id='deleteForm{$row['category_id']}' action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='category_id' value='{$row['category_id']}'>";
                    echo "<button type='submit' name='delete' onclick='confirmDelete({$row['category_id']}); return false;' class='btn btn-danger btn-sm'><i class=\"bi bi-person-x-fill\" style=\"font-size:1.2em;\"></i></button>";
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    
    <?php if (isset($_GET['success'])): ?>
      Swal.fire('Success!', 'Category updated successfully.', 'success');
      <?php endif; ?>
    });
    
    // function confirmDelete(categoryId) {
      //   Swal.fire({
        //     title: 'Are you sure?',
        //     text: "You won't be able to revert this!",
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: '#3085d6',
        //     cancelButtonColor: '#d33',
        //     confirmButtonText: 'Yes, delete it!',
        //     cancelButtonText: 'Cancel'
        //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       document.getElementById('deleteForm' + categoryId).submit();
  //     }
  //   });
  // }
</script>

<?php include ("event/includes/footer.php");?>

// <?php if ($deleteMessage): ?>
//   // Swal.fire({
//   //   title: '<?php echo $deleteStatus == "success" ? "Deleted!" : "Error!"; ?>',
//   //   text: '<?php echo $deleteMessage; ?>',
//   //   icon: '<?php echo $deleteStatus; ?>'
//   // });
// <?php endif; ?>