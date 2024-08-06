<?php




include '../includes/fetch.php';

?>
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
    <!-- <link href="../styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/sts.css"> -->
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    .navbar-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        /* flex-direction: row; */
        /* flex-direction: column; */
    }
</style>

<body>
    <!-- <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="../img/dash_nav_logo.svg" alt="HiveNet logo">
        </a>
        <button class="navbar-toggler" onclick="toggleNavbar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav" id="navbarNav">
            <li class="nav-item">
                <a href="../index.php" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a href="../about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="../all_card.php" class="nav-link">Events</a>
            </li>
                 <li class="nav-item">
                    <a href="contact.html" class="nav-link">Contact</a>
                </li> 
            <li class="nav-item">
                <a href="../user_profile/index_user.php" class="nav-link">profile</a>
            </li>
            <li class="nav-item">
                <a href="../login.php" class="nav-link login">
                    <span class="material-symbols-outlined">login</span>Login
                </a>
            </li>


          
        </ul>
    </nav> -->

    <!-- <script>
        function toggleNavbar() {
            var navbarNav = document.getElementById("navbarNav");
            navbarNav.classList.toggle("show");
        }
    </script> -->
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile and View Tickets</title>
    <link href="../styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/sts.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="user.css"> -->
    <style>
        img {
            width: 100px;
        }

        .navbar {
            padding: 0px 10px;
            height: 65px;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            gap: 5px;
            font-weight: 500;
            padding: 10px 20px;
        }

        .nav-link {
            text-align: center;
            font-size: 1px;
            display: flex;
            align-items: center;
            color: white;
            font-size: 16px;
            width: 75px;
            padding: 10px;
        }

        .nav-link:hover {
            color: white;

        }

        .logo {
            width: 200px;
        }
        .navbar-toggler-icon{
            background-color: #ffffff00;
        }
        .navbar-toggler-icon::before{
            display: none;
            background-color: red;

        }
        .navbar-toggler-icon::after{
            display: none;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
            }

            .navbar-nav.show {
                display: block;
            }
        }
        
    </style>
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img class="logo" src="../img/dash_nav_logo.svg" alt="HiveNet logo">
        </a>
        <button class="navbar-toggler" onclick="toggleNavbar()">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav" id="navbarNav">
            <li class="nav-item">
                <a href="../index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="../about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="../all_card.php" class="nav-link">Events</a>
            </li>

            <li class="nav-item">
                <a href="../user_profile/index_user.php" class="nav-link">profile</a>
            </li>
            <li class="nav-item">
                <a href="../login.php" class="nav-link login">
                    <span class="material-symbols-outlined">login</span>Login
                </a>
            </li>



        </ul>
    </nav>
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header"><a href="../index.php" style="  text-decoration: none;">Go Back</a></div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="https://img.freepik.com/vector-premium/avatar-icono-plano-glifo-blanco-humano-sobre-fondo-azul_822686-239.jpg?w=826" alt="">
                        <div class="mb-2">
                            <h5 class="card-title"><?= htmlspecialchars($user['fname']) . ' ' . htmlspecialchars($user['lname']) ?></h5>
                            <p class="card-text">You have <?= htmlspecialchars($ticket_count) ?> tickets</p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <?php include '../profileform.php'; ?>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">Your Tickets (click on the side to slide)</div>
                    <div class="card-body">
                        <?php include '../Tickets.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="left-section">
                <p>© 2024 HiveNet</p>
            </div>
            <div class="center-section">
                <img src="../img/footer_logo.svg" alt="HiveNet Logo">
            </div>
            <div class="right-section">
                <a href="./FAQ.php" class="FAQ">FAQs</a>
                <a href="#"><span class="material-symbols-outlined">mail</span></a>
                <a href="#"><span class="material-symbols-outlined">call</span></a>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Changes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to save the changes?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Confirm</button>
                </div>
            </div>

        </div>








        <script src="../script/popup.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function toggleNavbar() {
                var navbarNav = document.getElementById("navbarNav");
                navbarNav.classList.toggle("show");
            }
        </script>
</body>

</html>