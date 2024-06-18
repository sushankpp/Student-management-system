<?php
include 'include/include_HTMLheader.php';
?>



<title>Setting Page</title>

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
                                <input type="text" name="First-name" id="fname" class="editName change"
                                    value="<?php echo isset($_SESSION['first_name']) ? $_SESSION['first_name'] : ''; ?>"
                                    disabled>
                            </div>

                            <div class="">

                                <label for="Last Name" class="name lname">Last Name</label>
                                <input type="text" name="Last-name" id="lname" class="editName change"
                                    value="<?php echo isset($_SESSION['last_name']) ? $_SESSION['last_name'] : ''; ?>"
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
                                <img id="profileImage" src="internals/images/default-profile.png" alt="Profile Picture">
                            </div>

                            <div class="decidingButtons">

                                <label for="photoUploader" class="btnn changePhoto">Change Picture</label>

                                <input type="file" name="UpdateProfile" id="photoUploader" class="changeProfile">
                                <button class="btnn delete" id="deleteButton"><i
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
                                <input type="password" name="currentPass" id="currentPass" class="change" value="<?php
                                if (isset($_SESSION['role'])) {
                                    if ($_SESSION['role'] == 'admin') {
                                        echo isset($_SESSION['adminPassword']) ? $_SESSION['adminPassword'] : '';
                                    } else if ($_SESSION['role'] == 'student') {
                                        echo isset($_SESSION['password']) ? $_SESSION['password'] : '';
                                    }
                                }
                                ?>" disabled>


                            </div>

                            <div class="">
                                <label for="new password" class="newPass" id="newPass">new Password</label>
                                <input type="password" name="newPassword" id="newPassword" class="change" disabled>
                            </div>

                            <div class="">
                                <label for="confirm password" class="ConPass" id="ConPass">confirm Password</label>
                                <input type="password" name="confirmPass" id="confirmPass" class="change" disabled>
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
                <button class="btnn logoutBtn" id="logoutuser">LogOut</button>
                <button class="btnn EditBtn" value="edit">Edit</button>
            </section>
        </div>
    </main>
</div>
<script src="script/loadingScreen.js" defer></script>
<script src="script/setting.js" defer></script>