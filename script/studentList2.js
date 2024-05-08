console.log('student loaded');

import { showNotification } from './notification.js';

// For sidebar constants
const navBar = document.querySelector('.vertical-nav-bar');
const header = document.querySelector('.header');
const resultsContainer = document.querySelector('.results-container');
const details = document.querySelector('.details');
// end of sidebar constants

// For loading the data for the first time. Only need to load data once
let once = true;

if (once) {
  loadOnce();
  once = false;
}

const genderSelect = document.getElementById('gender-select');
const departmentSelect = document.getElementById('department-select');
const totalStudent = document.getElementById('number-of-std');
let selectedGender = genderSelect.value;
let selectedDepartment = departmentSelect.value;

// if the value of gender is changed, refresh the data
genderSelect.addEventListener('change', (event) => {
  selectedGender = event.target.value;
});
// if the value of department is changed, refresh the data
departmentSelect.addEventListener('change', (event) => {
  selectedDepartment = event.target.value;
  console.log(selectedDepartment);
});

// Calling the function to refresh the data
genderSelect.addEventListener('change', refreshData);
departmentSelect.addEventListener('change', refreshData);

// For page number
let currentPage = 1; // Initialize current page to 1

const prevPageBtn = document.getElementById('prevPageBtn');
const nextPageBtn = document.getElementById('nextPageBtn');
const currentPageSpan = document.getElementById('currentPage');

prevPageBtn.addEventListener('click', () => {
  currentPage--;
  refreshData();
});

nextPageBtn.addEventListener('click', () => {
  currentPage++;
  refreshData();
});
// Page number ends here

function refreshData() {
  // Create a new FormData object
  let formData = new FormData();

  // Append the necessary data to the FormData object
  formData.append('gender', selectedGender);
  formData.append('department', selectedDepartment);
  formData.append('action', 'showStudents');
  formData.append('page', currentPage);
  formData.append('limit', 8);

  // Send a POST request to the server
  fetch('backend/studentListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // Check if the request was successful
      if (data.success) {
        console.log(data);
        // Get the student table body element
        let studentTableBody = document.getElementById('student-table-body');

        // Clear the current table body
        studentTableBody.innerHTML = '';

        // Loop through each student in the data
        data.students.forEach((student) => {
          // Create a new table row and fill it with the student's data
          let row = document.createElement('tr');
          row.innerHTML = `
                    <td>${student.ID}</td>
                    <td>${student.first_name}</td>
                    <td>${student.last_name}</td>
                    <td>${student.email}</td>
                    <td>${student.gender}</td>
                    <td>${student.department}</td>
                `;

          showSidebar(row);
          searchStudent(row);
          // Append the new row to the table body
          studentTableBody.appendChild(row);
          totalStudent.innerText = data.totalStudent;
        });

        // Update the current page display
        currentPageSpan.textContent = currentPage;

        // Enable or disable the previous page button based on the current page number
        prevPageBtn.disabled = currentPage === 1;
      }
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

function loadOnce() {
  console.log('loaded once');
  let formData = new FormData();
  formData.append('gender', '');
  formData.append('department', '');
  formData.append('action', 'showStudents');
  console.log(formData);

  fetch('backend/studentListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success === true) {
        if (data.success === true) {
          console.log(data);
          let studentTableBody = document.getElementById('student-table-body');
          // Clear the current table body
          studentTableBody.innerHTML = '';
          // Loop through each student in the data
          data.students.forEach((student) => {
            // Create a new table row and fill it with the student's data
            let row = document.createElement('tr');
            row.innerHTML = `
                        <td>${student.ID}</td>
                        <td>${student.first_name}</td>
                        <td>${student.last_name}</td>
                        <td>${student.email}</td>
                        <td>${student.gender}</td>
                        <td>${student.department}</td>
                    `;

            showSidebar(row);
            searchStudent(row);

            // Append the new row to the table body
            studentTableBody.appendChild(row);
            totalStudent.innerText = data.totalStudent;
          });
        }
      }
    })
    .then((error) => {
      console.log(error);
    });
}

