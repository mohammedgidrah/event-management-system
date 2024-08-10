<?php

session_start();
include '../connection.php';

// echo $user_id;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
  
  
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Poppins&display=swap');
  
  .logo span {
    font-size: 30px;
    font-weight: 700;
    /* color: #26355D; */
    
    font-family: "League Spartan", sans-serif;

  }

  .header {
    background-color: #26355D;
  }

  .sidebar {
    background-color: #F9FAFE;
  }
  /* .sidebar-nav li a:focus{
    background-color: #ce9178 !important;

  } */
 .sidebar-nav li a .collapsed:active{
    background-color:#219C90 ;

  }
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.php" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/image.png" alt=""> -->
        <!-- <span class="d-none d-lg-block">HiveNet</span> -->
        <svg width="200" height="50" viewBox="0 0 233 54" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.3708 32.0255H12.3588V53H0.587765V0.859998H12.3588V21.716H30.3708V0.859998H42.1023V53H30.3708V32.0255ZM44.3673 53V20.5705H56.3753V53H44.3673ZM50.5293 13.895C48.6333 13.895 47.027 13.2367 45.7103 11.92C44.3937 10.577 43.7353 8.98383 43.7353 7.1405C43.7353 5.29716 44.3937 3.704 45.7103 2.361C47.0533 0.991663 48.6597 0.306996 50.5293 0.306996C51.767 0.306996 52.8993 0.622996 53.9263 1.255C54.9533 1.86066 55.7828 2.677 56.4148 3.704C57.0468 4.731 57.3628 5.8765 57.3628 7.1405C57.3628 8.98383 56.6913 10.577 55.3483 11.92C54.0053 13.2367 52.399 13.895 50.5293 13.895ZM54.6151 20.5705H67.4526L75.2736 42.098L83.1341 20.5705H95.8926L82.3046 53H68.2426L54.6151 20.5705ZM103.19 39.333C103.269 40.4917 103.638 41.5187 104.296 42.414C104.955 43.3093 105.863 44.0203 107.022 44.547C108.207 45.0473 109.602 45.2975 111.209 45.2975C112.736 45.2975 114.105 45.1395 115.317 44.8235C116.554 44.5075 117.621 44.1125 118.516 43.6385C119.438 43.1645 120.149 42.6773 120.649 42.177L125.31 49.603C124.652 50.314 123.717 51.0118 122.506 51.6965C121.321 52.3548 119.754 52.8947 117.805 53.316C115.857 53.7373 113.394 53.948 110.419 53.948C106.837 53.948 103.651 53.2765 100.86 51.9335C98.0684 50.5905 95.8696 48.6155 94.2632 46.0085C92.6569 43.4015 91.8537 40.2152 91.8537 36.4495C91.8537 33.2895 92.5384 30.4455 93.9077 27.9175C95.3034 25.3632 97.3179 23.3487 99.9512 21.874C102.585 20.373 105.758 19.6225 109.471 19.6225C112.999 19.6225 116.054 20.2677 118.635 21.558C121.242 22.8483 123.243 24.7707 124.639 27.325C126.061 29.853 126.772 33.013 126.772 36.805C126.772 37.0157 126.759 37.437 126.732 38.069C126.732 38.701 126.706 39.1223 126.653 39.333H103.19ZM115.475 33.0525C115.448 32.2098 115.225 31.3803 114.803 30.564C114.382 29.7213 113.75 29.0367 112.907 28.51C112.065 27.957 110.985 27.6805 109.668 27.6805C108.352 27.6805 107.232 27.9438 106.311 28.4705C105.415 28.9708 104.731 29.6292 104.257 30.4455C103.783 31.2618 103.519 32.1308 103.467 33.0525H115.475ZM136.769 11.683L137.638 11.841V53H125.827V0.859998H141.943L163.076 41.94L162.207 42.098V0.859998H174.017V53H157.822L136.769 11.683ZM185.406 39.333C185.485 40.4917 185.853 41.5187 186.512 42.414C187.17 43.3093 188.079 44.0203 189.237 44.547C190.422 45.0473 191.818 45.2975 193.424 45.2975C194.952 45.2975 196.321 45.1395 197.532 44.8235C198.77 44.5075 199.836 44.1125 200.732 43.6385C201.653 43.1645 202.364 42.6773 202.865 42.177L207.526 49.603C206.867 50.314 205.933 51.0118 204.721 51.6965C203.536 52.3548 201.969 52.8947 200.021 53.316C198.072 53.7373 195.61 53.948 192.634 53.948C189.053 53.948 185.867 53.2765 183.075 51.9335C180.284 50.5905 178.085 48.6155 176.479 46.0085C174.872 43.4015 174.069 40.2152 174.069 36.4495C174.069 33.2895 174.754 30.4455 176.123 27.9175C177.519 25.3632 179.533 23.3487 182.167 21.874C184.8 20.373 187.973 19.6225 191.686 19.6225C195.215 19.6225 198.27 20.2677 200.85 21.558C203.457 22.8483 205.459 24.7707 206.854 27.325C208.276 29.853 208.987 33.013 208.987 36.805C208.987 37.0157 208.974 37.437 208.948 38.069C208.948 38.701 208.921 39.1223 208.869 39.333H185.406ZM197.69 33.0525C197.664 32.2098 197.44 31.3803 197.019 30.564C196.597 29.7213 195.965 29.0367 195.123 28.51C194.28 27.957 193.2 27.6805 191.884 27.6805C190.567 27.6805 189.448 27.9438 188.526 28.4705C187.631 28.9708 186.946 29.6292 186.472 30.4455C185.998 31.2618 185.735 32.1308 185.682 33.0525H197.69ZM205.317 20.5705H210.847V7.259H222.737V20.5705H230.005V30.4455H222.737V39.491C222.737 40.834 222.934 41.9268 223.329 42.7695C223.724 43.5858 224.449 43.994 225.502 43.994C226.213 43.994 226.819 43.836 227.319 43.52C227.819 43.204 228.122 42.9933 228.227 42.888L232.335 51.42C232.151 51.578 231.572 51.8677 230.597 52.289C229.649 52.7103 228.438 53.0922 226.963 53.4345C225.489 53.7768 223.843 53.948 222.026 53.948C218.787 53.948 216.114 53.0395 214.007 51.2225C211.901 49.3792 210.847 46.5483 210.847 42.73V30.4455H205.317V20.5705Z" fill="#FFC700" />
        </svg>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="color:#ffc700;"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- <li class="nav-item d-block d-lg-none"> -->
          <!-- <a class="nav-link nav-icon search-bar-toggle " href="#"> -->
            <!-- <i class="bi bi-search"></i> -->

          </a>
        </li><!-- End Search Icon-->

        <?php
        // session_start();
        
        $user_id = $_SESSION['user_id'];

        $stmt2 = $conn->prepare("SELECT `fname`, `lname` FROM `users` WHERE `user_id`=?  ");
        $stmt2->bind_param("s", $user_id);
        $stmt2->execute();
        $result = $stmt2->get_result();
        if ($row = $result->fetch_assoc()) {
          $fname = htmlspecialchars($row['fname']);
          $lname = htmlspecialchars($row['lname']);
          $full_name = $fname . ' ' . $lname;
        }

        $stmt2->close();
        ?>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-2" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <i class="bi bi-person-circle" style="font-size : 2rem; color:white;"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2" style="color: white;"> <?php echo $full_name ?>
            </span> </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


            <li>
              <a class="dropdown-item d-flex align-items-center" href=".././index.php">
              <i class="bi bi-house-door-fill" style="color: black;"></i>
                <span>home</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href=".././user_profile/index_user.php">
              <i class="bi bi-person-circle"></i>
              <span>Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href=".././logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->





      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
