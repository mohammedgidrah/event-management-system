<?php include '../includes/fetch.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile and View Tickets</title>

    <!-- fonts
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=LXGW+WenKai+Mono+TC&family=League+Spartan:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    icons
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    style
    <link href="../styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/sts.css">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="user.css"> -->


</head>

<body>
    <?php
    // include '../includes/header.php';
    ?>

    <?php
    include "../connection.php";
    // session_start();
    ?>



    <head>

        <!-- <link rel="stylesheet" href="../styles/nav.php" /> -->
        <!-- <link rel="stylesheet" href="./styles/nav.css?v=<?php echo time(); ?>"> -->
        <link rel="stylesheet" href="../styles/index_user.css?v=<?php echo time(); ?>">




    </head>
    <style>
    .navbar_user {
        overflow: hidden;
        background-color: #26355D;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        padding-right: 65px;
    }
    *, *:before, *:after {
  box-sizing: border-box;
}

html {
  font-size: 100%;
}

body {
  font-family: acumin-pro, system-ui, sans-serif;
  margin: 0;
  display: grid;
  grid-template-rows: auto 1fr auto;
  font-size: 14px;
  background-color: #f4f4f4;
  align-items: start;
  min-height: 100vh;
}

.footer {
  display: flex;
  flex-flow: row wrap;
  padding: 30px 30px 20px 30px;
  color: #2f2f2f;
  background-color: #fff;
  border-top: 1px solid #e5e5e5;
}

.footer > * {
  flex:  1 100%;
}

.footer__addr {
  margin-right: 1.25em;
  margin-bottom: 2em;
}

.footer__logo {
  font-family: 'Pacifico', cursive;
  font-weight: 400;
  text-transform: lowercase;
  font-size: 1.5rem;
}

.footer__addr h2 {
  margin-top: 1.3em;
  font-size: 15px;
  font-weight: 400;
}

.nav__title {
  font-weight: 400;
  font-size: 15px;
}

.footer address {
  font-style: normal;
  color: #999;
}

.footer__btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 36px;
  max-width: max-content;
  background-color: rgb(33, 33, 33, 0.07);
  border-radius: 100px;
  color: #2f2f2f;
  line-height: 0;
  margin: 0.6em 0;
  font-size: 1rem;
  padding: 0 1.3em;
}

.footer ul {
  list-style: none;
  padding-left: 0;
}

.footer li {
  line-height: 2em;
}

.footer a {
  text-decoration: none;
}

.footer__nav {
  display: flex;
	flex-flow: row wrap;
}

.footer__nav > * {
  flex: 1 50%;
  margin-right: 1.25em;
}

.nav__ul a {
  color: #999;
}

.nav__ul--extra {
  column-count: 2;
  column-gap: 1.25em;
}

.legal {
  display: flex;
  /* justify-contant: center; */
  align-items: center;
  justify-content:center;
  flex-wrap: wrap;
  color: #999;
}
  
.legal__links {
  display: flex;
  align-items: center;
}

.heart {
  color: #2f2f2f;
}

@media screen and (min-width: 24.375em) {
  .legal .legal__links {
    margin-left: auto;
  }
}

