<?php include 'include/include_HTMLheader.php'; ?>

<title>Notice for Students and Teachers</title>



<div class="loading-container" id="loading-container">
    <div class="loading-screen"></div>
</div>
<div class="content" id="content">

    <header class="header">
        <img src="internals/images/st-lawrence-logo.png" alt="college logo" class="logo">
        <div class="current-page-name">
            <p class="location">Administration/ <span class="exact-location">Notice Board</span></p>
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
            <div class="notice-header">
                <h1>Notice Board</h1>
                <p class="text">Post and read your college/academics related notice here.</p>

            </div>

            <button class="compose-notice-button" <?php
            if (!(isset($_SESSION['role']) && $_SESSION['role'] == 'admin')) {
                echo 'disabled';
            } ?>><i class="fa-regular fa-pen-line"></i>Compose</button>

            <dialog class="container">
                <i class="fa-solid fa-x closePopUp"></i>
                <div class="options">
                    <!-- Text Format -->
                    <button id="bold" class="option-button format">
                        <i class="fa-solid fa-bold"></i>
                    </button>
                    <button id="italic" class="option-button format">
                        <i class="fa-solid fa-italic"></i>
                    </button>
                    <button id="underline" class="option-button format">
                        <i class="fa-solid fa-underline"></i>
                    </button>
                    <button id="strikethrough" class="option-button format">
                        <i class="fa-solid fa-strikethrough"></i>
                    </button>
                    <button id="superscript" class="option-button script">
                        <i class="fa-solid fa-superscript"></i>
                    </button>
                    <button id="subscript" class="option-button script">
                        <i class="fa-solid fa-subscript"></i>
                    </button>
                    <!-- List -->
                    <button id="insertOrderedList" class="option-button">
                        <div class="fa-solid fa-list-ol"></div>
                    </button>
                    <button id="insertUnorderedList" class="option-button">
                        <i class="fa-solid fa-list"></i>
                    </button>
                    <!-- Undo/Redo -->
                    <button id="undo" class="option-button">
                        <i class="fa-solid fa-rotate-left"></i>
                    </button>
                    <button id="redo" class="option-button">
                        <i class="fa-solid fa-rotate-right"></i>
                    </button>
                    <!-- Link -->
                    <button id="createLink" class="adv-option-button">
                        <i class="fa fa-link"></i>
                    </button>
                    <button id="unlink" class="option-button">
                        <i class="fa fa-unlink"></i>
                    </button>
                    <!-- Alignment -->
                    <button id="justifyLeft" class="option-button align">
                        <i class="fa-solid fa-align-left"></i>
                    </button>
                    <button id="justifyCenter" class="option-button align">
                        <i class="fa-solid fa-align-center"></i>
                    </button>
                    <button id="justifyRight" class="option-button align">
                        <i class="fa-solid fa-align-right"></i>
                    </button>
                    <button id="justifyFull" class="option-button align">
                        <i class="fa-solid fa-align-justify"></i>
                    </button>
                    <button id="indent" class="option-button spacing">
                        <i class="fa-solid fa-indent"></i>
                    </button>
                    <button id="outdent" class="option-button spacing">
                        <i class="fa-solid fa-outdent"></i>
                    </button>
                    <!-- Headings -->
                    <select id="formatBlock" class="adv-option-button">
                        <option value="H1">H1</option>
                        <option value="H2">H2</option>
                        <option value="H3">H3</option>
                        <option value="H4">H4</option>
                        <option value="H5">H5</option>
                        <option value="H6">H6</option>
                    </select>
                    <!-- Font -->
                    <select id="fontName" class="adv-option-button"></select>
                    <select id="fontSize" class="adv-option-button"></select>
                    <!-- Color -->
                    <div class="input-wrapper">
                        <input type="color" id="foreColor" class="adv-option-button" />
                        <label for="foreColor">Font Color</label>
                    </div>
                    <div class="input-wrapper">
                        <input type="color" id="backColor" class="adv-option-button" />
                        <label for="backColor">Highlight Color</label>
                    </div>
                </div>
                <span>Title:</span>
                <div id="preview-title" contenteditable="true"></div>
                <span>Notice Content:</span>
                <div id="text-input" contenteditable="true"></div>
                <button class="sendButton" id="sendButton"
                    onClick="window.location.href=window.location.href">Send</button>
            </dialog>

            <div class="posted-notice-div">




            </div>

            <div class="warning-notice">
                <div class="warning">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="warning-content">
                    <p>
                        Notice are only posted by the admin and respected teachers. If you have any query or
                        want to
                        post a notice, please contact the admin.
                    </p>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="script/loadingScreen.js" defer></script>
<script src="script/notice.js" defer></script>
<script src="script/textEditor.js" defer></script>