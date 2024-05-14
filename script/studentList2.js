console.log('student loaded');

import { showNotification } from './notification.js';

// For sidebar letants
let navBar = document.querySelector('.vertical-nav-bar');
let header = document.querySelector('.header');
let resultsContainer = document.querySelector('.results-container');
let details = document.querySelector('.details');
// end of sidebar letants

// For loading the data for the first time. Only need to load data once
let once = true;

if (once) {
  loadOnce();
  once = false;
}

let genderSelect = document.getElementById('gender-select');
let departmentSelect = document.getElementById('department-select');
let totalStudent = document.getElementById('number-of-std');
let selectedGender = genderSelect.value;
let selectedDepartment = departmentSelect.value;

// if the value of gender is changed, refresh the data
genderSelect.addEventListener('change', (event) => {
  selectedGender = event.target.value;
});
// if the value of department is changed, refresh the data
departmentSelect.addEventListener('change', (event) => {
  selectedDepartment = event.target.value;
  // console.log(selectedDepartment);
});

// Calling the function to refresh the data
genderSelect.addEventListener('change', refreshData);
departmentSelect.addEventListener('change', refreshData);

// For page number
let currentPage = 1; // Initialize current page to 1

let prevPageBtn = document.getElementById('prevPageBtn');
let nextPageBtn = document.getElementById('nextPageBtn');
let currentPageSpan = document.querySelector('.current-page');
let currentPageSpan2 = document.getElementById('currentPage');
let curStudent = document.querySelector('.cur-student');
let totalStd = document.querySelector('.total-std');

prevPageBtn.addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage--;
    refreshData();
  }
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
      if (data.success === true) {
        let studentCount = 0;
        // console.log(data);
        // Get the student table body element
        let studentTableBody = document.getElementById('student-table-body');

        // Clear the current table body
        studentTableBody.innerHTML = '';

        // Loop through each student in the data
        data.students.forEach((student) => {
          // Create a new table row and fill it with the student's data
          let row = document.createElement('tr');
          row.innerHTML = `
          <td><input type="checkbox" class="attendanceCheckbox" id=${student.ID}></td>
                    <td>${student.ID}</td>
                    <td>${student.first_name}</td>
                    <td>${student.last_name}</td>
                    <td>${student.email}</td>
                    <td>${student.gender}</td>
                    <td>${student.department}</td>
                    <td style= "display:none;">${student.address}</td>
                `;

          showSidebar(row);
          searchStudent(row);

          studentCount++;

          curStudent.innerText = studentCount;

          let checkbox = row.querySelector('td input[type="checkbox"]');
          if (checkbox) {
            checkbox.checked = attendanceCheckbox.checked;
          }

          // Append the new row to the table body
          studentTableBody.appendChild(row);
        });

        let totalStudent = data.total;

        let totalPages = Math.ceil(totalStudent / 8);

        // Update the current page display

        nextPageBtn.disabled = currentPage >= totalPages;

        currentPageSpan.textContent = currentPage;
        currentPageSpan2.textContent = currentPage;
        // Enable or disable the previous page button based on the current page number
        prevPageBtn.disabled = currentPage === 1;
      }
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

refreshData();

function loadOnce() {
  console.log('loaded once');
  let formData = new FormData();
  formData.append('gender', '');
  formData.append('department', '');
  formData.append('action', 'showStudents');
  // console.log(formData);

  fetch('backend/studentListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success === true) {
        let studentTableBody = document.getElementById('student-table-body');

        // Clear the current table body
        studentTableBody.innerHTML = '';

        totalStudent.innerText = data.total;
        totalStd.innerText = data.total;

        // Loop through each student in the data
        data.students.forEach((student) => {
          // Create a new table row and fill it with the student's data
          let row = document.createElement('tr');

          // Show all data except email on mobile (check for window width)
          // if (window.innerWidth >= 750) {
          row.innerHTML = `
                <td><input type="checkbox" class="attendanceCheckbox" id=${student.ID}></td>
                <td>${student.ID}</td>
                <td>${student.first_name}</td>
                <td>${student.last_name}</td>
                <td>${student.email}</td>
                <td>${student.gender}</td>
                <td>${student.department}</td>
                <td style="display:none;">${student.address}</td>
            `;

          showSidebar(row);
          searchStudent(row);

          // Append the new row to the table body
          studentTableBody.appendChild(row);
        });
      }
    })
    .catch((error) => {
      console.log(error);
    });
}

function showSidebar(row) {
  row.addEventListener('click', () => {
    let id = row.children[1].innerText;
    let fname = row.children[2].innerText;
    let lname = row.children[3].innerText;
    let email = row.children[4].innerText;
    let gender = row.children[5].innerText;
    let department = row.children[6].innerText;
    let address = row.children[7].textContent;

    let student = {
      ID: id,
      first_name: fname,
      last_name: lname,
      email: email,
      gender: gender,
      department: department,
      address: address,
    };

    // console.log(student);

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
    document.querySelector('.location').value = student.address;
  });
}

