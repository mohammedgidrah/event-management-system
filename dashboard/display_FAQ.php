<?php
session_start();
if (isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin'):
    ?>

    <?php
    include ("includes/header.php");
    ?>
    <?php include ("includes/sidebar.php"); ?>
    <?php
    include '../connection.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['faq_id'])) {
        $faq = $_POST['faq_id'];
        $deleteSuccess = false;
        $errorMessage = '';

        $conn->begin_transaction();

        try {

            $stmt = $conn->prepare("DELETE FROM faq WHERE faq_id = ?");
            $stmt->bind_param("i", $faq);
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
            <h1>FAQs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">FAQs</li>
                </ol>
            </nav>
        </div>






        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Our FAQs </h5>

                            <!-- Table with stripped row s -->
                            <table class="table datatable">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Questions</th>
                                        <th>Answers</th>
                                        <th>Delete</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM `faq` ";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                           
                                            echo "<td>{$row['faq_id']}</td>";
                                            echo "<td>{$row['faq_question']}</td>";
                                            echo "<td>{$row['faq_answer']}</td>";
                                            echo "<td>";

                                            echo "<form id='deleteForm{$row['faq_id']}' action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline;'>";
                                            echo "<input type='hidden' name='faq_id' value='{$row['faq_id']}'>";
                                            echo "<button type='button' onclick='confirmDelete({$row['faq_id']})' class='btn btn-danger btn-sm'><i class='bi bi-trash3' style='font-size:1.2em;'></i></button>";
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


    <?php include ("includes/footer.php"); ?>
<?php elseif (!isset($_SESSION['roles'])): {
            header('location: ../index.php');
        } ?>
<?php endif; ?>