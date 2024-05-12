<?php
include 'include/include_session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="style/studentList_sidebar.css">
    <link rel="stylesheet" href="style/loadingScreen.css">
    <link rel="stylesheet" href="style/student_list.css">
    <link rel="stylesheet" href="style/setting.css">
    <title>Setting Page</title>
</head>

<body>
    <div class="loading-container" id="loading-container">
        <div class="loading-screen"></div>
    </div>
    <div class="content" id="content">
        <header class="header">


            <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">

            <div class="current-page-name">
                <p class="location">Administration/ <span class="exact-location">Setting</span></p>
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
                <h1>Personal Settings</h1>

                <div class="settings">

                    <div class="left-side">


                        <section class="personProfileInfo info">
                            <div class=" profileInfo">

                                <h2>Profile</h2>
                                <p>This information is displayed to public. So, be mindful about what you
                                    write here.</p>
                            </div>

                            <div class="names">
                                <div class="first">

                                    <label for="First Name" class="name fname">First Name</label>
                                    <input type="text" name="First-name" id="fname" class="editName" value="<?php echo $_SESSION['first_name']; ?>"
                                        disabled>
                                </div>

                                <div class="">

                                    <label for="Last Name" class="name lname">Last Name</label>
                                    <input type="text" name="Last-name" id="lname" class="editName" value="<?php echo $_SESSION['last_name']; ?>"
                                        disabled>
                                </div>
                            </div>
                        </section>

                        <section class="profilePictureInfo info">
                            <div class=" profilePictureHeader">
                                <h2>Profile Picture</h2>
                            </div>

                            <div class="updateProfilePicture">
                                <div class="profilePicture">
                                    <img id="profileImage" src="internals/images/default-profile.png"
                                        alt="Profile Picture">
                                </div>

                                <div class="decidingButtons">

                                    <label for="photoUploader" class="button changePhoto">Change Picture</label>

                                    <input type="file" name="UpdateProfile" id="photoUploader" class="changeProfile">
                                    <button class="button delete" id="deleteButton"><i
                                            class="fa-solid fa-trash-can"></i>Delete</button>
                                </div>

                            </div>
                        </section>
                    </div>

                    <div class="right-side">
                        <section class="changePasswordDiv info">
                            <div class="  changePasswordInfo">
                                <h2>Change Password</h2>
                                <p>This will be used to log into your account. So, change the password
                                    responsibly in your own accord.</p>
                            </div>

                            <div class="passwords">
                                <div class="">

                                    <label for="Current password" class="CurPass" id="CurPass">Current Password</label>
                                    <input type="password" name="currentPass" id="currentPass" disabled>
                                </div>

                                <div class="">
                                    <label for="new password" class="newPass" id="newPass">new Password</label>
                                    <input type="password" name="newPassword" id="newPassword" disabled>
                                </div>

                                <div class="">
                                    <label for="confirm password" class="ConPass" id="ConPass">confirm Password</label>
                                    <input type="password" name="confirmPass" id="confirmPass" disabled>
                                </div>
                            </div>
                        </section>

                        <section class="darkModeEnable info">
                            <div class=" darkModeInfo">
                                <h2>Dark Mode</h2>
                                <p> To change the color of the page, you can switch to dark mode.</p>
                            </div>

                            <div class="checkbox">
                                <label for="darkMode" class="toggle" id="mytoggle">
                                    <input type="checkbox" name="darkMode" id="darkMode" class="toggle_input">
                                    <div class="toggle-fill"></div>
                                </label>
                            </div>
                        </section>
                    </div>

                </div>
                <section class="saveOrLogout">
                    <button class="button logoutBtn" id="logoutuser">LogOut</button>
                    <button class="button EditBtn">Edit</button>
                </section>
            </div>
        </main>
    </div>
    <script src="script/loadingScreen.js" defer></script>
    <script src="script/setting.js" defer></script>
</body>

</html>