let editBtn = document.getElementById('edit_student');
let deleteBtn = document.getElementById('delete_student');
let formInputs = document.querySelectorAll('.value');
let inputToFocus = document.getElementById('first_name');
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
    // console.log(inputToFocus);
    inputToFocus.focus();
  } else {
    // Save functionality
    console.log('Edited values:');
    let formData = new FormData();
    formInputs.forEach((input) => {
      formData.append(input.name, input.value);
    });
    formData.append('action', 'edit');
    // console.log(formData);

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
          // console.log(data.message);
          showNotification('error', 'toast-top-right', data.message);
        }
      })
      .catch((error) => {
        // showNotification('error', 'toast-top-right', data.message);
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

  // console.log(formData);

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
  let input = document.getElementById('search');

  input.addEventListener('input', () => {
    let searchTerm = input.value.toLowerCase();
    let firstName = row.children[2].innerText.toLowerCase();
    let lastName = row.children[3].innerText.toLowerCase();
    let email = row.children[4].innerText.toLowerCase();

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
  let setTheme = JSON.parse(localStorage.getItem('SetTheme'));

  if (setTheme === 'DARK') {
    let TableSortResult = document.querySelector('.sort-the-result'),
      TableSortResultHeader = document.querySelector('.Total-result'),
      TableSortResultHeader2 = document.querySelector('.total-result-page');
    let table = document.querySelector('table');
    let thead = document.querySelectorAll('th');
    let navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark');

    // Apply dark mode styles to everything
    table.classList.add('dark-mode');
    thead.forEach((element) => element.classList.add('dark-mode'));
    TableSortResult.classList.add('dark-mode');
    TableSortResultHeader.classList.add('dark-mode');
    TableSortResultHeader2.classList.add('dark-mode');
  }
});

let closeBtn = document.querySelector('.closeBtn');

closeBtn.addEventListener('click', () => {
  if (details.classList.contains('show')) {
    details.classList.remove('show');
    header.classList.remove('shrink');
    navBar.classList.remove('shrink');
    resultsContainer.classList.remove('narrow');
  }
});

let attendanceCheckbox = document.querySelector('.attendanceCheckbox');

attendanceCheckbox.addEventListener('change', (event) => {
  let table = document.querySelector('table');
  let allCheckboxes = table.querySelectorAll('td input[type="checkbox"]');

  allCheckboxes.forEach((checkbox) => {
    checkbox.checked = event.target.checked;
  });
  sendAttendance();
});

let attendanceBtn = document.getElementById('sendAttendance');

function sendAttendance() {
  if (attendanceCheckbox.checked) {
    attendanceBtn.style.display = 'block';
  }
}

function checkAttendanceSelection() {
  let table = document.querySelector('table');
  let allCheckboxes = table.querySelectorAll('td input[type="checkbox"]');

  // Check if any checkbox (including header and rows) is checked
  let anyCheckboxChecked =
    attendanceCheckbox.checked ||
    Array.from(allCheckboxes).some((checkbox) => checkbox.checked);

  attendanceBtn.style.display = anyCheckboxChecked ? 'block' : 'none';
}

// Event listeners for checkbox changes
attendanceCheckbox.addEventListener('change', checkAttendanceSelection);

// Add an event listener for each checkbox in the table body
attendanceCheckbox.addEventListener('change', refreshData);

// Call checkAttendanceSelection initially to set button visibility based on initial state
checkAttendanceSelection();

function increaseAttendance(ids) {
  console.log('ids:', ids);
  let formData = new FormData();

  console.log(ids);
  formData.append('action', 'increaseAttendance');
  formData.append('checkedIds', ids);

  fetch('backend/studentListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    })
    .catch((error) => {
      console.log(error);
    });
}

document.addEventListener('DOMContentLoaded', () => {
  let presentStudent = document.querySelector('#presentStudent');
  let totalAttendanceSent = localStorage.getItem('totalAttendanceSent') || 0;
  let lastUpdated = localStorage.getItem('lastUpdated') || 0;

  let today = new Date().toISOString().split('T')[0];

  if (lastUpdated !== today) {
    totalAttendanceSent = 0;
  }

  presentStudent.innerHTML = totalAttendanceSent;

  document
    .getElementById('sendAttendance')
    .addEventListener('click', function () {
      var checkboxes = document.querySelectorAll('.attendanceCheckbox');
      var checkedIds = [];
      let checkedCount = 0;

      checkboxes.forEach(function (checkbox) {
        if (checkbox.checked) {
          if (checkbox.id !== '') {
            checkedIds.push(checkbox.id);
            checkedCount++;
          }
        }
      });

      totalAttendanceSent = Number(totalAttendanceSent) + checkedCount;
      localStorage.setItem('totalAttendanceSent', totalAttendanceSent);

      localStorage.setItem('lastUpdated', today);

      presentStudent.innerHTML = totalAttendanceSent;

      increaseAttendance(checkedIds);
    });
});
