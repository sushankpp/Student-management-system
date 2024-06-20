<?php
include_once ('include/include_session.php');
include_once ('register.php');
include_once ('login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style/form.css">
    <link rel="stylesheet" href="style/index.css">

    <!--Includes-->
    <?php include ('include/include_toasterNotification.php') ?>
    <!--Include Ends-->

    <title>St. Lawrence College</title>
</head>

<body>
    <video autoplay loop muted plays-inline class="play-back-video">
        <source src="internals/videos/st.lawrence.video.mp4" type="video/mp4">
    </video>
    <!-- header-section -->
    <nav class="header">
        <div class="logo">
            <a href="homePage.php"> <img src="internals/images/st-lawrence-logo.png" alt="st lawrence college logo"
                    class="college-logo"></a>
        </div>
        <div class="nav-bar">
            <ul class="navbar">
                <li><a href="" target="_blank">Programs</a></li>
                <li><a href="" target="_blank">Our staff</a></li>
                <li><a href="" target="_blank">Gallery</a></li>
                <li><a href="" target="_blank">Contact us</a></li>
            </ul>
        </div>
        <div class="join">
            <div class="login">
                <i class='bx bxs-user'></i>
                <a href="#" class="login-with-us loggin">Login</a>
            </div>
        </div>
        <i class='bx bx-menu hamburger-menu'></i>
    </nav>


    <!-- main content area -->
    <main class="main-container">

        <h1> Welcome to St. Lawrence </h1>
        <p class="about-text">
            St. Lawrence Secondary School is one of the leading academic institutions in Nepal, was established
            in 1997
            AD. It is recognized for its friendly, caring, disciplined and excellent academic environment. We
            focus to
            stretch the admirable learning atmosphere to all the students to support them to develop the best
            that is
            embryonic in children, to prepare them for the upcoming challenges to face the changing world by
            developing
            their inter- personal potential skills and talents.
        </p>


        <a href="#" class="join-now">Join Now</a>

        <section class="join-now-pop-up">
            <div class="login">
                <i class='bx bxs-user'></i>
                <a href="#" class=" pop-up-login loggin">Log in</a>
            </div>
            <div class="register">
                <i class='bx bxs-user-plus'></i>
                <a href="#" class="pop-up-register reggister" data-script="script/register.js">Register</a>
            </div>
        </section>
    </main>


    <script type="module" src="script/form.js" defer></script>
    <script type="module" src="script/index.js" defer></script>
    <script type="module" src="script/login.js" defer></script>
    <script type="module" src="script/register.js" defer></script>



    <script type="module" src="script/notification.js" defer></script>

</body>

</html>