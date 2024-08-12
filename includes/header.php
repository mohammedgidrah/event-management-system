 <!DOCTYPE html>
<html>
<?php
session_start();
include "./connection.php";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['roles'];

    $stmt2 = $conn->prepare("SELECT `fname`, `lname` FROM `users` WHERE `user_id`=?  ");
    $stmt2->bind_param("s", $user_id);
    $stmt2->execute();
    $result = $stmt2->get_result();
    if ($row = $result->fetch_assoc()) {
        $fname = htmlspecialchars($row['fname']);
        $lname = htmlspecialchars($row['lname']);
        $full_name = $fname . ' ' . $lname;
    }

    $stmt2->close();
} else {
    $role = 'nothing';
}
?>


<head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="Event Management System - Manage and view events efficiently.">
     <meta name="keywords" content="events, event management, event system, event planning">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
    <link rel="stylesheet" href="styles/nav.css" />
    <link rel="stylesheet" href="styles/sts.css" />
     <link rel="stylesheet" href="styles/styles.css" />  
    <link rel="stylesheet" href="styles/nav.css?v=<?php echo time(); ?>"> 
    


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif !important; 
    text-transform:capitalize  ;
}


.navbar {
    overflow: hidden;
    background-color: #26355D;
    display: flex;
    z-index: 9999;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    padding-right: 65px;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
.login_div{
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;

}
.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.navbar a:hover,
.dropdown:hover .dropbtn {
    color: #FFC700;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>

<div class="navbar">
    <div class="logo">
        <svg width="200" height="40" viewBox="0 0 233 54" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M30.3708 32.0255H12.3588V53H0.587765V0.859998H12.3588V21.716H30.3708V0.859998H42.1023V53H30.3708V32.0255ZM44.3673 53V20.5705H56.3753V53H44.3673ZM50.5293 13.895C48.6333 13.895 47.027 13.2367 45.7103 11.92C44.3937 10.577 43.7353 8.98383 43.7353 7.1405C43.7353 5.29716 44.3937 3.704 45.7103 2.361C47.0533 0.991663 48.6597 0.306996 50.5293 0.306996C51.767 0.306996 52.8993 0.622996 53.9263 1.255C54.9533 1.86066 55.7828 2.677 56.4148 3.704C57.0468 4.731 57.3628 5.8765 57.3628 7.1405C57.3628 8.98383 56.6913 10.577 55.3483 11.92C54.0053 13.2367 52.399 13.895 50.5293 13.895ZM54.6151 20.5705H67.4526L75.2736 42.098L83.1341 20.5705H95.8926L82.3046 53H68.2426L54.6151 20.5705ZM103.19 39.333C103.269 40.4917 103.638 41.5187 104.296 42.414C104.955 43.3093 105.863 44.0203 107.022 44.547C108.207 45.0473 109.602 45.2975 111.209 45.2975C112.736 45.2975 114.105 45.1395 115.317 44.8235C116.554 44.5075 117.621 44.1125 118.516 43.6385C119.438 43.1645 120.149 42.6773 120.649 42.177L125.31 49.603C124.652 50.314 123.717 51.0118 122.506 51.6965C121.321 52.3548 119.754 52.8947 117.805 53.316C115.857 53.7373 113.394 53.948 110.419 53.948C106.837 53.948 103.651 53.2765 100.86 51.9335C98.0684 50.5905 95.8696 48.6155 94.2632 46.0085C92.6569 43.4015 91.8537 40.2152 91.8537 36.4495C91.8537 33.2895 92.5384 30.4455 93.9077 27.9175C95.3034 25.3632 97.3179 23.3487 99.9512 21.874C102.585 20.373 105.758 19.6225 109.471 19.6225C112.999 19.6225 116.054 20.2677 118.635 21.558C121.242 22.8483 123.243 24.7707 124.639 27.325C126.061 29.853 126.772 33.013 126.772 36.805C126.772 37.0157 126.759 37.437 126.732 38.069C126.732 38.701 126.706 39.1223 126.653 39.333H103.19ZM115.475 33.0525C115.448 32.2098 115.225 31.3803 114.803 30.564C114.382 29.7213 113.75 29.0367 112.907 28.51C112.065 27.957 110.985 27.6805 109.668 27.6805C108.352 27.6805 107.232 27.9438 106.311 28.4705C105.415 28.9708 104.731 29.6292 104.257 30.4455C103.783 31.2618 103.519 32.1308 103.467 33.0525H115.475ZM136.769 11.683L137.638 11.841V53H125.827V0.859998H141.943L163.076 41.94L162.207 42.098V0.859998H174.017V53H157.822L136.769 11.683ZM185.406 39.333C185.485 40.4917 185.853 41.5187 186.512 42.414C187.17 43.3093 188.079 44.0203 189.237 44.547C190.422 45.0473 191.818 45.2975 193.424 45.2975C194.952 45.2975 196.321 45.1395 197.532 44.8235C198.77 44.5075 199.836 44.1125 200.732 43.6385C201.653 43.1645 202.364 42.6773 202.865 42.177L207.526 49.603C206.867 50.314 205.933 51.0118 204.721 51.6965C203.536 52.3548 201.969 52.8947 200.021 53.316C198.072 53.7373 195.61 53.948 192.634 53.948C189.053 53.948 185.867 53.2765 183.075 51.9335C180.284 50.5905 178.085 48.6155 176.479 46.0085C174.872 43.4015 174.069 40.2152 174.069 36.4495C174.069 33.2895 174.754 30.4455 176.123 27.9175C177.519 25.3632 179.533 23.3487 182.167 21.874C184.8 20.373 187.973 19.6225 191.686 19.6225C195.215 19.6225 198.27 20.2677 200.85 21.558C203.457 22.8483 205.459 24.7707 206.854 27.325C208.276 29.853 208.987 33.013 208.987 36.805C208.987 37.0157 208.974 37.437 208.948 38.069C208.948 38.701 208.921 39.1223 208.869 39.333H185.406ZM197.69 33.0525C197.664 32.2098 197.44 31.3803 197.019 30.564C196.597 29.7213 195.965 29.0367 195.123 28.51C194.28 27.957 193.2 27.6805 191.884 27.6805C190.567 27.6805 189.448 27.9438 188.526 28.4705C187.631 28.9708 186.946 29.6292 186.472 30.4455C185.998 31.2618 185.735 32.1308 185.682 33.0525H197.69ZM205.317 20.5705H210.847V7.259H222.737V20.5705H230.005V30.4455H222.737V39.491C222.737 40.834 222.934 41.9268 223.329 42.7695C223.724 43.5858 224.449 43.994 225.502 43.994C226.213 43.994 226.819 43.836 227.319 43.52C227.819 43.204 228.122 42.9933 228.227 42.888L232.335 51.42C232.151 51.578 231.572 51.8677 230.597 52.289C229.649 52.7103 228.438 53.0922 226.963 53.4345C225.489 53.7768 223.843 53.948 222.026 53.948C218.787 53.948 216.114 53.0395 214.007 51.2225C211.901 49.3792 210.847 46.5483 210.847 42.73V30.4455H205.317V20.5705Z"
                fill="#FFC700" />
        </svg>

    </div>
    <div class="links_header">

        <a href="index.php">Home</a>
        <a href="all_card.php">Events</a>
        <a href="about.php">About</a>
        <a href="FAQ.php">FAQ</a>
        <?php

        if (!isset($_SESSION['roles'])) : ?>

        <a href="login.php" class="login_div">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
</svg> 
           <div class="login_nav">Login</div>
        </a>
        <?php else : ?>
        <?php


            if ($role == 'admin') : ?>
        <div class="dropdown">
            <button class="dropbtn">
                <?php echo $fname; ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
  <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
</svg>                         </button>
            <div class="dropdown-content">
                <a href="dashboard/index_dash.php">dashboard</a>
                <a href="./user_profile/index_user.php">profile</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <?php elseif ($role == 'user') : ?>

        <div class="dropdown">
            <button class="dropbtn">
                <?php echo $fname; ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
  <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
</svg>
             </button>
            <div class="dropdown-content">
                <a href="user_profile/index_user.php">profile</a>
                <a href="logout.php">logout</a>
            </div>
        </div>
        <?php endif; ?>
        <?php
        endif; ?>




        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('profileForm');
            const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            const confirmSubmit = document.getElementById('confirmSubmit');
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                modal.show();
            });
            confirmSubmit.addEventListener('click', () => {
                form.submit();
            });
        });
        </script>

    </div>
