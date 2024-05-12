console.log('recently added js loaded');

const TableContainer = document.getElementById('recentlyAddedTable');
const noticePreviewDiv = document.querySelectorAll('.notice-preview');
const noticeBoardDiv = document.querySelector('.noticeBoard-div');
const noticeDay = document.querySelector('.date');
const totalNumber = document.querySelector('.total-number');
const maleCount = document.getElementById('maleCount');
const femaleCount = document.getElementById('femaleCount');

const colors = [
  { value: '#2ecc71' }, // Emerald (green)
  { value: '#3498db' }, // Peter River (blue)
  { value: '#27ae60' }, // Nephritis (accent green)
];

function loadData() {
  console.log('load data called');
  let formData = new FormData();

  formData.append('action', 'showResult');
  console.log(formData);

  fetch('backend/recentDataHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log(data);

        totalNumber.innerHTML = data.total;
        maleCount.innerHTML = data.maleCount;
        femaleCount.innerHTML = data.femaleCount;

        let RecentlyAddedTableBody = document.getElementById('resultBody');
        RecentlyAddedTableBody.innerHTML = '';

        count = 0;
        data.message.forEach((student) => {
          let row = document.createElement('tr');

          if (window.innerWidth <= 768) {
            row.innerHTML = `
            <td>${student.first_name} ${student.last_name} </td>
            <td>${student.ID}</td>
            <td>${student.department}</td>
            <td>${student.gender}</td>
            <td style="display:none;">${student.email}</td>
            `;
          } else {
            row.innerHTML = `
            <td>${student.first_name} ${student.last_name} </td>
            <td>${student.ID}</td>
            <td>${student.department}</td>
            <td>${student.gender}</td>
            <td >${student.email}</td>
            `;
          }

          RecentlyAddedTableBody.appendChild(row);
          count++;
          if (count > 10) {
            return;
          }
        });
      }
    });
}

loadData();
// changeNoticeBG();

window.addEventListener('DOMContentLoaded', () => {
  // In the second JavaScript file
  const setTheme = JSON.parse(localStorage.getItem('SetTheme'));
  console.log(setTheme); // Output: 'DARK' or 'LIGHT'

  if (setTheme === 'DARK') {
    const table = document.querySelector('table');
    const thead = document.querySelectorAll('th');
    const tbody = document.getElementById('resultBody'); // Select the tbody element
    const td = tbody.querySelectorAll('td'); // Select all td elements within tbody
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark');

    console.log(td);

    // Apply dark mode styles to everything
    table.classList.add('dark-mode');
    thead.forEach((element) => element.classList.add('dark-mode'));
    thead.forEach((e) => {
      e.style.borderRight = '1px solid #fff';
    });
    td.forEach((e) => {
      e.style.boxShadow = '0px 2px 8px 0px #fff';
    });
  }
});

function updateNotice() {
  let formData = new FormData();
  formData.append('action', 'getNotice');
  formData.append('tittle', '');
  formData.append('body', '');

  fetch('backend/noticeHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      data.notices.forEach((notice, index) => {
        let noticeDiv = document.createElement('div');
        noticeDiv.classList.add('notice-preview');

        noticeDiv.style.backgroundColor = colors[index % colors.length].value;

        noticeDiv.innerHTML = `
        <div class="notice-preview">
        <h3 class="date">${notice.Title}</h3>
        <p class="text-content">${notice.BodyText}</p>
        <div class="bottom">
            <a href="notice.php">Read All</a>
            <div class="posted-date">${notice.DateTime}</div>
        </div>
    </div>

        `;

        noticeBoardDiv.appendChild(noticeDiv);
      });
    })
    .catch((error) => console.error('Error:', error));
}

updateNotice();

const mobileNav = () => {
  const header = document.querySelector('.header');
  const nav = document.querySelector('.nav-items');
  const verticalNav = document.querySelector('.vertical-nav-bar');
  const resultContainer = document.querySelector('.results-container');

  if (window.innerWidth >= 768) {
    header.classList.add('shrink');
    nav.classList.add('shrink');
    verticalNav.classList.add('shrink');
    resultContainer.classList.add('narrow');
  } else {
    header.classList.remove('shrink');
    nav.classList.remove('shrink');
    verticalNav.classList.remove('shrink');
    resultContainer.classList.remove('narrow');
  }
};

mobileNav();

window.addEventListener('resize', mobileNav);

function totalCounts() {
  const totalNumber = document.querySelector('.teacherNum');
  const maleCount = document.getElementById('maleC');
  const femaleCount = document.getElementById('femaleC');

  let formData = new FormData();
  formData.append('action', 'showTeachers');

  console.log(formData);

  fetch('backend/recentDataHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success === true) {
        console.log(data);
        totalNumber.innerHTML = data.total;
        maleCount.innerHTML = (data.maleCount);
        femaleCount.innerHTML = (data.femaleCount);
      }
    });
  //     .catch((error) => {
  //       console.log(error);
  //     });
}

totalCounts();


// Charts

// let graphDisplay = document.getElementById('graph');

let formData = new FormData();
formData.append('action', 'showResult');
fetch('backend/studentGraphHandler.php', {
  method: 'POST',
  body: formData,
})
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    let xValues = [];
    let yValues = [];
    
    data.data.forEach((student) => {
      xValues.push(student.first_name);
      yValues.push(student.attendance);
    });

    // Destroy the existing chart with ID 'graph' if it exists
    let existingChart = Chart.getChart("graph");
    if (existingChart) {
      existingChart.destroy();
    }

    // Create a new chart instance
    new Chart("graph", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: { display: false },
        scales: {
          yAxes: [{
            ticks: { 
              // Adjust these based on your actual data range
              min: 0,
              max: 100,
              // Adjust other properties as needed
            }
          }]
        }
      }
    });
  });


// const xValues = [50,60,70,80,90,100,110,120,130,140,150];
// const yValues = [7,8,8,9,9,9,10,11,14,14,15];

// new Chart("graph", {
//   type: "line",
//   data: {
//     labels: xValues,
//     datasets: [{
//       fill: false,
//       lineTension: 0,
//       backgroundColor: "rgba(0,0,255,1.0)",
//       borderColor: "rgba(0,0,255,0.1)",
//       data: yValues
//     }]
//   },
//   options: {
//     legend: {display: false},
//     scales: {
//       yAxes: [{ticks: {min: 6, max:16}}],
//     }
//   }
// });