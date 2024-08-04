<?php


include 'header.php';

include 'fetch.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile and View Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
    <style>
        img{
            width: 100px;
        }
        
    </style>
</head>
<body>
<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header"><a href="index.php" style="  text-decoration: none;">Go Back</a></div>
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
                    <?php include 'profileform.php'; ?>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Your Tickets (click on the side to slide)</div>
                <div class="card-body">
                    <?php include 'Tickets .php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

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
    


    
    



<script src="popup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php 
include 'footer.php';
?>

