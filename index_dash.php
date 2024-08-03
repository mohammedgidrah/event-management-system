<?php include ("event/includes/header.php"); ?>
<?php include ("event/includes/sidebar.php"); ?>
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['delete'])) {
    $userID = $_POST['user_id'];

    $stmt1 = $conn->prepare("DELETE FROM reviews WHERE user_id = ?");
    $stmt1->bind_param("i", $userID);
    $stmt2 = $conn->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt2->bind_param("i", $userID);

    if ($stmt1->execute()) {

    } else {
      echo "Error: " . $stmt->error;
    }
    if ($stmt2->execute()) {

    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt1->close();
    $stmt2->close();
  }
}
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dear Users</h5>

            <!-- Table with stripped rows -->
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
                  <!-- <th data-type="date" data-format="YYYY/DD/MM">created_at</th> -->
                  <th>DELETE</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT `user_id`, `fname`, `lname`,  `roles`,`email`, `created_at` FROM `users` ";
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
                    echo "<form action='' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='user_id' value='{$row['user_id']}'>";
                    echo "<button type='submit' name='delete' class='btn btn-danger btn-sm'><i class=\"bi bi-person-x-fill\" style=\"font-size:1.2em;\"></i></button>";
                    echo "</form>";
                    echo "</td>";
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


<?php include ("event/includes/footer.php");