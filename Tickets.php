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
</div>















<div class="container mt-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#commentModal">Leave a Comment</button>
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commentModalLabel">Leave a Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="commentForm" action="comment.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user['user_id']); ?>">
                        <div class="mb-3">
                            <textarea class="form-control" id="inputComment" name="comment" rows="3" placeholder="Write your comment here..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> this link have to be included in the page -->
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"> --> 
