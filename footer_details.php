<!-- footer.php -->
<footer>
    <div class="footer-container">
      <div class="left-section">
        <p>Â© 2024 HiveNet</p>
      </div>
      <div class="center-section">
        <img src="img/footer_logo.svg" alt="">
      </div>
      <div class="right-section">
        <a href="#">FAQs</a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fas fa-envelope"></i></a>
        <a href="#"><i class="fas fa-phone"></i></a>
      </div>
    </div>
  </footer>

 <script>
    document.addEventListener('DOMContentLoaded', () => {
    const countdownElement = document.getElementById('countdown');
    const eventDateStr = "<?php echo $formattedDateTime; ?>";
    const eventDate = new Date(eventDateStr).getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = eventDate - now;
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        countdownElement.innerHTML = distance > 0 ? `${days}d ${hours}h ${minutes}m ${seconds}s` : 'The event has started!';
    }

    setInterval(updateCountdown);
});

 </script>
</body>
</html>
