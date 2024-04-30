<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="style/loadingScreen.css">
    <link rel="stylesheet" href="style/studentList_sidebar.css">
    <link rel="stylesheet" href="style/student_list.css">
    <link rel="stylesheet" href="style/dashboard.css">
    <link rel="stylesheet" href="style/calender.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Dashboard</title>
</head>


<body>
    <div class="loading-container" id="loading-container">
        <div class="loading-screen"></div>
    </div>
    <div class="content" id="content">


        <header class="header shrink">


            <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

            <div class="current-page-name">
                <p class="location">Administration/ <span class="exact-location">Dashboard</span></p>
            </div>

        </header>


        <main class="main-content-container">

            <div class=" vertical-nav-bar shrink">
                <ul class="nav-items shrink">
                    <ul class="nav-items ">
                    <li><a href="dashboard.php"><i class="fa-solid fa-objects-column"></i><span>Dashboard</span></a>
                        </li>
                        <li><a href="studentList.php"><i class="fa-solid fa-user-graduate"></i><span>Students</span></a>
                        </li>
                        <li><a href="teacherList.php"><i
                                    class="fa-duotone fa-person-chalkboard"></i><span>Teachers</span></a></li>
                        <li><a href="course.php"><i class="fa-duotone fa-book"></i><span>Courses</span></a></li>
                        <li><a href="notice.php"><i class="fa-regular fa-messages"></i><span>Notices</span></a></li>
                        <li><a href="semesterFee.php"><i class="fa-solid fa-money-check-dollar"></i><span>Semester
                                    Fee</span></a></li>
                        <li><a href="setting.php"><i class="fa-duotone fa-gear"></i><span>Settings</span></a></li>
                    </ul>
                </ul>
            </div>

            <div class="results-container narrow">
                <div class="left-side">
                    <div class="curriculum-summary">
                        <div class="students-div">
                            <div class="division">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <div class="stats">
                                <p class="name">students</p>
                                <div class="indication">
                                    <div class="color-1"></div>
                                    <p class="title">Male</p>

                                    <div class="color-2"></div>
                                    <p class="title">Female</p>
                                </div>
                                <span class="total-number">308</span>
                            </div>
                        </div>

                        <div class="teachers-div">
                            <div class="division">
                                <i class="fa-duotone fa-person-chalkboard"></i>
                            </div>
                            <div class="stats">
                                <p class="name">teacher</p>
                                <div class="indication">
                                    <div class="color-1"></div>
                                    <p class="title">Male</p>

                                    <div class="color-2"></div>
                                    <p class="title">Female</p>
                                </div>
                                <span class="total-number">308</span>
                            </div>
                        </div>

                        <div class="course-div">
                            <div class="division">
                                <i class="fa-duotone fa-book"></i>
                            </div>
                            <div class="stats">
                                <p class="name">course</p>
                                <div class="indication">
                                    <div class="color-1"></div>
                                    <p class="title">Science(Information Technology)</p>
                                </div>
                                <span class="total-number">308</span>
                            </div>
                        </div>
                    </div>


                    <section class="graph" id="graph">
                        <p>garph will come here</p>
                    </section>

                    <section class="recently-added">
                        <div class="top">
                            <h2>Recently Registered users</h2>
                            <a href="studentList.php">View All</a>
                        </div>

                        <table id="recentlyAddedTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>Department</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody id="resultBody">
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>

                <div class="right-side">
                    <section class="wrapper">
                        <header>
                            <p class="current-date"></p>
                            <div class="icons">
                                <span id="prev" class="material-symbols-rounded"><i
                                        class="fa-solid fa-chevron-left"></i></span>
                                <span id="next" class="material-symbols-rounded"><i
                                        class="fa-solid fa-chevron-right"></i></span>
                            </div>
                        </header>
                        <div class="calendar">
                            <ul class="weeks">
                                <li>Sun</li>
                                <li>Mon</li>
                                <li>Tue</li>
                                <li>Wed</li>
                                <li>Thu</li>
                                <li>Fri</li>
                                <li>Sat</li>
                            </ul>
                            <ul class="days"></ul>
                        </div>
                    </section>

                    <div class="noticeBoard-div">
                        <h2>Notices</h2>
                        <div class="notice-preview">
                            <h3 class="date">Saturday</h3>
                            <p class="text-content">Upcoming sunday will be a special day for college because of college
                                anniversary</p>
                            <div class="bottom">

                                <a href="">Read All</a>
                                <div class="posted-date"></div>
                            </div>
                        </div>

                        <div class="notice-preview">
                            <h3 class="date">Saturday</h3>
                            <p class="text-content">Upcoming sunday will be a special day for college because of college
                                anniversary</p>
                            <div class="bottom">

                                <a href="">Read All</a>
                                <div class="posted-date"></div>
                            </div>
                        </div>
                        <div class="notice-preview">
                            <h3 class="date">Saturday</h3>
                            <p class="text-content">Upcoming sunday will be a special day for college because of college
                                anniversary</p>
                            <div class="bottom">

                                <a href="">Read All</a>
                                <div class="posted-date"></div>
                            </div>
                        </div>
                        <div class="notice-preview">
                            <h3 class="date">Saturday</h3>
                            <p class="text-content">Upcoming sunday will be a special day for college because of college
                                anniversary</p>
                            <div class="bottom">

                                <a href="">Read All</a>
                                <div class="posted-date"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="script/loadingScreen.js" defer></script>
    <script type="module" src="script/home.js" defer></script>
    <script trpe="module" src="script/dashboard.js" defer></script>
    <script type="module" src="script/calender.js" defer></script>
</body>

</html>