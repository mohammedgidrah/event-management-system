<?php
include ("includes/header.php");
// session_start();
if(isset($_SESSION['roles']) && $_SESSION['roles'] == 'admin'):
?>

<?php
?>
<?php include ("includes/sidebar.php"); ?>


<main id="main" class="main">
<div class="pagetitle">
    <h1>Categories</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
    </nav>
    </div>
 <section class="section">
      <div class="row">
        <div class="col-lg-8">

       <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Category</h5>



            <form class="row g-3" action="upload.php" method="post" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" style="background-color:white" class="form-control" id="floatingName" placeholder="Category Name"  name="cat_name">
                    <label for="floatingName">Category Name</label>
                  </div>
                </div>
    
              
                  <div class="col-md-12">
                    <input style="background-color:white"  class="form-control" type="file" id="formFile" name="file">
                </div>
      

                <div class="text-center">
                  <button type="submit" class="btn btn-primary"  name="submit" >Add Category</button>
                </div>
              </form>
            </div>
          </div>
              </div>
              </div> 
              </section>





    <?php include 'includes/footer.php';?>
    <?php elseif(!isset($_SESSION['roles'])):{
        header('location: ../index.php');
    }?>
    <?php  endif;?>
