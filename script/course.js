document.addEventListener('DOMContentLoaded', () => {
  const tableData = document.querySelector('tbody');

  if (!tableData) {
    console.error('Table not found');
    return;
  }

  const courses = [
    {
      id: 1,
      name: 'Operating System',
      author: `Bhupendra Singh Saud, Deepak Bhatt`,
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT | BCA',
    },
    {
      id: 2,
      name: 'Numerical System',
      author: 'Dr. P. Kandasamy, Dr. K. Thilagavathy, Dr. K. Gunavathi',
      semester: ' Fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: ' BCA',
    },

    {
      id: 3,
      name: 'Computer Network',
      author: '',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT ',
    },

    {
      id: 4,
      name: 'Database Management System',
      author: 'Bhupendra singh raud, Indra chaudhary',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT | BCA',
    },
    {
      id: 5,
      name: 'Theory of Computation',
      author: 'Jagdis Bhatta ,Ramesh Singh saud',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT ',
    },

    {
      id: 6,
      name: 'Software Engineering',
      author: 'Ramesh Singh Saud, Manoj Giri',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'BCA ',
    },
    {
      id: 7,
      name: 'Scripting Language',
      author: 'Ramesh Singh Saud, Basant Chapagain',
      semester: 'fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'BCA ',
    },
    {
      id: 8,
      name: 'Atrificial Intelligence',
      author: 'Tej Bahadur Shahi',
      semester: 'Fourth',
      publication: 'KEC PUBLICATION AND DISTRIBUTION PVT. LTD.',
      department: 'CSIT',
    },
  ];

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

  function renderTable(data) {
    tableData.innerHTML = data
      .map((course) => {
        const authors = course.author.split(',').join('<br>');
        return `
        <tr style='height:50px'>
          <td> ${course.id}</td>
          <td> ${course.name}</td>
          <td> ${course.semester}</td>
          <td> ${authors}</td>
          <td> ${course.department}</td>
          <td> ${course.publication}</td>
        </tr>
      `;
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

    console.log(tr);

    // Apply dark mode styles to everything
    table.classList.add('dark-mode');
    thead.forEach((element) => element.classList.add('dark-mode'));
    TableSortResult.classList.add('dark-mode');
  }
});
