<div id="ticketsCarousel" class="carousel slide">
    <div class="carousel-inner">
        <?php
        if ($ticket_result->num_rows > 0) {
            $isActive = true;
            while ($ticket = $ticket_result->fetch_assoc()) {
                $activeClass = $isActive ? 'active' : '';
        ?>
                <div class="carousel-item <?= $activeClass ?>">
                    <div class="card">
                        <div style=" display: flex;flex-direction: column;text-align: center;" class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($ticket['event_title']) ?></h5>
                            <p class="card-text">Price: $<?= htmlspecialchars(number_format($ticket['price'], 2)) ?></p>
                            <p class="card-text">Date: <?= htmlspecialchars($ticket['date']) ?></p>
                            <p class="card-text">Type: <?= htmlspecialchars($ticket['ticket_type']) ?></p>
                        </div>
                    </div>
                </div>
        <?php
                $isActive = false;
            }
        } else {
            echo "<p style=' display: flex;flex-direction: column;text-align: center;'>No tickets found.</p>";
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#ticketsCarousel" data-bs-slide="prev">
        <!-- <span class="carousel-control-prev-icon" >jadbvh</span> -->
        <span style="color: black;"><</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#ticketsCarousel" data-bs-slide="next">
        <span style="color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
        <span style="color:black;">></span>
    </button>

</div>
</div>
















<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> this link have to be included in the page -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> -->