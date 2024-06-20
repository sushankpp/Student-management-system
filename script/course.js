document.addEventListener('DOMContentLoaded', () => {
  const tableData = document.querySelector('tbody');

  if (!tableData) {
    return;
  }

  let courses = []

  console.log('Fetching courses');

  let formData = new FormData();
  formData.append('action', 'get_courses');
  fetch('backend/courseHandler.php', {
    method: 'POST',
    body: formData,
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    courses = data;
    renderTable(courses);
  }
  )
  .catch(error => console.error('Error:', error));

  /* const courses = [
    {
      id: 1,
      name: 'Operating System',
      author: `Bhupendra Singh Saud, Deepak Bhatt`,
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'BCA',
      teacherID: 1
    },
    {
      id: 2,
      name: 'Numerical System',
      author: 'Dr. P. Kandasamy, Dr. K. Thilagavathy, Dr. K. Gunavathi',
      semester: ' Fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'BCA',
      teacherID: 2
    },

    {
      id: 3,
      name: 'Computer Network',
      author: '',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT ',
      teacherID: 3
    },

    {
      id: 4,
      name: 'Database Management System',
      author: 'Bhupendra singh raud, Indra chaudhary',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT',
      teacherID: 4
    },
    {
      id: 5,
      name: 'Theory of Computation',
      author: 'Jagdis Bhatta ,Ramesh Singh saud',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT ',
      teacherID: 5
    },

    {
      id: 6,
      name: 'Software Engineering',
      author: 'Ramesh Singh Saud, Manoj Giri',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'BCA ',
      teacherID: 6
    },
    {
      id: 7,
      name: 'Scripting Language',
      author: 'Ramesh Singh Saud, Basant Chapagain',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'BCA ',
      teacherID: 7
    },
    {
      id: 8,
      name: 'Atrificial Intelligence',
      author: 'Tej Bahadur Shahi',
      semester: 'Fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT',
      teacherID: 8
    },
  ]; */

  // Render table initially
  renderTable(courses);

  const input = document.getElementById('search');

  input.addEventListener('input', () => {
    const searchValue = input.value.toLowerCase();
    const filteredCourses = courses.filter((course) => {
      // Check if any of the course attributes contains the search value
      return Object.values(course).some(
        (value) =>
          typeof value === 'string' && value.toLowerCase().includes(searchValue)
      );
    });

    renderTable(filteredCourses);
  });

  console.log(courses);

  function renderTable(data) {
    tableData.innerHTML = data
      .map((course) => {
        const authors = course.author.split(',').join('<br>');
        // Check for screen width and conditionally display author name
        if (window.innerWidth <= 750) {
          return `
            <tr style='height:50px'>
              <td> ${course.Id}</td>
              <td> ${course.book_name}</td>
              <td> ${course.semester}</td>
              <td style="display: none;"> ${authors}</td>
              <td> ${course.department}</td>
              <td> ${course.publication}</td>
            </tr>
          `;
        } else {
          return `
            <tr style='height:50px'>
              <td> ${course.Id}</td>
              <td> ${course.book_name}</td>
              <td> ${course.semester}</td>
              <td> ${course.department}</td>
              <td> ${course.publication}</td>
              <td> ${course.teacherID}</td>
            </tr>
          `;
        }
      })
      .join('');
  }

  const DepartmentSelect = document.getElementById('department-select');

  DepartmentSelect.addEventListener('change', () => {
    const selectedValue = DepartmentSelect.value.toLowerCase();
    console.log(DepartmentSelect.value);
    let filterCourses;
    if (selectedValue === 'all') {
      filterCourses = courses;
    } else {
      filterCourses = courses.filter((course) => {
        return course.department.toLowerCase().includes(selectedValue);
      });
    }

    renderTable(filterCourses);
  });
});

window.addEventListener('DOMContentLoaded', () => {
  const setTheme = JSON.parse(localStorage.getItem('SetTheme'));

  if (setTheme === 'DARK') {
    const TableSortResult = document.querySelector('.sort-the-result');

    const table = document.querySelector('table');
    const thead = document.querySelectorAll('th');
    const tr = document.querySelectorAll('tr');
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark');


    // Apply dark mode styles to everything
    table.classList.add('dark-mode');
    thead.forEach((element) => element.classList.add('dark-mode'));
    TableSortResult.classList.add('dark-mode');
  }
});
