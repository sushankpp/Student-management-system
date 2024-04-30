<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="shortcut icon" href="internals/images/st-lawrence-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/loadingScreen.js">
    <link rel="stylesheet" href="style/studentList_sidebar.css">
    <link rel="stylesheet" href="style/student_list.css">
    <link rel="stylesheet" href="style/fee.css">

    <title>Semester Fee Payment Page</title>
</head>

<body>

    <body>
        <div class="loading-container" id="loading-container">
            <div class="loading-screen"></div>
        </div>
        <div class="content" id="content">


            <header class="header">
                <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">
                <div class="current-page-name">
                    <p class="location">Administration/ <span class="exact-location">Semester Fee</span></p>
                </div>

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
                        <li><a href=""><i class="fa-duotone fa-gear"></i><span>Settings</span></a></li>
                    </ul>
                </div>

                <div class="results-container">
                    <p class="prior-notice">Please select a payment method and your semester to proceed further.</p>

                    <form action="" method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        semester
                                    </td>
                                    <td>
                                        <select name="Semester-select" id="Semester-select">
                                            <option value="Select your semester" selected disabled>Select your semester
                                            </option>
                                            <option value="BCA(4th)">BCA(4th)</option>
                                            <option value="CSIT(4th)">CSIT(4th)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Payment Method</td>
                                    <td><select name="payment-select" id="payment-select">
                                            <option value="Select your payment method" selected disabled>Select your
                                                payment method</option>
                                            <option value="Esewa">Esewa</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="button" id="NextBtn">Next</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>

                    <section class="fee-structure" id="fee-structure">
                        <p class="prior-notice">fee structure</p>

                        <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                            <table id="feeTable">
                                <input type="text" id="amount" name="amount" value="100" hidden>
                                <input type="text" id="tax_amount" name="tax_amount" value="10" hidden>
                                <input type="text" id="total_amount" name="total_amount" value="110" hidden>
                                <input type="text" id="transaction_uuid" hidden>
                                <input type="text" id="product_code" name="product_code" value="EPAYTEST" hidden>


                                <!-- <button class="button">Pay with Esewa</button> -->


                            </table>
                        </form>
                    </section>
                </div>
            </main>

            <script src="script/loadingScreen.js" defer></script>
            <script src="script/fee.js" defer></script>
    </body>

</html>