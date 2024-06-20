<?php include 'include/include_HTMLheader.php'; ?>

<title>Course List</title>

<div class="loading-container" id="loading-container">
    <div class="loading-screen"></div>
</div>
<div class="content" id="content">
    <header class="header">


        <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

        <div class="current-page-name">
            <p class="location">Administration/ <span class="exact-location">Course List</span></p>
        </div>

        <i class="fa-solid fa-bars hamMenu"></i>
    </header>


    <main class="main-content-container">

        <div class=" vertical-nav-bar ">
            <ul class="nav-items">

                <li><a href="dashboard.php"><i class="fa-solid fa-objects-column"></i><span>Dashboard</span></a>
                </li>
                <li><a href="studentList.php"><i class="fa-solid fa-user-graduate"></i><span>Students</span></a>
                </li>
                <li><a href="teacherList.php"><i class="fa-duotone fa-person-chalkboard"></i><span>Teachers</span></a>
                </li>
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


                    <select id="department-select" name="department-select" class="department-select">
                        <option value="Department" disabled selected>Department</option>
                        <option value="All">All</option>
                        <option value="BCA">BCA</option>
                        <option value="CSIT">CSIT</option>
                    </select>
                </div>
            </div>
            <table class="result-table">
                <thead>

                    <tr>
                        <th>SN</th>
                        <th>Book Name</th>
                        <th>Semester</th>
                        <th>Department</th>
                        <th>Publication</th>
                        <th>TeacherID</th>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </main>
</div>
<script src="script/course.js" defer></script>
<script src="script/loadingScreen.js" defer></script>