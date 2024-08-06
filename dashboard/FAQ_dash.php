<?php
include ("includes/header.php")
    ?>
<?php include ("includes/sidebar.php") ?>
<?php
include '../connection.php';
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Frequently Asked Questions </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Add FAQs</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create FAQs</h5>



                        <form class="row g-3" action="add_faq.php" method="POST" enctype="multipart/form-data">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="Frequently Asked Questions" name="faq_question" required>
                                    <label for="floatingName">Frequently Asked Questions </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName"
                                        placeholder="Category Name" name="faq_answer" required>
                                    <label for="floatingName">Answer OF Questions </label>
                                </div>
                            </div>


                          

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="submit">Add Questions</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</main>
