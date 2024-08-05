<?php
session_start();
include 'connection.php';










if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {
  $id = intval($_GET['event_id']);
} else {
  echo "Invalid or missing event_id.";
  exit;
}



$ticket_type_id = isset($_POST['ticket_type']) ? intval($_POST['ticket_type']) : 1;

// Fetch event details
$stmt = $conn->prepare("SELECT * FROM events WHERE event_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$event = $stmt->get_result()->fetch_assoc();

// Fetch event images
$stmt1 = $conn->prepare("SELECT image_url FROM event_images WHERE event_id = ?");
$stmt1->bind_param("i", $id);
$stmt1->execute();
$image = $stmt1->get_result()->fetch_assoc();

// Fetch ticket type and price
$stmt2 = $conn->prepare("SELECT ticket_prices.price, ticket_types.name FROM ticket_prices JOIN ticket_types ON ticket_prices.ticket_type_id = ticket_types.ticket_type_id WHERE ticket_prices.event_id = ? AND ticket_prices.ticket_type_id = ?");
$stmt2->bind_param("ii", $id, $ticket_type_id);
$stmt2->execute();
$ticket = $stmt2->get_result()->fetch_assoc();
$price = $ticket ? $ticket['price'] : 'not available';

// Fetch all ticket types for dropdown
$ticket_types_stmt = $conn->prepare("SELECT * FROM ticket_types");
$ticket_types_stmt->execute();
$ticket_types = $ticket_types_stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if (isset($_POST['register'])) {
  $user_id = $_SESSION['user_id'];
  $stmt3 = $conn->prepare("INSERT INTO tickets (event_id, user_id, ticket_price_id) SELECT ?, ?, ticket_price_id FROM ticket_prices WHERE event_id = ? AND ticket_type_id = ?");
  $stmt3->bind_param("iiii", $id, $user_id, $id, $ticket_type_id);
  if ($stmt3->execute()) {
    $message = "Registration successful!";
  } else {
    $message = "err";
  }
  $stmt3->close();
}

$stmt->close();
$stmt1->close();
$stmt2->close();
$ticket_types_stmt->close();
$conn->close();

if (!$event) {
  $message = "No event found.";
  exit;
}

$formattedDateTime = date('Y-m-d\TH:i:s', strtotime($event['start_date'] . ' ' . $event['start_time']));
?>
  <?php
  include 'header.php';
  ?>

<main>
  <section class="event-details">
    <div class="container">
      <img src="uploads_events/<?php echo htmlspecialchars($image['image_url']); ?>" alt="Event Image">
      <div class="event-info">
        <h1><?php echo htmlspecialchars($event['title']); ?></h1>
        <p><?php echo htmlspecialchars($event['description']); ?></p>
        <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($event['location']); ?></p>
        <p><i class="fas fa-calendar-alt"></i> Date:
        <?php echo htmlspecialchars(date('d/m/Y', strtotime($event['start_date']))); ?> -
        <?php echo htmlspecialchars(date('d/m/Y', strtotime($event['end_date']))); ?></p>
        <p><i class="fas fa-clock"></i> Time:
        <?php echo htmlspecialchars(date('g:i A', strtotime($event['start_time']))); ?> -
        <?php echo htmlspecialchars(date('g:i A', strtotime($event['end_time']))); ?></p>
        <p>Capacity: <?php echo htmlspecialchars($event['capacity']); ?> attendees</p>
      </div>
    </div>
  </section>
  
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
        <h2>Price: $<?php echo htmlspecialchars($price); ?></h2>
        <button type="submit" name="register" value="1" class="cta-button">Register</button>
        <div id="countdown" class="countdown"></div>
        <?php if (isset($message)): ?>
          <h2><?php echo htmlspecialchars($message); ?></h2>
        <?php endif; ?>
      </form>


    </div>
  </section>
</main>

<?php include 'footer_details.php'; ?>