@media screen and (min-width: 40.375em) {
  .footer__nav > * {
    flex: 1;
  }
  
  .nav__item--extra {
    flex-grow: 2;
  }
  
  .footer__addr {
    flex: 1 0px;
  }
  
  .footer__nav {
    flex: 2 0px;
  }
}
    </style>

    <body style="background-color:white;">
        <div class="navbar_user" id="navbarNav">
            <div class="logo_user">
                <button class="navbar-toggler" onclick="toggleNavbar()">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <svg width="233" height="54" viewBox="0 0 233 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M30.3708 32.0255H12.3588V53H0.587765V0.859998H12.3588V21.716H30.3708V0.859998H42.1023V53H30.3708V32.0255ZM44.3673 53V20.5705H56.3753V53H44.3673ZM50.5293 13.895C48.6333 13.895 47.027 13.2367 45.7103 11.92C44.3937 10.577 43.7353 8.98383 43.7353 7.1405C43.7353 5.29716 44.3937 3.704 45.7103 2.361C47.0533 0.991663 48.6597 0.306996 50.5293 0.306996C51.767 0.306996 52.8993 0.622996 53.9263 1.255C54.9533 1.86066 55.7828 2.677 56.4148 3.704C57.0468 4.731 57.3628 5.8765 57.3628 7.1405C57.3628 8.98383 56.6913 10.577 55.3483 11.92C54.0053 13.2367 52.399 13.895 50.5293 13.895ZM54.6151 20.5705H67.4526L75.2736 42.098L83.1341 20.5705H95.8926L82.3046 53H68.2426L54.6151 20.5705ZM103.19 39.333C103.269 40.4917 103.638 41.5187 104.296 42.414C104.955 43.3093 105.863 44.0203 107.022 44.547C108.207 45.0473 109.602 45.2975 111.209 45.2975C112.736 45.2975 114.105 45.1395 115.317 44.8235C116.554 44.5075 117.621 44.1125 118.516 43.6385C119.438 43.1645 120.149 42.6773 120.649 42.177L125.31 49.603C124.652 50.314 123.717 51.0118 122.506 51.6965C121.321 52.3548 119.754 52.8947 117.805 53.316C115.857 53.7373 113.394 53.948 110.419 53.948C106.837 53.948 103.651 53.2765 100.86 51.9335C98.0684 50.5905 95.8696 48.6155 94.2632 46.0085C92.6569 43.4015 91.8537 40.2152 91.8537 36.4495C91.8537 33.2895 92.5384 30.4455 93.9077 27.9175C95.3034 25.3632 97.3179 23.3487 99.9512 21.874C102.585 20.373 105.758 19.6225 109.471 19.6225C112.999 19.6225 116.054 20.2677 118.635 21.558C121.242 22.8483 123.243 24.7707 124.639 27.325C126.061 29.853 126.772 33.013 126.772 36.805C126.772 37.0157 126.759 37.437 126.732 38.069C126.732 38.701 126.706 39.1223 126.653 39.333H103.19ZM115.475 33.0525C115.448 32.2098 115.225 31.3803 114.803 30.564C114.382 29.7213 113.75 29.0367 112.907 28.51C112.065 27.957 110.985 27.6805 109.668 27.6805C108.352 27.6805 107.232 27.9438 106.311 28.4705C105.415 28.9708 104.731 29.6292 104.257 30.4455C103.783 31.2618 103.519 32.1308 103.467 33.0525H115.475ZM136.769 11.683L137.638 11.841V53H125.827V0.859998H141.943L163.076 41.94L162.207 42.098V0.859998H174.017V53H157.822L136.769 11.683ZM185.406 39.333C185.485 40.4917 185.853 41.5187 186.512 42.414C187.17 43.3093 188.079 44.0203 189.237 44.547C190.422 45.0473 191.818 45.2975 193.424 45.2975C194.952 45.2975 196.321 45.1395 197.532 44.8235C198.77 44.5075 199.836 44.1125 200.732 43.6385C201.653 43.1645 202.364 42.6773 202.865 42.177L207.526 49.603C206.867 50.314 205.933 51.0118 204.721 51.6965C203.536 52.3548 201.969 52.8947 200.021 53.316C198.072 53.7373 195.61 53.948 192.634 53.948C189.053 53.948 185.867 53.2765 183.075 51.9335C180.284 50.5905 178.085 48.6155 176.479 46.0085C174.872 43.4015 174.069 40.2152 174.069 36.4495C174.069 33.2895 174.754 30.4455 176.123 27.9175C177.519 25.3632 179.533 23.3487 182.167 21.874C184.8 20.373 187.973 19.6225 191.686 19.6225C195.215 19.6225 198.27 20.2677 200.85 21.558C203.457 22.8483 205.459 24.7707 206.854 27.325C208.276 29.853 208.987 33.013 208.987 36.805C208.987 37.0157 208.974 37.437 208.948 38.069C208.948 38.701 208.921 39.1223 208.869 39.333H185.406ZM197.69 33.0525C197.664 32.2098 197.44 31.3803 197.019 30.564C196.597 29.7213 195.965 29.0367 195.123 28.51C194.28 27.957 193.2 27.6805 191.884 27.6805C190.567 27.6805 189.448 27.9438 188.526 28.4705C187.631 28.9708 186.946 29.6292 186.472 30.4455C185.998 31.2618 185.735 32.1308 185.682 33.0525H197.69ZM205.317 20.5705H210.847V7.259H222.737V20.5705H230.005V30.4455H222.737V39.491C222.737 40.834 222.934 41.9268 223.329 42.7695C223.724 43.5858 224.449 43.994 225.502 43.994C226.213 43.994 226.819 43.836 227.319 43.52C227.819 43.204 228.122 42.9933 228.227 42.888L232.335 51.42C232.151 51.578 231.572 51.8677 230.597 52.289C229.649 52.7103 228.438 53.0922 226.963 53.4345C225.489 53.7768 223.843 53.948 222.026 53.948C218.787 53.948 216.114 53.0395 214.007 51.2225C211.901 49.3792 210.847 46.5483 210.847 42.73V30.4455H205.317V20.5705Z"
                        fill="#FFC700" />
                </svg>
            </div>
            <div class="links">

                <a href="../index.php">Home</a>
                <a href="../all_card.php">Events</a>
                <a href="../about.php">About</a>
                <a href="../FAQ.php">FAQ</a>
                <?php
                $user_id = $_SESSION['user_id'];

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
                ?>
                <?php if (!isset($_SESSION['roles'])) : ?>
                <?php
                    echo 'not setted : ' . $_SESSION['user_id']
                    ?>
                <a href="login.php" class="login_div_user">
                    <span class="material-symbols-outlined">login</span>
                    <div>Login</div>
                </a>
                <?php else : ?>
                <?php
                    $role = $_SESSION['roles'];
                    // echo '' . isset($role) . '';
                    if ($role == 'admin') :
                    ?>
                <div class="dropdown_user">
                    <button class="dropbtn_user">
                        <span><?php echo "{$row['fname']}" ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path
                                d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659" />
                        </svg> </button>
                    <div class="dropdown-content_user">
                        <a href="../dashboard/index_dash.php">dashboard</a>
                        <a href="../logout.php">logout</a>
                    </div>
                </div>
                <?php elseif ($role == 'user') : ?>
                <div class="dropdown_user">
                    <button class="dropbtn_user">
                        <span><?php echo "{$row['fname']}" ?></span>
                        <span class="material-symbols-outlined">arrow_drop_down</span>
                    </button>
                    <div class="dropdown-content_user">
                        <!-- <a href="user_profile/index_user.php">profile</a> -->
                        <!-- <a href="comment.php">add review</a> -->
                        <a href="../logout.php">logout</a>
                    </div>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </body>

