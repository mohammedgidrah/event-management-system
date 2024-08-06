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
    <link href="styles/style.css" rel="stylesheet">

</head>
<body>
<?php
include "includes/header.php"
?>

<div class="about-section">
    <div class="about-content">
    <h1 class="section-title">About Us</h1>

        <div class="about-info">
            <div class="about-item">
               
                <h1 class="main-heading">Our Mission</h1>
                <p class="description">
                    At HiveNet, our mission is to connect people with the events and occasions that matter most. We aim to provide a comprehensive platform where users can effortlessly discover, participate in, and enjoy a wide range of events, from local gatherings to major celebrations. Our goal is to make event management and participation as seamless and engaging as possible.
                </p>
                <h1 class="main-heading">What We Do</h1>
                <p class="description">
                    HiveNet is a dynamic event management platform designed to streamline the process of finding and participating in events. Whether you're looking to join community gatherings, attend professional conferences, or engage in social activities, HiveNet brings all these opportunities together in one place. We offer a user-friendly interface, advanced search options, and a vibrant community to enhance your event experience.
                </p>
                <h1 class="main-heading">Our Story</h1>
                <p class="description">
                    Founded with the vision of simplifying event management and fostering community connections, HiveNet was created by a team of passionate individuals dedicated to enhancing how people interact with events. We understand the challenges of managing and participating in events, and we've built HiveNet to address these challenges and provide a platform that is both effective and enjoyable.
                </p>
            </div>
        </div>  
    </div>
</div>


<?php
include "Team.php"
?>
<?php
include "includes/footer.php"
?>
</body>
</html>
