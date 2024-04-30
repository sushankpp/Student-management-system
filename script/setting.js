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