</html>
</body>

</html>



<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header"><a href="../index.php" style="  text-decoration: none;">Go Back</a></div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2 w-25"
                        src="https://img.freepik.com/vector-premium/avatar-icono-plano-glifo-blanco-humano-sobre-fondo-azul_822686-239.jpg?w=826"
                        alt="">
                    <div class="mb-2">
                        <h5 class="card-title">
                            <?= htmlspecialchars($user['fname']) . ' ' . htmlspecialchars($user['lname']) ?></h5>
                        <p class="card-text">You have <?= htmlspecialchars($ticket_count) ?> tickets</p>
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
                <div class="card-header">Your Tickets</div>
                <div class="card-body">
                    <?php include 'Tickets.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Footer Section -->
<!-- <footer>
        <div class="footer-container">
            <div class="left-section">
                <p>© 2024 HiveNet</p>
            </div>
            <div class="center-section">
                <img src="../img/footer_logo.svg" alt="HiveNet Logo">
            </div>
            <div class="right-section">
                <a href="../FAQ.php" class="FAQ">FAQs</a>
                <a href="#"><span class="material-symbols-outlined">mail</span></a>
                <a href="#"><span class="material-symbols-outlined">call</span></a>
            </div>
        </div>
</footer>-->






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
            *, *:before, *:after {
  box-sizing: border-box;
}

html {
  font-size: 100%;
}

body {
  font-family: acumin-pro, system-ui, sans-serif;
  margin: 0;
  display: grid;
  grid-template-rows: auto 1fr auto;
  font-size: 14px;
  background-color: #f4f4f4;
  align-items: start;
  min-height: 100vh;
}

.footer {
  display: flex;
  flex-flow: row wrap;
  padding: 30px 30px 20px 30px;
  color: #2f2f2f;
  background-color: #fff;
  border-top: 1px solid #e5e5e5;
}

.footer > * {
  flex:  1 100%;
}

.footer__addr {
  margin-right: 1.25em;
  margin-bottom: 2em;
}

.footer__logo {
  font-family: 'Pacifico', cursive;
  font-weight: 400;
  text-transform: lowercase;
  font-size: 1.5rem;
}

.footer__addr h2 {
  margin-top: 1.3em;
  font-size: 15px;
  font-weight: 400;
}

.nav__title {
  font-weight: 400;
  font-size: 15px;
}

.footer address {
  font-style: normal;
  color: #999;
}

.footer__btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 36px;
  max-width: max-content;
  background-color: rgb(33, 33, 33, 0.07);
  border-radius: 100px;
  color: #2f2f2f;
  line-height: 0;
  margin: 0.6em 0;
  font-size: 1rem;
  padding: 0 1.3em;
}

