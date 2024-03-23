<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="style/studentList_sidebar.css">
    <link rel="stylesheet" href="style/student_list.css">

    <?php include ('include/include_toasterNotification.php') ?>

    <title>Teacher List</title>
</head>

<body>
    <header class="header">


        <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

        <div class="current-page-name">
            <p class="location">Administration/ <span class="exact-location">Teachers List</span></p>
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
            <table class="result-table">
                <thead>

                    <tr>
                        <th>Teacher ID</th>
                        <th>first name</th>
                        <th>last name</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>Department</th>
                    </tr>
                </thead>

                <tbody id="teacher-table-body">
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <form method="post" action="" id="teachersDetailForm">
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
    <script type="module" src="script/teacherList.js" defer></script>
</body>

</html>