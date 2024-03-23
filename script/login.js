console.log('Login file loaded');

import { showNotification } from './notification.js';

document.getElementById('loginForm').addEventListener('submit', (event) => {
  event.preventDefault();

  let formData = new FormData(event.target);
//   console.log(formData);
  formData.append('action', 'login');

  fetch('backend/loginSignupHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data)
      if (data.success === true) {
        showNotification('success', 'toast-top-right', data.message);
      } else {
        showNotification('error', 'toast-top-right', data.message);
      }
    })
    .catch((error) => {
      showNotification('error', 'toast-top-right', 'Something went wrong');
      // console.log(error)
    });
});