.footer ul {
  list-style: none;
  padding-left: 0;
}

.footer li {
  line-height: 2em;
}

.footer a {
  text-decoration: none;
}

.footer__nav {
  display: flex;
	flex-flow: row wrap;
}

.footer__nav > * {
  flex: 1 50%;
  margin-right: 1.25em;
}

.nav__ul a {
  color: #999;
}

.icon{
    display:flex;
    gap:20px;
    justify-content:center;
    margin-top:20px;
}
.nav__ul--extra {
  column-count: 2;
  column-gap: 1.25em;
}

.legal {
  display: flex;
  /* justify-contant: center; */
  align-items: center;
  justify-content:center;
  flex-wrap: wrap;
  color: #999;
}
  
.legal__links {
  display: flex;
  align-items: center;
}

.heart {
  color: #2f2f2f;
}

@media screen and (min-width: 24.375em) {
  .legal .legal__links {
    margin-left: auto;
  }
}

@media screen and (min-width: 40.375em) {
  .footer__nav > * {
    flex: 1;
  }
  
  .nav__item--extra {
    flex-grow: 2;
  }
  
  .footer__addr {
    flex: 1 0px;
  }
  
  .footer__nav {
    flex: 2 0px;
  }
}
.footer__logo{
    align-items: center;
    display: flex;
    justify-content: center;
}
.nav__title1{
    align-items: center;
    display: flex;
    justify-content: center;
    font-size:15px;
}
    </style>
</head>
<body>


<main>
  <!-- Content -->
</main>

