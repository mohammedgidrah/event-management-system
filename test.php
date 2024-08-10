<?php
// session_start();
?>
<?php  
if (!isset($_SESSION['roles']) && !isset($_SESSION['user_id'])) {
    // header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HiveNet-Event Management Website</title>

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- style -->
    <link href="../styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/style.css?v=<?php echo time(); ?>">

    <!-- Additional CSS for responsiveness -->
    <style>
        /* General styles for responsiveness */
        /* General Styles */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Flex Container for Hero Section */
.hero-section {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column; /* Column layout for mobile by default */
    padding: 20px;
    background-color: var(--blue100);
}

.hero-item {
    max-width: 1200px;
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column; /* Stack items vertically */
    align-items: center;
}

.hero-caption {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.hero-caption h1, .hero-caption h3 {
    margin: 10px 0;
}

.hero-caption a.button {
    padding: 10px 20px;
    background-color: var(--blue500);
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.hero-caption a.button:hover {
    background-color: var(--blue700);
}

/* Flex Container for Image and Text */
.content-row {
    display: flex;
    flex-direction: column; /* Stack vertically by default */
    align-items: center;
    text-align: center;
    gap: 20px; /* Space between elements */
}

.image-column img {
    max-width: 100%;
    height: auto;
}

/* Media Queries for larger screens */
@media (min-width: 768px) {
    .content-row {
        flex-direction: row; /* Side-by-side layout for larger screens */
        justify-content: space-between;
        align-items: center;
    }

    .text-column {
        max-width: 50%;
        text-align: left;
    }

    .image-column {
        max-width: 50%;
    }

    .hero-caption h1 {
        font-size: 2rem;
    }

    .hero-caption h3 {
        font-size: 1.5rem;
    }
}

@media (min-width: 1024px) {
    .hero-caption h1 {
        font-size: 2.5rem;
    }

    .hero-caption h3 {
        font-size: 1.8rem;
    }

    .hero-caption a.button {
        padding: 12px 24px;
        font-size: 1.2rem;
    }
}

    </style>
</head>

<body>
    <?php
    include "includes/header.php";
    ?>

    <!-- Hero Section Start -->
    <div class="hero-section">
        <div class="hero-item">
            <div class="image-column fadeInRight">
                <img src="img/hero_img.jpg" class="image-fluid x" alt="Main Logo">
            </div>
            <div class="text-column fadeInLeft">
                <div>
                    <h1 class="blu pop-bold" style="color: var(--blue500);">
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
    <!-- Hero Section End -->

    <?php
    include "event_home.php";
    ?>

    <?php
    include "Testimonial.php";
    ?>

    <?php
    include "includes/footer.php";
    ?>
</body>

</html>
