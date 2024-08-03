<?php
include "connection.php";
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>event</title>
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <?php include "nav.php"; ?>

    <?php
    $result = $conn->query("SELECT * FROM event_categories");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    echo "<section class='category'>";
    foreach ($rows as $row) {
        echo "
        <a href='#'>
            <div class='maincategory'>
                <img class='category_img' src='uploads/{$row['icon']}' alt='{$row['name']}'>
                <p>{$row['name']}</p>
            </div>
        </a>";
    }
    echo "</section>";

    $events = $conn->query("SELECT * FROM events");
    $events_img = $conn->query("SELECT * FROM event_images");

    $eventRows = $events->fetch_all(MYSQLI_ASSOC);
    $imgRows = $events_img->fetch_all(MYSQLI_ASSOC);

    $eventImages = [];
    foreach ($imgRows as $img) {
        if (!isset($eventImages[$img['event_id']])) {
            $eventImages[$img['event_id']] = [];
        }
        $eventImages[$img['event_id']][] = $img['image_url'];
    }

    echo "<div class='events-cards'>";
    foreach ($eventRows as $event) {
        $eventId = $event['event_id'];
        $imageUrl = '';
        if (isset($eventImages[$eventId]) && !empty($eventImages[$eventId])) {
            $imageUrl = 'uploads_events/' . $eventImages[$eventId][0];
           
            if (!file_exists($imageUrl)) {
                $imageUrl = '';
            }
        }
        if (empty($imageUrl)) {
            $imageUrl = 'uploads_events/WikiDiet (3).png'; 
        }
        echo "
    <section class='main'>
    <section class='articles'>
    <article>
    <div class='article-wrapper'>
        <figure>
        <img src='{$imageUrl}' alt='{$event['title']}' onerror=\"this.src='path/to/default_image.jpg';\"/>
        </figure>
        <div class='article-body'>
        <h6>{$event['title']}</h6>
        <h6>{$event['start_date']} -> {$event['end_date']}</h6> 
        <h6>{$event['start_time']} - {$event['end_time']} | {$event['location']}</h6>
        <a href='event_details.php?event_id={$eventId}' class='read-more'>
        Read more <span class='sr-only'>about this event</span>
        <svg xmlns='http://www.w3.org/2000/svg' class='icon' viewBox='0 0 20 20' fill='currentColor'>
        <path fill-rule='evenodd' d='M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z' clip-rule='evenodd' />
        </svg>
        </a>
        </div>
    </div>
    </article>
    </section>
    </section>";
    }
    echo "</div>";
    

    ?>
</body>

</html>
<?php include 'footer.php'; ?>