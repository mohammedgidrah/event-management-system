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
                        <div class="card-body">
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
            echo "<p>No tickets found.</p>";
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#ticketsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#ticketsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>
<div class="card mb-4">
                <div class="card-header">Leave a Comment</div>
                <div class="card-body">
                    <form id="commentForm" action="comment.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                        <div class="mb-3">
                            <textarea class="form-control" id="inputComment" name="comment" rows="3" placeholder="Write your comment here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
