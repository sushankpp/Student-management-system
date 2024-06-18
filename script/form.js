

const labels = document.querySelectorAll('.form-control label');
const inputs = document.querySelectorAll('.form-control input');

const spanArr = [];

labels.forEach((label) => {
  const spans = label.innerText
    .split('')
    .map(
      (char, i) => `<span style="transition-delay:${i * 50}ms">${char}</span>`
    )
    .join('');

  label.innerHTML = spans;
  spanArr.push(label.querySelectorAll('span'));
});

inputs.forEach((input, index) => {
  const label = input.nextElementSibling;

  input.addEventListener('focus', () => {
    label.classList.add('focused');
    spanArr[index].forEach((span, i) => {
      span.style.transitionDelay = `${i * 50}ms`;
    });
  });

  input.addEventListener('blur', () => {
    if (input.value === '') {
      label.classList.remove('focused');
    } else {
      label.classList.add('focused');
    }
  });
});

function validateForm(e) {
  const firstName = document.getElementById('first-name');
  const lastName = document.getElementById('last-name');
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  const ConPassowrd = document.getElementById('confrim-password');
  const phoneNumber = document.getElementById('phone-number');
  const nameErr = document.querySelector('.nameErr');
  const emailErr = document.querySelector('.emailErr');
  const passwordErr = document.querySelector('.passwordErr');
  const phoneErr = document.querySelector('.phoneErr');
  const genderErr = document.querySelector('.GenderErr');

  // e.preventDefault();

  console.log(firstName.value);

  if (firstName.value.length <= 3 || lastName.value.length <= 3) {
    toastr.error('Your  name must be greater than 3 characters');
  }

  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email.value)) {
    toastr.error('Please enter the email with the correct format');
  }

  if (password.value.length <= 8) {
    passwordErr.innerText = 'your password must be greater than 8 characters';
  } else if (!(password.value.length == ConPassowrd.value.length)) {
    passwordErr.innerText = "your password doesn't match";
  }

  if (!isNaN(Number(phoneNumber.value))) {
    if (phoneNumber.value.length !== 10) {
      toastr.error('Your phone number must be 10 digits long');
    } else {
      phoneErr.innerText = '';
    }
  } else {
    toastr.error('Please enter a valid number.');
  }
}

function validateLogInForm(e) {
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  const emailErr = document.querySelector('.emailErr');
  const passwordErr = document.querySelector('.passwordErr');

  // e.preventDefault();

  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email.value)) {
    emailErr.innerText = 'Please enter the email with the correct format';
  }

  if (password.value.length <= 8) {
    passwordErr.innerText = 'Your password must be greater than 8 characters';
  }
}
