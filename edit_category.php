<?php
include ("event/includes/header.php");
include ("event/includes/sidebar.php");
include 'connection.php';
if (isset($_POST['cancel'])) {
    header('Location: your_previous_page.php');
    exit();
}
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];

    $query = "SELECT `name`, `icon` FROM `event_categories` WHERE `category_id` = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("i", $category_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if (!$result) {
        die("Get result failed: " . $stmt->error);
    }

    $category = $result->fetch_assoc();

    if (!$category) {
        die("No category found.");
    }
} else {
    die("No category_id provided.");
}
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Horizontal Form</h5>
                        <!-- Horizontal Form -->
                        <form action="update_category.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="category_id"
                                value="<?php echo htmlspecialchars($category_id, ENT_QUOTES, 'UTF-8'); ?>">

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="Category Name" name="cat_name"
                                        value="<?php echo htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">Image</label>
                                <div class="col-sm-12">
                                    <?php if (!empty($category['icon'])): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($category['icon'], ENT_QUOTES, 'UTF-8'); ?>"
                                            alt="Category Image" style="max-width: 200px;">
                                    <?php else: ?>
                                        <p>No image available</p>
                                    <?php endif; ?>

                                    <input class="form-control" type="file" id="formFile" name="file"
                                        style="margin-top: 15px;">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="window.location.href='category.php';">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include ("event/includes/footer.php"); ?>