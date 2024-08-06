<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo htmlspecialchars($event['description']); ?>">
  <title><?php echo htmlspecialchars($event['title']); ?></title>
  <!-- <link rel="stylesheet" href="sts.css"> -->
      <link rel="stylesheet" href="styles/sts.css?v=<?php echo time(); ?>">

  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
  <header>
    <div class="container">
      <a href="#" class="logo">EventLogo</a>
      <nav>
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="all_card.php">Events</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
</body>
</html>
