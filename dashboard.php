<?php
include 'backend/dbConnect.php';
include 'backend/studentListHandler.php';
include 'include/include_toasterNotification.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="style/studentList_sidebar.css">
    <link rel="stylesheet" href="style/student_list.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Dashboard</title>
</head>


<body>
    <header class="header">


        <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

        <div class="current-page-name">
            <p class="location">Administration/ <span class="exact-location"></span></p>
        </div>

    </header>


    <main class="main-content-container">

        <div class=" vertical-nav-bar ">
            <ul class="nav-items">
                <li><i class="fa-solid fa-objects-column"></i><a href="dashboard.php">Dashboard</a></li>
                <li><i class="fa-solid fa-user-graduate"></i><a href="studentList.php">Students</a></li>
                <li><i class="fa-duotone fa-person-chalkboard"></i><a href="teacherList.php">Teachers</a></li>
                <li><i class="fa-duotone fa-book"></i><a href="course.php">Courses</a></li>
                <li><i class="fa-regular fa-messages"></i><a href="">Notices</a></li>
                <li><i class="fa-solid fa-money-check-dollar"></i><a href="">Semester Fee</a></li>
                <li><i class="fa-duotone fa-gear"></i><a href="">Settings</a></li>
            </ul>
        </div>

        <div class="results-container">

        </div>
    </main>
    <script type="module" src="script/home.js" defer></script>
</body>

</html>