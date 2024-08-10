<!-- <?php //include 'includes/header.php'; ?>
<?php
// session_start();
// include 'connection.php';
// $user_id = $_SESSION['user_id'];
// echo $user_id;
// die;
// if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
//     $id = intval($_GET['event_id']);
// } else {
//     echo "Invalid or missing event_id.";
//     exit;
// }

// $ticket_type_id = isset($_POST['ticket_type']) ? intval($_POST['ticket_type']) : 1;
// $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

// $stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
// $stmt->bind_param("i", $id);
// $stmt->execute();
// $event = $stmt->get_result()->fetch_assoc();

// $stmt1 = $conn->prepare("SELECT image_url FROM event_images WHERE event_id = ?");
// $stmt1->bind_param("i", $id);
// $stmt1->execute();
// $image = $stmt1->get_result()->fetch_assoc();

// $stmt2 = $conn->prepare("SELECT ticket_prices.price, ticket_types.name FROM ticket_prices JOIN ticket_types ON ticket_prices.ticket_type_id = ticket_types.ticket_type_id WHERE ticket_prices.event_id = ? AND ticket_prices.ticket_type_id = ?");
// $stmt2->bind_param("ii", $id, $ticket_type_id);
// $stmt2->execute();
// $ticket = $stmt2->get_result()->fetch_assoc();
// $price = $ticket ? $ticket['price'] : 'not available';

// $ticket_types_stmt = $conn->prepare("SELECT * FROM ticket_types");
// $ticket_types_stmt->execute();
// $ticket_types = $ticket_types_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// if (isset($_POST['register'])) {
//     $user_id = $_SESSION['user_id'];

//     $check_stmt = $conn->prepare("SELECT COUNT(*) FROM tickets WHERE event_id = ? AND user_id = ?");
//     $check_stmt->bind_param("ii", $id, $user_id);
//     $check_stmt->execute();
//     $already_registered = $check_stmt->get_result()->fetch_row()[0] > 0;
//     $check_stmt->close();

//     if ($already_registered) {
//         $alertType = 'error';
//         $alertTitle = 'Oops!';
//         $alertText = 'You have already registered for this event.';
//     } else {
//         $capacity_stmt = $conn->prepare("SELECT capacity FROM events WHERE event_id = ?");
//         $capacity_stmt->bind_param("i", $id);
//         $capacity_stmt->execute();
//         $current_capacity = $capacity_stmt->get_result()->fetch_assoc()['capacity'];
//         $capacity_stmt->close();

//         if ($current_capacity < $quantity) {
//             $alertType = 'error';
//             $alertTitle = 'Oops!';
//             $alertText = 'Not enough capacity for the requested number of tickets.';
//         } else {
//             $stmt3 = $conn->prepare("INSERT INTO tickets (event_id, user_id, ticket_price_id, quantity) SELECT ?, ?, ticket_price_id, ? FROM ticket_prices WHERE event_id = ? AND ticket_type_id = ?");
//             $stmt3->bind_param("iiiis", $id, $user_id, $quantity, $id, $ticket_type_id);

//             if ($stmt3->execute()) {
//                 $update_capacity_stmt = $conn->prepare("UPDATE events SET capacity = capacity - ? WHERE event_id = ?");
//                 $update_capacity_stmt->bind_param("ii", $quantity, $id);
//                 $update_capacity_stmt->execute();
//                 $update_capacity_stmt->close();

//                 $alertType = 'success';
//                 $alertTitle = '';
//                 $alertText = 'Registration successful!';
//             } else {
//                 $alertType = 'error';
//                 $alertTitle = '
//                 ';
//                 $alertText = 'Registration failed. Please try again.';
//             }
//             $stmt3->close();
//         }
//     }
// }

// $updated_event_stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
// $updated_event_stmt->bind_param("i", $id);
// $updated_event_stmt->execute();
// $updated_event = $updated_event_stmt->get_result()->fetch_assoc();
// $updated_event_stmt->close();

// $stmt->close();
// $stmt1->close();
// $stmt2->close();
// $ticket_types_stmt->close();
// $conn->close();

// if (!$updated_event) {
//     $message = "No event found.";
//     exit;
// }

// $formattedDateTime = date('Y-m-d\TH:i:s', strtotime($updated_event['start_date'] . ' ' . $updated_event['start_time']));
?>