function showSidebar(row) {
  row.addEventListener('click', () => {
    let id = row.children[0].innerText;
    let fname = row.children[1].innerText;
    let lname = row.children[2].innerText;
    let email = row.children[3].innerText;
    let gender = row.children[4].innerText;
    let department = row.children[5].innerText;

    let student = {
      ID: id,
      first_name: fname,
      last_name: lname,
      email: email,
      gender: gender,
      department: department,
    };

    console.log(student);

    header.classList.add('shrink');
    navBar.classList.add('shrink');
    resultsContainer.classList.add('narrow');
    details.classList.add('show');

    document.querySelector('.id').value = student.ID;
    document.querySelector('.firstN').value = student.first_name;
    document.querySelector('.lastN').value = student.last_name;
    document.querySelector('.Uemail').value = student.email;
    document.querySelector('.sex').value = student.gender;
    document.querySelector('.division').value = student.department;
  });
}

const editBtn = document.getElementById('edit_student');
const deleteBtn = document.getElementById('delete_student');
const formInputs = document.querySelectorAll('.value');
const inputToFocus = document.getElementById('first_name');
// Edit button functionality
editBtn.addEventListener('click', (event) => {
  if (event.target.value === 'edit') {
    editBtn.innerHTML = 'Save';
    event.target.value = 'save';
    event.target.classList.add('save--form');
    editBtn.name = 'save';

    deleteBtn.style.display = 'none';

    formInputs.forEach((input) => (input.disabled = false));
    document.getElementById('dont-edit-id').disabled = true;
    console.log(inputToFocus);
    inputToFocus.focus();
  } else {
    // Save functionality
    console.log('Edited values:');
    let formData = new FormData();
    formInputs.forEach((input) => {
      formData.append(input.name, input.value);
    });
    formData.append('action', 'edit');
    console.log(formData);

    fetch('backend/studentListHandler.php', {
      method: 'POST',
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success === true) {
          showNotification('success', 'toast-top-right', data.message);
          refreshData();
        } else {
          console.log(data.message);
        }
      })
      .catch((error) => {
        showNotification('error', 'toast-top-right', data.message);
      });

    editBtn.innerHTML = 'Edit';
    event.target.value = 'edit';
    event.target.classList.remove('save--form');
    editBtn.name = 'edit';

    deleteBtn.style.display = '';

    formInputs.forEach((input) => (input.disabled = true));
  }
});

// Delete button functionality
deleteBtn.addEventListener('click', () => {
  let formData = new FormData();
  formInputs.forEach((input) => {
    formData.append(input.name, input.value);
  });
  formData.append('action', 'delete');

  console.log(formData);

  fetch('backend/studentListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success === true) {
        showNotification('success', 'toast-top-right', data.message);
        refreshData();
      } else {
        console.log(data.message);
      }
    })
    .catch((error) => {
      showNotification('error', 'toast-top-right', data.message);
    });
});

function searchStudent(row) {
  const input = document.getElementById('search');

  input.addEventListener('input', () => {
    const searchTerm = input.value.toLowerCase();
    const firstName = row.children[1].innerText.toLowerCase();
    const lastName = row.children[2].innerText.toLowerCase();
    const email = row.children[3].innerText.toLowerCase();

    if (
      firstName.includes(searchTerm) ||
      lastName.includes(searchTerm) ||
      email.includes(searchTerm)
    ) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}

window.addEventListener('DOMContentLoaded', () => {
  const setTheme = JSON.parse(localStorage.getItem('SetTheme'));

  if (setTheme === 'DARK') {
    const TableSortResult = document.querySelector('.sort-the-result'),
      TableSortResultHeader = document.querySelector('.Total-result'),
      TableSortResultHeader2 = document.querySelector('.total-result-page');
    const table = document.querySelector('table');
    const thead = document.querySelectorAll('th');
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark')

    // Apply dark mode styles to everything
    table.classList.add('dark-mode');
    thead.forEach((element) => element.classList.add('dark-mode'));
    TableSortResult.classList.add('dark-mode');
    TableSortResultHeader.classList.add('dark-mode');
    TableSortResultHeader2.classList.add('dark-mode');
  }
});