</div> 
<?php
// endif;
// ob_start();
// session_start();
?> 



<!-- 
<!DOCTYPE html>
<html>
<?php
// include "connection.php";


// echo $_SESSION['user_id'];
// if (isset($_SESSION['user_id'])) {
//     die;
//     $user_id = $_SESSION['user_id'];
//     $role = $_SESSION['roles'];

//     $stmt2 = $conn->prepare("SELECT `fname`, `lname` FROM `users` WHERE `user_id`=?  ");
//     $stmt2->bind_param("s", $user_id);
//     $stmt2->execute();
//     $result = $stmt2->get_result();
//     if ($row = $result->fetch_assoc()) {
//         $fname = htmlspecialchars($row['fname']);
//         $lname = htmlspecialchars($row['lname']);
//         $full_name = $fname . ' ' . $lname;
//     }

//     $stmt2->close();
// } else {
//     $role = 'nothing';
// }
?>
<?php
// if(!isset($_SESSION['roles']) && !isset($_SESSION['user_id'])):{

//     // header('location: index.php');
// }
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <link rel="stylesheet" href="styles/nav.css" /> 
    <link rel="stylesheet" href="styles/sts.css" />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/nav.css?v=<?php echo time(); ?>">




</head>

<div class="navbar">
    <div class="logo">
        <svg width="233" height="54" viewBox="0 0 233 54" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.3708 32.0255H12.3588V53H0.587765V0.859998H12.3588V21.716H30.3708V0.859998H42.1023V53H30.3708V32.0255ZM44.3673 53V20.5705H56.3753V53H44.3673ZM50.5293 13.895C48.6333 13.895 47.027 13.2367 45.7103 11.92C44.3937 10.577 43.7353 8.98383 43.7353 7.1405C43.7353 5.29716 44.3937 3.704 45.7103 2.361C47.0533 0.991663 48.6597 0.306996 50.5293 0.306996C51.767 0.306996 52.8993 0.622996 53.9263 1.255C54.9533 1.86066 55.7828 2.677 56.4148 3.704C57.0468 4.731 57.3628 5.8765 57.3628 7.1405C57.3628 8.98383 56.6913 10.577 55.3483 11.92C54.0053 13.2367 52.399 13.895 50.5293 13.895ZM54.6151 20.5705H67.4526L75.2736 42.098L83.1341 20.5705H95.8926L82.3046 53H68.2426L54.6151 20.5705ZM103.19 39.333C103.269 40.4917 103.638 41.5187 104.296 42.414C104.955 43.3093 105.863 44.0203 107.022 44.547C108.207 45.0473 109.602 45.2975 111.209 45.2975C112.736 45.2975 114.105 45.1395 115.317 44.8235C116.554 44.5075 117.621 44.1125 118.516 43.6385C119.438 43.1645 120.149 42.6773 120.649 42.177L125.31 49.603C124.652 50.314 123.717 51.0118 122.506 51.6965C121.321 52.3548 119.754 52.8947 117.805 53.316C115.857 53.7373 113.394 53.948 110.419 53.948C106.837 53.948 103.651 53.2765 100.86 51.9335C98.0684 50.5905 95.8696 48.6155 94.2632 46.0085C92.6569 43.4015 91.8537 40.2152 91.8537 36.4495C91.8537 33.2895 92.5384 30.4455 93.9077 27.9175C95.3034 25.3632 97.3179 23.3487 99.9512 21.874C102.585 20.373 105.758 19.6225 109.471 19.6225C112.999 19.6225 116.054 20.2677 118.635 21.558C121.242 22.8483 123.243 24.7707 124.639 27.325C126.061 29.853 126.772 33.013 126.772 36.805C126.772 37.0157 126.759 37.437 126.732 38.069C126.732 38.701 126.706 39.1223 126.653 39.333H103.19ZM115.475 33.0525C115.448 32.2098 115.225 31.3803 114.803 30.564C114.382 29.7213 113.75 29.0367 112.907 28.51C112.065 27.957 110.985 27.6805 109.668 27.6805C108.352 27.6805 107.232 27.9438 106.311 28.4705C105.415 28.9708 104.731 29.6292 104.257 30.4455C103.783 31.2618 103.519 32.1308 103.467 33.0525H115.475ZM136.769 11.683L137.638 11.841V53H125.827V0.859998H141.943L163.076 41.94L162.207 42.098V0.859998H174.017V53H157.822L136.769 11.683ZM185.406 39.333C185.485 40.4917 185.853 41.5187 186.512 42.414C187.17 43.3093 188.079 44.0203 189.237 44.547C190.422 45.0473 191.818 45.2975 193.424 45.2975C194.952 45.2975 196.321 45.1395 197.532 44.8235C198.77 44.5075 199.836 44.1125 200.732 43.6385C201.653 43.1645 202.364 42.6773 202.865 42.177L207.526 49.603C206.867 50.314 205.933 51.0118 204.721 51.6965C203.536 52.3548 201.969 52.8947 200.021 53.316C198.072 53.7373 195.61 53.948 192.634 53.948C189.053 53.948 185.867 53.2765 183.075 51.9335C180.284 50.5905 178.085 48.6155 176.479 46.0085C174.872 43.4015 174.069 40.2152 174.069 36.4495C174.069 33.2895 174.754 30.4455 176.123 27.9175C177.519 25.3632 179.533 23.3487 182.167 21.874C184.8 20.373 187.973 19.6225 191.686 19.6225C195.215 19.6225 198.27 20.2677 200.85 21.558C203.457 22.8483 205.459 24.7707 206.854 27.325C208.276 29.853 208.987 33.013 208.987 36.805C208.987 37.0157 208.974 37.437 208.948 38.069C208.948 38.701 208.921 39.1223 208.869 39.333H185.406ZM197.69 33.0525C197.664 32.2098 197.44 31.3803 197.019 30.564C196.597 29.7213 195.965 29.0367 195.123 28.51C194.28 27.957 193.2 27.6805 191.884 27.6805C190.567 27.6805 189.448 27.9438 188.526 28.4705C187.631 28.9708 186.946 29.6292 186.472 30.4455C185.998 31.2618 185.735 32.1308 185.682 33.0525H197.69ZM205.317 20.5705H210.847V7.259H222.737V20.5705H230.005V30.4455H222.737V39.491C222.737 40.834 222.934 41.9268 223.329 42.7695C223.724 43.5858 224.449 43.994 225.502 43.994C226.213 43.994 226.819 43.836 227.319 43.52C227.819 43.204 228.122 42.9933 228.227 42.888L232.335 51.42C232.151 51.578 231.572 51.8677 230.597 52.289C229.649 52.7103 228.438 53.0922 226.963 53.4345C225.489 53.7768 223.843 53.948 222.026 53.948C218.787 53.948 216.114 53.0395 214.007 51.2225C211.901 49.3792 210.847 46.5483 210.847 42.73V30.4455H205.317V20.5705Z" fill="#FFC700" />
        </svg>

    </div>
    <div class="links_header">

        <a href="index.php">Home</a>
        <a href="all_card.php">Events</a>
        <a href="about.php">About</a>
        <a href="FAQ.php">FAQ</a>
        <?php

        if (!isset($_SESSION['roles'])) : ?>

            <a href="login.php" class="login_div">
                <span class="material-symbols-outlined">login</span>
                <div>Login</div>
            </a>
        <?php else : ?>
            <?php


            if ($role == 'admin') : ?>
                <div class="dropdown">
                    <button class="dropbtn">
                        <?php echo $fname; ?>
                        <span class="material-symbols-outlined">arrow_drop_down</span>
                    </button>
                    <div class="dropdown-content">
                        <a href="dashboard/index_dash.php">dashboard</a>
                        <a href="./user_profile/index_user.php">profile</a>
                        <a href="logout.php">logout</a>
                    </div>
                </div>
            <?php elseif ($role == 'user') : ?>

                <div class="dropdown">
                    <button class="dropbtn">
                        <?php echo $fname; ?>
                        <span class="material-symbols-outlined">arrow_drop_down</span>
                    </button>
                    <div class="dropdown-content">
                        <a href="user_profile/index_user.php">profile</a>
                                               <a href="logout.php">logout</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php
        endif; ?>




        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const form = document.getElementById('profileForm');
                const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                const confirmSubmit = document.getElementById('confirmSubmit');
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
                    modal.show();
                });
                confirmSubmit.addEventListener('click', () => {
                    form.submit();
                });
            });
        </script>

    </div>
</div> -->
<?php
// endif;
?>