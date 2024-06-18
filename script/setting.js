// Get the file input element
const fileInput = document.getElementById('photoUploader');

// Get the profile image element
const profileImage = document.getElementById('profileImage');

// Get the delete button element
const deleteButton = document.getElementById('deleteButton');

// Store the default image source
const defaultImageSrc = 'internals/images/default-profile.png';

// Add event listener to file input
fileInput.addEventListener('change', (event) => {
  // Check if files are selected
  if (event.target.files && event.target.files[0]) {
    // Create a FileReader object
    const reader = new FileReader();

    // Set the image source when FileReader finishes loading
    reader.onload = function (e) {
      profileImage.src = e.target.result;
    };

    // Read the file as a data URL
    reader.readAsDataURL(event.target.files[0]);
  }
});

// Add event listener to delete button
deleteButton.addEventListener('click', () => {
  // Reset the image source to the default image
  profileImage.src = defaultImageSrc;

  // Clear the file input value to remove the selected file
  fileInput.value = '';
});

logoutButton = document.getElementById('logoutuser');
logoutButton.addEventListener('click', () => {
  fetch('logout.php', {
    method: 'POST',
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === 'success') {
        window.location.href = 'index.php';
      }
    });
});

const editBtn = document.querySelector('.EditBtn');
const input = document.querySelectorAll('input');

editBtn.addEventListener('click', (e) => {
  if (editBtn.innerHTML === 'Edit') {
    editBtn.innerHTML = 'Save';
    document.getElementById('fname').removeAttribute('disabled');
    document.getElementById('lname').removeAttribute('disabled');
    document.getElementById('currentPass').removeAttribute('disabled');
    document.getElementById('newPassword').removeAttribute('disabled');
    document.getElementById('confirmPass').removeAttribute('disabled');
    input.forEach((inputs) => {
      inputs.style.color = 'black';
    });
    // e.target.value = 'Save';
  } else {

    let formData = new FormData();
    const fname = document.getElementById('fname')
    const lname = document.getElementById('lname')
    const currentPass = document.getElementById('currentPass')
    const newPass = document.getElementById('newPass')
    const conPass = document.getElementById('ConPass')
    
    formData.append('action', 'editProfile');
    // if password is empty
    if (currentPass.value === '' || newPass.value === '' || conPass.value === '') {
      formData.append('fname', fname.value);
      formData.append('lname', lname.value);
      formData.append('editPass', 'false');
    } else {
      formData.append('fname', fname.value);
      formData.append('lname', lname.value);
      formData.append('currentPass', currentPass.value);
      formData.append('newPass', newPass.value);
      formData.append('conPass', conPass.value);
      formData.append('editPass', 'true');
    }

    fetch('backend/settingsHandler.php', {
      method: 'POST',
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        /* if (data.success) {
          console.log(data);
          showNotification('success', 'toast-top-right', data.message);
        } else {
          showNotification('error', 'toast-top-right', data.message);
        } */
      });

    editBtn.innerHTML = 'Edit';
    document.getElementById('fname').setAttribute('disabled', 'disabled');
    document.getElementById('lname').setAttribute('disabled', 'disabled');
    document.getElementById('currentPass').setAttribute('disabled', 'disabled');
    document.getElementById('newPassword').setAttribute('disabled', 'disabled');
    document.getElementById('confirmPass').setAttribute('disabled', 'disabled');
    input.forEach((inputs) => {
      inputs.style.color = '#ccc';
    });
  }
});
