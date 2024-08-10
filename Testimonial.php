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
        <a style="color:white" class="testimonial-prev" onclick="plusSlides(-1)"><</a>
        <a style="color:white" class="testimonial-next" onclick="plusSlides(1)">></a>
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

