<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- style -->
    <!-- <link href="styles/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="sts.css">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="img/dash_nav_logo.svg" alt="HiveNet logo">
        </a>
        <button class="navbar-toggler" onclick="toggleNavbar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav" id="navbarNav">
            <li class="nav-item">
                <a href="index.php" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="all_card.php" class="nav-link">Events</a>
            </li>
                <!-- <li class="nav-item">
                    <a href="contact.html" class="nav-link">Contact</a>
                </li> -->
            <li class="nav-item">
                <a href="index_user.php" class="nav-link">profile</a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link login">
                    <span class="material-symbols-outlined">login</span>Login
                </a>
            </li>


          
        </ul>
    </nav>

    <script>
        function toggleNavbar() {
            var navbarNav = document.getElementById("navbarNav");
            navbarNav.classList.toggle("show");
        }
    </script>
</body>
</html>
