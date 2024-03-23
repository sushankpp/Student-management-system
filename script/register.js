import { showNotification } from './notification.js';

document.getElementById('registerForm').addEventListener('submit', (event) => {
    event.preventDefault();

    let formData = new FormData(event.target);
    formData.append('action', 'register');

    fetch('backend/loginSignupHandler.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success === true) {
                showNotification('success', 'toast-top-right', data.message);
            } else {
                showNotification('error', 'toast-top-right', data.message);
            }
        })
        .catch(error => {
            showNotification('error', 'toast-top-right', error.message)
        })
});