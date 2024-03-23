
<div class="register-form-container">
    <div class="head">
        <h1>Registration Form</h1>
        <i class='bx bx-x close' id="bx-x"></i>
    </div>

    <form action="" method="post" id="registerForm">

        <div class="name-section">
            <div class="form-control">
                <input type="text" name="first-name" id="first-name" required>
                <label>Frist Name</label>
            </div>
            <div class="form-control">
                <input type="text" name="last-name" id="last-name" required>
                <label>Last Name</label>
            </div>
        </div>
        <span class="error nameErr" name="error">

        </span>

        <div class="form-control">
            <input type="text" name="email" id="email" required>
            <label>Email</label>
        </div>
        <span class="error emailErr" name="error">
        </span>

        <div class="password-section">


            <div class="form-control">
                <input type="password" name="password" id="password" class="password" required>
                <label>Password</label>
            </div>

            <div class="form-control">
                <input type="password" name="Confrim-password" id="Confrim-password" required>
                <label>Confrim Password</label>
            </div>
        </div>
        <span class="error passwordErr" name="error">
        </span>

        <div class="user-info">


            <div class="form-control">
                <input type="text" name="phone-number" id="phone-number" required>
                <label>Phone Number</label>
                <span class="error phoneErr" name="error">
                </span>
            </div>

            <div class="more-info">

                <div class="gender">
                    <input type="checkbox" name="male" id="checkbox">
                    <label for="Male" class="male">Male</label>

                    <input type="checkbox" name="female" id="checkbox">
                    <label for="Male">Female</label>
                </div>
                <span class="error GenderErr" name="error">
                </span>

                <div class="selection-control">
                    <select name="department">
                        <option value="Department" disabled selected>Department</option>
                        <option value="BCA">BCA </option>
                        <option value="BCA">CSIT </option>
                    </select>
                </div>
            </div>
        </div>


        <!-- <button class="login-button btn" id="login-button" name="register-btn"
            onclick="validateForm(event)">Register</button> -->
        <button class="login-button btn" id="login-button">Register</button>


        <p class="text">Don't have an account?
            <a href="login.php" class="logoin loggin" id="login">Log in</a>
        </p>

    </form>
</div>