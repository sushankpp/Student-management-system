

<div class="register-form-container">
    <div class="head">
        <h1>Registration Form</h1>
        <i class='bx bx-x close' id="bx-x"></i>
    </div>

    <form action="" method="post" id="registerForm">

        <div class="name-section">
            <div class="form-control">
                <input type="text" name="first-name" id="first-name">
                <label>First Name</label>
                <?php if (isset($_SESSION['errors']['first-name'])): ?>
                    <span class="error nameErr"><?php echo $_SESSION['errors']['first-name']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-control">
                <input type="text" name="last-name" id="last-name">
                <label>Last Name</label>
                <?php if (isset($_SESSION['errors']['last-name'])): ?>
                    <span class="error nameErr"><?php echo $_SESSION['errors']['last-name']; ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-control">
            <input type="text" name="email" id="email">
            <label>Email</label>
            <?php if (isset($_SESSION['errors']['email'])): ?>
                <span class="error emailErr"><?php echo $_SESSION['errors']['email']; ?></span>
            <?php endif; ?>
        </div>

        <div class="password-section">
            <div class="form-control">
                <input type="password" name="password" id="password" class="password">
                <label>Password</label>
                <?php if (isset($_SESSION['errors']['password'])): ?>
                    <span class="error passwordErr"><?php echo $_SESSION['errors']['password']; ?></span>
                <?php endif; ?>
            </div>

            <div class="form-control">
                <input type="password" name="confirm-password" id="confirm-password">
                <label>Confirm Password</label>
                <?php if (isset($_SESSION['errors']['confirm-password'])): ?>
                    <span class="error passwordErr"><?php echo $_SESSION['errors']['confirm-password']; ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="user-info">
            <div class="form-control">
                <input type="text" name="phone-number" id="phone-number">
                <label>Phone Number</label>
                <?php if (isset($_SESSION['errors']['phone-number'])): ?>
                    <span class="error phoneErr"><?php echo $_SESSION['errors']['phone-number']; ?></span>
                <?php endif; ?>
            </div>

            <div class="more-info">
                <div class="gender">
                    <input type="checkbox" name="male" id="checkbox">
                    <label for="Male" class="male">Male</label>

                    <input type="checkbox" name="female" id="checkbox">
                    <label for="Female">Female</label>
                </div>
                <?php if (isset($_SESSION['errors']['gender'])): ?>
                    <span class="error GenderErr"><?php echo $_SESSION['errors']['gender']; ?></span>
                <?php endif; ?>

                <div class="selection-control">
                    <select name="department">
                        <option value="Department" disabled selected>Department</option>
                        <option value="BCA">BCA </option>
                        <option value="CSIT">CSIT </option>
                    </select>
                </div>
                <?php if (isset($_SESSION['errors']['department'])): ?>
                    <span class="error departmentErr"><?php echo $_SESSION['errors']['department']; ?></span>
                <?php endif; ?>
            </div>
        </div>

        <button class="login-button btn" id="login-button">Register</button>

        <p class="text">Don't have an account?
            <a href="login.php" class="logoin loggin" id="login">Log in</a>
        </p>

    </form>
</div>

<?php unset($_SESSION['errors']); // Clear the errors after displaying them ?>