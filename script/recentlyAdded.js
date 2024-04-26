console.log('recently added js loaded');

const TableContainer = document.getElementById('recentlyAddedTable');
const noticePreviewDiv = document.querySelectorAll('.notice-preview');
const noticeDay = document.querySelector('.date');

const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];

const days = [
  'Sunday',
  'Monday',
  'Tuesday',
  'Wednesday',
  'Thursday',
  'Friday',
  'Saturday',
];

let date = new Date(),
  curDate = date.getDate(),
  month = date.getMonth(),
  day = date.getDay(),
  year = date.getFullYear();

console.log(date, days[day], curDate, months[month], year);

const colors = {
  vibrantYellow: '#f6ad2b',
  vibrantRed: '#ff6347', // Coral
  vibrantGreen: '#2ecc71', // Emerald
  accentBlue: '#3498db', // Peter River
  accentPurple: '#9b59b6', // Amethyst
  accentGreen: '#27ae60', // Nephritis
};

const colorKeys = Object.keys(colors);

const randomColorKey = colorKeys[Math.floor(Math.random() * colorKeys.length)];
const randomColorKey2 = colorKeys[Math.floor(Math.random() * colorKeys.length)];

const randomColor = colors[randomColorKey];
const randomColor2 = colors[randomColorKey2];

noticePreviewDiv.forEach((div) => {
  const noticeDate = div.querySelector('.posted-date');
  noticeDate.innerHTML = `${months[month]} ${curDate}, ${year}`;
});

function changeNoticeBG() {
  for (let count = 0; count < noticePreviewDiv.length; count++) {
    if (count % 2 === 0) {
      const randomColorKeyIndex = Math.floor(Math.random() * colorKeys.length);
      const randomColorKey = colorKeys[randomColorKeyIndex];
      const randomColor = colors[randomColorKey];
      console.log(randomColor);
      noticePreviewDiv[
        count
      ].style.background = `linear-gradient(to right, ${randomColor} 20%, ${randomColor2} 90%)`;
    } else {
      const randomColorKeyIndex = Math.floor(Math.random() * colorKeys.length);
      const randomColorKey = colorKeys[randomColorKeyIndex];
      const randomColor = colors[randomColorKey];
      console.log(randomColor);
      noticePreviewDiv[
        count
      ].style.background = `linear-gradient(to right, ${randomColor} 20%, ${randomColor2} 90%)`;
    }
  }
}

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
        let RecentlyAddedTableBody = document.getElementById('resultBody');
        RecentlyAddedTableBody.innerHTML = '';

        count = 0;
        data.message.forEach((student) => {
          let row = document.createElement('tr');

          row.innerHTML = `
            <td>${student.first_name} ${student.last_name} </td>
            <td>${student.ID}</td>
            <td>${student.department}</td>
            <td>${student.gender}</td>
            <td>${student.email}</td>
          `;

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
changeNoticeBG();
