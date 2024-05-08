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
    <link rel="stylesheet" href="style/table.css">

    <?php include ('include/include_toasterNotification.php') ?>

    <title>Student List</title>
</head>

<body>
    <div class="loading-container" id="loading-container">
        <div class="loading-screen"></div>
    </div>
    <div class="content" id="content">
        <header class="header">


            <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

            <div class="current-page-name">
                <p class="location">Administration/ <span class="exact-location">Students List</span></p>
            </div>

        </header>


        <main class="main-content-container">

            <div class=" vertical-nav-bar ">
                <ul class="nav-items">
                    
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
                <div class="sort-the-result">
                    <div class="input-search">
                        <input type="search" name="search" id="search" class="search">
                        <i class="fa-regular fa-magnifying-glass search-icon"></i>
                    </div>

                    <div class="sortings">
                        <select name="gender-select" id="gender-select" class="gender-select">
                            <option value="Gender" disabled selected>Gender</option>
                            <option value="All">All</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>

                        <select id="department-select" name="department-select" class="department-select">
                            <option value="Department" disabled selected>Department</option>
                            <option value="All">All</option>
                            <option value="BCA">BCA</option>
                            <option value="CSIT">CSIT</option>
                        </select>
                    </div>
                </div>

                <div class="Total-result">
                    <ul>
                        <li><a href="">All</a> <span id="number-of-std" class="number-of-std">
                                <?php //echo $total       ?>
                            </span></li>
                        <li><a href="">Present</a> <span class="number-of-std">43</span></li>
                    </ul>
                </div>

                <div class="total-result-page">
                    <p>Showing <span class="current-page">1</span>- <span class="cur-student">10</span> of <span
                            class="total-std">70</span> students</p>
                </div>


                <table class="result-table">
                    <thead>

                        <tr>
                            <th>Student ID</th>
                            <th>first name</th>
                            <th>last name</th>
                            <th>email</th>
                            <th>gender</th>
                            <th>Department</th>
                        </tr>
                    </thead>

                    <tbody id="student-table-body">
                        <tr>
                        </tr>
                    </tbody>
                </table>
                <div class="pagination">
                    <button id="prevPageBtn" class="btn prevBtn" disabled>Previous</button>
                    <span id="currentPage">1</span>
                    <button id="nextPageBtn" class="btn nextBtn">Next</button>
                </div>
            </div>
        </main>

        <form method="post" action="" id="studentDetailsForm">
            <section class="details">
                <div class="studentDetails">
                    <h2>Student Details</h2>

                    <div class="ref-id-div">
                        <p class="ref-id">ref id</p>
                        <input type="text" id="dont-edit-id" name="id" class="value id" value="" disabled>
                    </div>

                    <div class="fName">
                        <p class="first-name">first name</p>
                        <input type="text" class="value firstN" name="first_name" id="first_name" value="" disabled>
                    </div>

                    <div class="lName">
                        <p class="last-name">last name</p>
                        <input type="text" class="value lastN" name="last_name" value="" disabled>
                    </div>

                    <div class="gender-div">
                        <p class="fgender">gender</p>
                        <input type="text" class="value sex" name="gender" value="" disabled>
                    </div>

                    <div class="email-div">
                        <p class="email">email</p>
                        <input type="email" class="value Uemail" name="email" value="" disabled>
                    </div>

                    <div class="address-div">
                        <p class="address">address</p>
                        <input type="text" class="value location" name="address" value="" disabled>
                    </div>

                    <div class="department-div">
                        <p class="department">department</p>
                        <input type="text" class="value division" name="department" value="" disabled>
                    </div>

                    <div class="stauts-div">
                        <p class="current-status">current status</p>
                        <span class="value">student</span>
                    </div>

                    <button type="button" value="edit" name="edit" id="edit_student" class="edit btn">edit</button>
                    <button type="button" value="delete" name="delete" id="delete_student"
                        class="delete btn">delete</button>
                </div>
            </section>
        </form>


        <!-- <script type="module" src="script/studentList.js" defer></script> -->
        <script type="module" src="script/studentList2.js" defer></script>
        <script src="script/loadingScreen.js" defer></script>
        <!--    <script type="module" src="script/notification.js" defer></script>-->
    </div>

</body>

</html>