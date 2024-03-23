<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="style/studentList_sidebar.css">
    <link rel="stylesheet" href="style/student_list.css">
    <title>Course</title>
</head>

<body>
    <header class="header">


        <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

        <div class="current-page-name">
            <p class="location">Administration/ <span class="exact-location">Course List</span></p>
        </div>

    </header>


    <main class="main-content-container">

        <div class=" vertical-nav-bar ">
            <ul class="nav-items">
                <li><i class="fa-solid fa-objects-column"></i><a href="">Dashboard</a></li>
                <li><i class="fa-solid fa-user-graduate"></i><a href="">Students</a></li>
                <li><i class="fa-duotone fa-person-chalkboard"></i><a href="">Teachers</a></li>
                <li><i class="fa-duotone fa-book"></i><a href="">Courses</a></li>
                <li><i class="fa-regular fa-messages"></i><a href="">Notices</a></li>
                <li><i class="fa-solid fa-money-check-dollar"></i><a href="">Semester Fee</a></li>
                <li><i class="fa-duotone fa-gear"></i><a href="">Settings</a></li>
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
                        <th>Author</th>
                        <th>Department</th>
                        <th>Publication</th>
                </thead>

                <tbody>

                </tbody>
            </table>
        </div>
    </main>
    <script src="script/course.js" defer></script>
</body>

</html>