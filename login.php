<div class="login-form-container">
    <div class="head">
        <h1>Please Login</h1>
        <i class='bx bx-x close' id="bx-x"></i>
    </div>


    <form action="" method="post" id="loginForm">
        <div class="form-control">
            <input type="text" name="email" class="email" id="email" required>
            <label>Email</label>
            <span class="emailErr error"></span>
        </div>

        <div class="form-control">
            <input type="password" name="password" class="password" id="password" required>
            <label>Password</label>
            <span class="passwordErr error"></span>
        </div>

        <button class="login-button btn" id="login-button">Log in</button>

        <p class="text">Don't have an account?
            <a href="#" class=" reggister" id="register">Register</a>
        </p>
    </form>
</div>