<main>
    <section class="event-details">
        <div class="container">
            <img src="dashboard/uploads_events/<?php //echo htmlspecialchars($image['image_url']); ?>" alt="Event Image">
            <div class="event-info">
                <h1><?php //echo htmlspecialchars($updated_event['title']); ?></h1>
                <p><?php //echo htmlspecialchars($updated_event['description']); ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?php //echo htmlspecialchars($updated_event['location']); ?></p>
                <p><i class="fas fa-calendar-alt"></i> Date:
                <?php // echo htmlspecialchars(date('d/m/Y', strtotime($updated_event['start_date']))); ?> -
                <?php //echo htmlspecialchars(date('d/m/Y', strtotime($updated_event['end_date']))); ?></p>
                <p><i c/lass="fas fa-clock"></i> Time:
                <?php //echo htmlspecialchars(date('g:i A', strtotime($updated_event['start_time']))); ?> -
                <?php //echo htmlspecialchars(date('g:i A', strtotime($updated_event['end_time']))); ?></p>
                <p>Capacity: <?php // echo htmlspecialchars($updated_event['capacity']); ?> attendees</p>
            </div>
        </div>
    </section>
    
    <section class="registration">
        <div class="container">
            <h1>Event Registration</h1>
            <form method="POST">
                <label for="ticket_type">Select Ticket Type:</label>
                <select id="ticket_type" name="ticket_type" onchange="this.form.submit()">
                    <?php //foreach ($ticket_types as $row): ?>
                        <option value="<?php // echo htmlspecialchars($row['ticket_type_id']); ?>" <?php echo ($row['ticket_type_id'] == $ticket_type_id ? 'selected' : ''); ?>>
                            <?php //echo htmlspecialchars($row['name']); ?>
                        </option>
                    <?php //endforeach; ?>
                </select>

                <label for="quantity">Number of Tickets:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" >

                <h2>Price: $<?php //echo htmlspecialchars($price); ?></h2>
                <button type="submit" name="register" value="1" class="cta-button">Register</button>

                <p id="countdown" class="countdown"></p> 
                <?php //if (isset($message)):?>
                    <h2><?php //echo htmlspecialchars($message); ?></h2>
                <?php //endif; ?>
            </form>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    <?php // if (isset($alertType) && isset($alertTitle) && isset($alertText)): ?>
        Swal.fire({
            title: '<?php // echo $alertTitle; ?>',
            text: '<?php //echo htmlspecialchars($alertText, ENT_QUOTES, 'UTF-8'); ?>',
            icon: '<?php //echo $alertType; ?>'
        });
    <?php //endif; ?>
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php //include 'footer_details.php'; ?> -->





















<!-- working -->





<?php 
ob_start(); 
include 'includes/header.php'; 
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


ob_end_flush(); 

$user_id = $_SESSION['user_id'];

if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
    $id = intval($_GET['event_id']);
} else {
    echo "Invalid or missing event_id.";
    exit;
}

$ticket_type_id = isset($_POST['ticket_type']) ? intval($_POST['ticket_type']) : 1;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

$stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$event = $stmt->get_result()->fetch_assoc();

$stmt1 = $conn->prepare("SELECT image_url FROM event_images WHERE event_id = ?");
$stmt1->bind_param("i", $id);
$stmt1->execute();
$image = $stmt1->get_result()->fetch_assoc();

$stmt2 = $conn->prepare("SELECT ticket_prices.price, ticket_types.name FROM ticket_prices JOIN ticket_types ON ticket_prices.ticket_type_id = ticket_types.ticket_type_id WHERE ticket_prices.event_id = ? AND ticket_prices.ticket_type_id = ?");
$stmt2->bind_param("ii", $id, $ticket_type_id);
$stmt2->execute();
$ticket = $stmt2->get_result()->fetch_assoc();
$price = $ticket ? $ticket['price'] : 'not available';

