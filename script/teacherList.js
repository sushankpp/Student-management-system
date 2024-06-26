

import { showNotification } from './notification.js';

const navBar = document.querySelector('.vertical-nav-bar');
const header = document.querySelector('.header');
const resultsContainer = document.querySelector('.results-container');
const details = document.querySelector('.details');

let once = true;

if (once) {
  loadOnce();
  once = false;
}

loadOnce();

const genderSelect = document.getElementById('gender-select');
const departmentSelect = document.getElementById('department-select');
let selectedGender = genderSelect.value;
let selectedDepartment = departmentSelect.value;

genderSelect.addEventListener('change', (event) => {
  selectedGender = event.target.value;
  refreshData();
});

departmentSelect.addEventListener('change', (event) => {
  selectedDepartment = event.target.value;
  refreshData();
});

function refreshData() {
  let formData = new FormData();

  formData.append('gender', selectedGender);
  formData.append('department', selectedDepartment);
  formData.append('action', 'showTeachers');

  fetch('backend/teacherListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
    
      if (data.success) {
        

        let teachersTable = document.getElementById('teacher-table-body');

        teachersTable.innerHTML = '';

        data.teachers.forEach((teacher) => {
          let row = document.createElement('tr');
          row.innerHTML = `
                <td>${teacher.Id}</td>
                <td>${teacher.first_name}</td>
                <td>${teacher.last_name}</td>
                <td>${teacher.email}</td>
                <td>${teacher.gender}</td>
                <td>${teacher.department}</td>
                `;

          showSidebar(row);
          searchStudent(row);
          teachersTable.appendChild(row);
        });
      }
    })
    .catch((error) => {
      console.error('Error:', error);
    });
}

function loadOnce() {

  let formData = new FormData();

  formData.append('gender', '');
  formData.append('department', '');
  formData.append('action', 'showTeachers');

  fetch('backend/teacherListHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success === true) {
        let teachersTable = document.getElementById('teacher-table-body');

        teachersTable.innerHTML = '';
        data.teachers.forEach((teacher) => {
          let row = document.createElement('tr');

          if (window.innerWidth <= 750) {
            row.innerHTML = `
            <td>${teacher.Id}</td>
            <td>${teacher.first_name}</td>
            <td>${teacher.last_name}</td>
            <td style= "display:none;">${teacher.email}</td>
            <td>${teacher.gender}</td>
            <td>${teacher.department}</td>
            <td style= "display:none;">${teacher.address}</td>
              `;
          } else {
            row.innerHTML = `
            <td>${teacher.Id}</td>
            <td>${teacher.first_name}</td>
            <td>${teacher.last_name}</td>
            <td>${teacher.email}</td>
            <td>${teacher.gender}</td>
            <td>${teacher.department}</td>
            <td style= "display:none;">${teacher.address}</td>
              `;
          }
          showSidebar(row);
          searchStudent(row);
          teachersTable.appendChild(row);
        });
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
    let address = row.children[6].textContent;

    let teacher = {
      ID: id,
      first_name: fname,
      last_name: lname,
      email: email,
      gender: gender,
      department: department,
      address: address,
    };

  

    header.classList.add('shrink');
    navBar.classList.add('shrink');
    resultsContainer.classList.add('narrow');
    details.classList.add('show');

    document.querySelector('.id').value = teacher.ID;
    document.querySelector('.firstN').value = teacher.first_name;
    document.querySelector('.lastN').value = teacher.last_name;
    document.querySelector('.Uemail').value = teacher.email;
    document.querySelector('.sex').value = teacher.gender;
    document.querySelector('.division').value = teacher.department;
    document.querySelector('.add').value = teacher.address;
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
  
    inputToFocus.focus();
  } else {
    // Save functionality

    let formData = new FormData();
    formInputs.forEach((input) => {
      formData.append(input.name, input.value);
    });
    formData.append('action', 'edit');


    fetch('backend/teacherListHandler.php', {
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
        showNotification('error', 'toast-top-right', error.message);
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



  fetch('backend/teacherListHandler.php', {
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
      showNotification('error', 'toast-top-right', error.message);
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
    const TableSortResult = document.querySelector('.sort-the-result');

    const table = document.querySelector('table');
    const thead = document.querySelectorAll('th');
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark');

    // Apply dark mode styles to everything
    table.classList.add('dark-mode');
    thead.forEach((element) => element.classList.add('dark-mode'));
    TableSortResult.classList.add('dark-mode');
  }
});

const closeBtn = document.querySelector('.closeBtn');

closeBtn.addEventListener('click', () => {
  if (details.classList.contains('show')) {
    details.classList.remove('show');
    header.classList.remove('shrink');
    navBar.classList.remove('shrink');
    resultsContainer.classList.remove('narrow');
  }
});
