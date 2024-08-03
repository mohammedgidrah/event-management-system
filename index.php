<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiveNet-Event Management Website</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- style -->
    <link href="styles/style.css" rel="stylesheet">


</head>

<body>
    <?php
    include "header.php";
    ?>

    <!-- hero start -->
    <!-- <div class="hero-section">
        <div class="hero-item">
            <div class="hero-caption">
                <div class="content-container">
                    <div class="content-row">
                        <div class="image-column fadeInRight">
                            <img src="img/hero_img.jpg" class="image-fluid" alt="Main Logo">
                        </div>
                        <div class="text-column fadeInLeft">
                            <div>
                                <h1 class="blu pop-bold " style="color: #26355D;">
                                    We gather all the significant events and occasions for you.
                                </h1>
                                <p class=" blu pop-medium" style="color: #26355D;">
                                    Find, explore, and participate in everything that matters, all in one place designed to keep you connected and engaged.
                                </p>
                                <a class="button" href="#">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="hero-section">
    <div class="hero-item">
        <div class="hero-caption">
            <div class="content-container">
                <div class="content-row">
                    <div class="image-column fadeInRight">
                        <img src="img/hero_img.jpg" class="image-fluid x" alt="Main Logo">
                    </div>
                    <div class="text-column fadeInLeft">
                        <div>
                            <h1 class="blu pop-bold" style="color: var(--blue500); ">
                                We gather all the significant events and occasions for you.
                            </h1>
                            <h3 class="blu pop-bold" style="color: var(--blue400);">
                                Find, explore, and participate in everything that matters, all in one place designed to keep you connected and engaged.
                            </h3>
                            <a class="button" href="login.php">Join Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- hero end -->

    <?php
    include "event_home.php";
    ?>


<?php
   include "Testimonial.php";
   ?>
    <?php
    include "footer.php";
    ?>
</body>

</html>