$ticket_types_stmt = $conn->prepare("SELECT * FROM ticket_types");
$ticket_types_stmt->execute();
$ticket_types = $ticket_types_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['register'])) {
    $check_stmt = $conn->prepare("SELECT COUNT(*) FROM tickets WHERE event_id = ? AND user_id = ?");
    $check_stmt->bind_param("ii", $id, $user_id);
    $check_stmt->execute();
    $already_registered = $check_stmt->get_result()->fetch_row()[0] > 0;
    $check_stmt->close();

    if ($already_registered) {
        $alertType = 'error';
        $alertTitle = 'Oops!';
        $alertText = 'You have already registered for this event.';
    } else {
        $capacity_stmt = $conn->prepare("SELECT capacity FROM events WHERE event_id = ?");
        $capacity_stmt->bind_param("i", $id);
        $capacity_stmt->execute();
        $current_capacity = $capacity_stmt->get_result()->fetch_assoc()['capacity'];
        $capacity_stmt->close();

        if ($current_capacity < $quantity) {
            $alertType = 'error';
            $alertTitle = 'Oops!';
            $alertText = 'Not enough capacity for the requested number of tickets.';
        } else {
            $stmt3 = $conn->prepare("INSERT INTO tickets (event_id, user_id, ticket_price_id, quantity) SELECT ?, ?, ticket_price_id, ? FROM ticket_prices WHERE event_id = ? AND ticket_type_id = ?");
            $stmt3->bind_param("iiiis", $id, $user_id, $quantity, $id, $ticket_type_id);

            if ($stmt3->execute()) {
                $update_capacity_stmt = $conn->prepare("UPDATE events SET capacity = capacity - ? WHERE event_id = ?");
                $update_capacity_stmt->bind_param("ii", $quantity, $id);
                $update_capacity_stmt->execute();
                $update_capacity_stmt->close();

                $alertType = 'success';
                $alertTitle = 'Success!';
                $alertText = 'Registration successful!';
            } else {
                $alertType = 'error';
                $alertTitle = 'Error!';
                $alertText = 'Registration failed. Please try again.';
            }
            $stmt3->close();
        }
    }
}

$updated_event_stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
$updated_event_stmt->bind_param("i", $id);
$updated_event_stmt->execute();
$updated_event = $updated_event_stmt->get_result()->fetch_assoc();
$updated_event_stmt->close();

$stmt->close();
$stmt1->close();
$stmt2->close();
$ticket_types_stmt->close();
$conn->close();

if (!$updated_event) {
    $message = "No event found.";
    exit;
}

$formattedDateTime = date('Y-m-d\TH:i:s', strtotime($updated_event['start_date'] . ' ' . $updated_event['start_time']));
?>

<main>
    <!-- Event Details Section -->
    <section class="event-details">
        <div class="container">
            <img src="dashboard/uploads_events/<?php echo htmlspecialchars($image['image_url']); ?>" alt="Event Image">
            <div class="event-info">
                <h1><?php echo htmlspecialchars($updated_event['title']); ?></h1>
                <p><?php echo htmlspecialchars($updated_event['description']); ?></p>
                <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($updated_event['location']); ?></p>
                <p><i class="fas fa-calendar-alt"></i> Date: 
                <?php echo htmlspecialchars(date('d/m/Y', strtotime($updated_event['start_date']))); ?> - 
                <?php echo htmlspecialchars(date('d/m/Y', strtotime($updated_event['end_date']))); ?></p>
                <p><i class="fas fa-clock"></i> Time: 
                <?php echo htmlspecialchars(date('g:i A', strtotime($updated_event['start_time']))); ?> - 
                <?php echo htmlspecialchars(date('g:i A', strtotime($updated_event['end_time']))); ?></p>
                <p>Capacity: <?php echo htmlspecialchars($updated_event['capacity']); ?> attendees</p>
            </div>
        </div>
    </section>
    
    <!-- Registration Section -->
    <section class="registration">
        <div class="container">
            <h1>Event Registration</h1>
            <form method="POST">
                <label for="ticket_type">Select Ticket Type:</label>
                <select id="ticket_type" name="ticket_type" onchange="this.form.submit()">
                    <?php foreach ($ticket_types as $row): ?>
                        <option value="<?php echo htmlspecialchars($row['ticket_type_id']); ?>" <?php echo ($row['ticket_type_id'] == $ticket_type_id ? 'selected' : ''); ?>>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="quantity">Number of Tickets:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" value="1" >

                <h2>Price: $<?php echo htmlspecialchars($price); ?></h2>
                <button type="submit" name="register" value="1" class="cta-button">Register</button>

                <p id="countdown" class="countdown"></p> 
                <?php if (isset($message)):?>
                    <h2><?php echo htmlspecialchars($message); ?></h2>
                <?php endif; ?>
            </form>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', (event) => {
    <?php if (isset($alertType) && isset($alertTitle) && isset($alertText)): ?>
        Swal.fire({
            title: '<?php echo $alertTitle; ?>',
            text: '<?php echo htmlspecialchars($alertText, ENT_QUOTES, 'UTF-8'); ?>',
            icon: '<?php echo $alertType; ?>'
        });
    <?php endif; ?>
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php include 'includes/footer.php'; ?>