<footer class="footer">
  <div class="footer__addr">
    <h1 class="footer__logo">
    <svg width="200" height="40" viewBox="0 0 233 54" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M30.3708 32.0255H12.3588V53H0.587765V0.859998H12.3588V21.716H30.3708V0.859998H42.1023V53H30.3708V32.0255ZM44.3673 53V20.5705H56.3753V53H44.3673ZM50.5293 13.895C48.6333 13.895 47.027 13.2367 45.7103 11.92C44.3937 10.577 43.7353 8.98383 43.7353 7.1405C43.7353 5.29716 44.3937 3.704 45.7103 2.361C47.0533 0.991663 48.6597 0.306996 50.5293 0.306996C51.767 0.306996 52.8993 0.622996 53.9263 1.255C54.9533 1.86066 55.7828 2.677 56.4148 3.704C57.0468 4.731 57.3628 5.8765 57.3628 7.1405C57.3628 8.98383 56.6913 10.577 55.3483 11.92C54.0053 13.2367 52.399 13.895 50.5293 13.895ZM54.6151 20.5705H67.4526L75.2736 42.098L83.1341 20.5705H95.8926L82.3046 53H68.2426L54.6151 20.5705ZM103.19 39.333C103.269 40.4917 103.638 41.5187 104.296 42.414C104.955 43.3093 105.863 44.0203 107.022 44.547C108.207 45.0473 109.602 45.2975 111.209 45.2975C112.736 45.2975 114.105 45.1395 115.317 44.8235C116.554 44.5075 117.621 44.1125 118.516 43.6385C119.438 43.1645 120.149 42.6773 120.649 42.177L125.31 49.603C124.652 50.314 123.717 51.0118 122.506 51.6965C121.321 52.3548 119.754 52.8947 117.805 53.316C115.857 53.7373 113.394 53.948 110.419 53.948C106.837 53.948 103.651 53.2765 100.86 51.9335C98.0684 50.5905 95.8696 48.6155 94.2632 46.0085C92.6569 43.4015 91.8537 40.2152 91.8537 36.4495C91.8537 33.2895 92.5384 30.4455 93.9077 27.9175C95.3034 25.3632 97.3179 23.3487 99.9512 21.874C102.585 20.373 105.758 19.6225 109.471 19.6225C112.999 19.6225 116.054 20.2677 118.635 21.558C121.242 22.8483 123.243 24.7707 124.639 27.325C126.061 29.853 126.772 33.013 126.772 36.805C126.772 37.0157 126.759 37.437 126.732 38.069C126.732 38.701 126.706 39.1223 126.653 39.333H103.19ZM115.475 33.0525C115.448 32.2098 115.225 31.3803 114.803 30.564C114.382 29.7213 113.75 29.0367 112.907 28.51C112.065 27.957 110.985 27.6805 109.668 27.6805C108.352 27.6805 107.232 27.9438 106.311 28.4705C105.415 28.9708 104.731 29.6292 104.257 30.4455C103.783 31.2618 103.519 32.1308 103.467 33.0525H115.475ZM136.769 11.683L137.638 11.841V53H125.827V0.859998H141.943L163.076 41.94L162.207 42.098V0.859998H174.017V53H157.822L136.769 11.683ZM185.406 39.333C185.485 40.4917 185.853 41.5187 186.512 42.414C187.17 43.3093 188.079 44.0203 189.237 44.547C190.422 45.0473 191.818 45.2975 193.424 45.2975C194.952 45.2975 196.321 45.1395 197.532 44.8235C198.77 44.5075 199.836 44.1125 200.732 43.6385C201.653 43.1645 202.364 42.6773 202.865 42.177L207.526 49.603C206.867 50.314 205.933 51.0118 204.721 51.6965C203.536 52.3548 201.969 52.8947 200.021 53.316C198.072 53.7373 195.61 53.948 192.634 53.948C189.053 53.948 185.867 53.2765 183.075 51.9335C180.284 50.5905 178.085 48.6155 176.479 46.0085C174.872 43.4015 174.069 40.2152 174.069 36.4495C174.069 33.2895 174.754 30.4455 176.123 27.9175C177.519 25.3632 179.533 23.3487 182.167 21.874C184.8 20.373 187.973 19.6225 191.686 19.6225C195.215 19.6225 198.27 20.2677 200.85 21.558C203.457 22.8483 205.459 24.7707 206.854 27.325C208.276 29.853 208.987 33.013 208.987 36.805C208.987 37.0157 208.974 37.437 208.948 38.069C208.948 38.701 208.921 39.1223 208.869 39.333H185.406ZM197.69 33.0525C197.664 32.2098 197.44 31.3803 197.019 30.564C196.597 29.7213 195.965 29.0367 195.123 28.51C194.28 27.957 193.2 27.6805 191.884 27.6805C190.567 27.6805 189.448 27.9438 188.526 28.4705C187.631 28.9708 186.946 29.6292 186.472 30.4455C185.998 31.2618 185.735 32.1308 185.682 33.0525H197.69ZM205.317 20.5705H210.847V7.259H222.737V20.5705H230.005V30.4455H222.737V39.491C222.737 40.834 222.934 41.9268 223.329 42.7695C223.724 43.5858 224.449 43.994 225.502 43.994C226.213 43.994 226.819 43.836 227.319 43.52C227.819 43.204 228.122 42.9933 228.227 42.888L232.335 51.42C232.151 51.578 231.572 51.8677 230.597 52.289C229.649 52.7103 228.438 53.0922 226.963 53.4345C225.489 53.7768 223.843 53.948 222.026 53.948C218.787 53.948 216.114 53.0395 214.007 51.2225C211.901 49.3792 210.847 46.5483 210.847 42.73V30.4455H205.317V20.5705Z"
                fill="#FFC700" />
        </svg>
    </h1>
        
    <h2 style="align-items: center;
    display: flex;
    justify-content: center;">Contact</h2>
    <div class="icon">

        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
    </svg>
    
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
      <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
    </svg>
    
    
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
      <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
    </svg>
    </div>
    </div>
    
  
  <ul class="footer__nav">

    
    <li class="nav__item nav__item--extra">
      <h2 class="nav__title">Technology</h2>
      
      <ul class="nav__ul nav__ul--extra">
        <li>
          <a href="#">Html</a>
        </li>
        
        <li>
          <a href="#">Css</a>
        </li>
        
        <li>
          <a href="#">Java Script</a>
        </li>
        
        <li>
          <a href="#">PHP</a>
        </li>
        
        <li>
          <a href="#">Bootstrap</a>
        </li>
    
      </ul>
    </li>
    
    <li class="nav__item">
      <h2 class="nav__title">services</h2>
      
      <ul class="nav__ul">
        <li>
          <a href="../all_card.php">events</a>
        </li>

        
        <li>
          <a href="../FAQ.php">FAQ</a>
        </li>
        <li>
          <a href="../about.php">about</a>
        </li>
      </ul>
    </li>
  </ul>
  
  <div class="legal">
    <p>&copy; 2024. All rights reserved.</p>
<!--     
    <div class="legal__links">
      <span>Made with <span class="heart">♥</span> remotely from Anywhere</span>
    </div> -->
  </div>
</footer>
</body>
</html>








<script src="../script/popup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function toggleNavbar() {
    var navbarNav = document.getElementById("navbarNav");
    navbarNav.classList.toggle("show");
}
</script>
</body>

</html>