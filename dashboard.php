<?php include 'include/include_session.php' ;?>


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

    <!--Includes-->
    <?php include ('include/include_toasterNotification.php') ?>
    <!--Include Ends-->

    <title>Dashboard</title>
</head>


<body>
    <div class="loading-container" id="loading-container">
        <div class="loading-screen"></div>
    </div>
    <div class="content" id="content">


        <header class="header ">


            <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">


            <div class="create_user <?php if (!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')) {
                echo 'disabled-div';
            } ?>">
                <i class="fa-solid fa-user-plus"></i>
                <button id="create" class="create" <?php if (!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')) {
                    echo 'disabled';
                } ?>>Create User</button>
            </div>

            <div class="current-page-name">
                <p class="location">Administration/ <span class="exact-location">Dashboard</span></p>
            </div>

            <i class="fa-solid fa-bars hamMenu"></i>

        </header>


        <main class="main-content-container">

            <div class=" vertical-nav-bar ">
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
            </div>

            <div class="results-container">
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
                                    <p class="title">Male (<span id="maleCount"></span>)</p>

                                    <div class="color-2"></div>
                                    <p class="title">Female (<span id="femaleCount"></span>)</p>
                                </div>
                                <span class="total-number"></span>
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
                                    <p class="title">Male (<span id="maleC"></span>)</p>

                                    <div class="color-2"></div>
                                    <p class="title">Female (<span id="femaleC"></span>)</p>
                                </div>
                                <span class="total-number teacherNum"></span>
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
                                <span class="total-number">8</span>
                            </div>
                        </div>
                    </div>


                    <canvas id="graph" class="graph" style="width:100%;max-width:900px"></canvas>


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


                    </div>
                </div>
            </div>

            <dialog>
                <form action="" method="post">
                    <i class="fa-solid fa-x closePopUp"></i>
                    <div class="form-control">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" id="fName">
                    </div>

                    <div class="form-control">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" id="lName">
                    </div>

                    <div class="form-control">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email">
                    </div>

                    <div class="form-control">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="gender">
                    </div>

                    <div class="form-control">
                        <label for="phoneNo">Phone Number</label>
                        <input type="number" name="phoneNumber" id="phoneNumber">
                    </div>

                    <div class="form-control">
                        <label for="department">Department</label>
                        <input type="text" name="department" id="department">
                    </div>

                    <div class="form-control">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address">
                    </div>

                    <button type="submit" id="register" class="register">Register</button>
                </form>
            </dialog>
        </main>
    </div>
    <script type="module" src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script src="script/loadingScreen.js" defer></script>
    <script type="module" src="script/home.js" defer></script>
    <script type="module" src="script/dashboard.js" defer></script>
    <script type="module" src="script/calender.js" defer></script>

</body>

</html>