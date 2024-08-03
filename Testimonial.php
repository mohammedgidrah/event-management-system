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

<!-- Testimonial  Section -->
<section class="testimonial-slider-section">
    <div class="testimonial-slider-container">
        <h1 class="testimonial_header">What Our Customers Are Saying</h1>
        <div class="testimonial-slider">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "event"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT users.fname, users.lname, users.profile_img, reviews.comment FROM reviews
                    JOIN users ON reviews.user_id = users.user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="testimonial-slide fade">';
                    echo '    <div class="testimonial-text">';
                    echo '       <img src="data:image/jpeg;base64,' . base64_encode($row['profile_img']) . '"/>';
                    echo '        <h4>' . $row["fname"] . ' ' . $row["lname"] . '</h4>';
                    echo '        <p>"' . $row["comment"] . '"</p>';
                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="testimonial-slide fade">';
                echo '    <div class="testimonial-text">';
                echo '        <p>No testimonials available.</p>';
                echo '    </div>';
                echo '</div>';
            }

            $conn->close();
            ?>
        </div>
        <a class="testimonial-prev" onclick="plusSlides(-1)"><</a>
        <a class="testimonial-next" onclick="plusSlides(1)">></a>
    </div>
</section>

<script>
    let testimonialIndex = 0;

    function plusSlides(n) {
        showTestimonialSlides(testimonialIndex += n);
    }

    function showTestimonialSlides(n) {
        let slides = document.getElementsByClassName("testimonial-slide");
        if (n >= slides.length) {
            testimonialIndex = 0;
        }
        if (n < 0) {
            testimonialIndex = slides.length - 1;
        }
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[testimonialIndex].style.display = "flex";
        setTimeout(() => showTestimonialSlides(testimonialIndex), 5000); 
    }

    window.onload = () => showTestimonialSlides(testimonialIndex);
</script>

</body>

</html>

