// pop-up for join now button
const joinNow = document.querySelector('.join-now');
const popUp = document.querySelector('.join-now-pop-up');

// show and hide register and login form
const registerForm = document.querySelector('.register-form-container');
const registerLink = document.querySelectorAll('.reggister');
const LoginLink = document.querySelectorAll('.loggin');
const loginForm = document.querySelector('.login-form-container');

// hamburger-menu
const hamburger = document.querySelector('.hamburger-menu');
const nav = document.querySelector('.nav-bar');

hamburger.addEventListener('click', () => {
  if (nav.classList.contains('show')) {
    nav.classList.remove('show');
    hamburger.classList.remove('bx-x');
    hamburger.classList.add('bx-menu');
  } else {
    nav.classList.add('show');
    hamburger.classList.remove('bx-menu');
    hamburger.classList.add('bx-x');
  }
});

// hide login and register form
const closeButtons = document.querySelectorAll('.close');

// code for join now pop up
joinNow.addEventListener('click', () => {
  if (popUp.classList.contains('clicked')) {
    popUp.classList.remove('clicked');
  } else {
    popUp.classList.add('clicked');
  }
});

window.addEventListener('click', (e) => {
  if (!popUp.contains(e.target) && !joinNow.contains(e.target)) {
    popUp.classList.remove('clicked');
  }
});

// close button for login and register
closeButtons.forEach((button) => {
  button.addEventListener('click', () => {
    if (registerForm.classList.contains('called')) {
      registerForm.classList.remove('called');
    }

    if (loginForm.classList.contains('called')) {
      loginForm.classList.remove('called');
    }
  });
});

registerLink.forEach((register) => {
  register.addEventListener('click', (e) => {
    registerForm.classList.add('called');
    loginForm.classList.remove('called');
  });
});

LoginLink.forEach((login) => {
  login.addEventListener('click', (e) => {
    loginForm.classList.add('called');
    registerForm.classList.remove('called');
  });
});
