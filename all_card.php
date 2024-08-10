<?php
require "connection.php";
require 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>event</title>
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">

</head>


<body>
    <!-- <section>dwefghjk</section>
    <section>dsfghj</section>
    <section>dsfghj</section> -->
    <section class="sectione_all_category">
        <h1>all caategory</h1>


    </section>

    <?php


    $numofevents=
    // Pagination settings
    $itemsPerPage = 50;
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $currentPage = max($currentPage, 1); // Ensure page number is at least 1
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Fetch categories
    $result = $conn->query("SELECT * FROM event_categories");
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    
    echo "<section class='category'>";
    foreach ($rows as $row) {
        echo "<form action='fetch_events.php' method='get'>
        
        </form>
        <a href='all_card.php?search={$row['name']}' class='category-link' data-category-id='{$row['category_id']}'>
            <div class='maincategory'>
                <img class='category_img' src='dashboard/uploads/{$row['icon']}' alt='{$row['name']}'>
                <p>{$row['name']}</p>
            </div>
        </a>";
    }
    echo "</section>";
    
    echo "<section id='events-container'></section>";
    

    // Fetch events with pagination
    $querystrng = "SELECT events.* FROM events  JOIN event_category_assignment USING (event_id) JOIN event_categories USING (category_id)";
    if(isset($_GET['search']))
    {
        $querystrng .= " where event_categories.name = '{$_GET['search']}' LIMIT $offset, $itemsPerPage;";
    }
    else {
        $querystrng .= "LIMIT $offset, $itemsPerPage";
    }
    $events = $conn->query($querystrng);
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
            $imageUrl = 'dashboard/uploads_events/' . $eventImages[$eventId][0];
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
        <a href='event_details.php?event_id={$eventId}'>
        <img src='{$imageUrl}' alt='{$event['title']}' onerror=\"this.src='path/to/default_image.jpg';\"/></a>
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

    // Pagination controls
    // $totalEventsResult = $conn->query("SELECT COUNT(*) AS total FROM events");
    // $totalEvents = $totalEventsResult->fetch_assoc()['total'];
    // $totalPages = ceil($totalEvents / $itemsPerPage);

    // echo "<div class='pagination'>";
    // if ($currentPage > 1) {
    //     echo "<a href='all_card.php?page=" . ($currentPage - 1) . "'>&laquo; Previous</a>";
    // }
    // for ($i = 1; $i <= $totalPages; $i++) {
    //     echo "<a href='all_card.php?page=$i'" . ($i == $currentPage ? " class='active'" : "") . ">$i</a>";
    // }
    // if ($currentPage < $totalPages) {
    //     echo "<a href='all_card.php?page=" . ($currentPage + 1) . "'>Next &raquo;</a>";
    // }
    // echo "</div>";
    ?>
   

</body>

</html>
<?php include 'includes/footer.php'; ?>
