let dialogPopup = document.querySelector('dialog');
const closeTextEditorBtn = document.querySelector('.closePopUp');
const composeBtn = document.querySelector('.compose-notice-button');
const postedNoticeDiv = document.querySelector('.posted-notice-div');

//use dialog.showModal() to show the dialog box when click compose button later
//close garne function chai dialogPopup.close() ho
composeBtn.addEventListener('click', () => {
  dialogPopup.showModal();
  dialogPopup.classList.add('show');
});

closeTextEditorBtn.addEventListener('click', () => {
  dialogPopup.close();
  dialogPopup.classList.remove('show');
});

window.addEventListener('DOMContentLoaded', () => {
  const setTheme = JSON.parse(localStorage.getItem('SetTheme'));

  if (setTheme === 'DARK') {
    const noticeHeader = document.querySelector('.notice-header');
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark');

    noticeHeader.classList.add('notice-dark-mode');
  }
});

const title = document.getElementById('preview-title');
const BodyContent = document.getElementById('text-input');
const sendBtn = document.getElementById('sendButton');

sendBtn.addEventListener('click', () => {
  // Close the dialog and remove the 'show' class
  dialogPopup.close();
  dialogPopup.classList.remove('show');

  // Send the notice data using sendNotice function (assuming it's defined)
  sendNotice();
});

function sendNotice() {
  let titleValue = title.innerHTML;
  let BodyContentValue = BodyContent.innerHTML;

  // console.log(titleValue, BodyContentValue);

  let formData = new FormData();

  formData.append('title', titleValue);
  formData.append('body', BodyContentValue);
  formData.append('action', 'sendDataToDb');

  console.log(formData);

  fetch('backend/noticeHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log(data);
      }
    })

    .catch((error) => console.log(error));
}

const backgroundColors = ['#4CAF50', '#2196F3', '#9C27B0'];

function getNotice() {
  let formData = new FormData();

  formData.append('title', '');
  formData.append('body', '');
  formData.append('action', 'getNotice');

  console.log(formData);

  fetch('backend/noticeHandler.php', {
    method: 'POST',
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log(data);

        data.notices.forEach((notice, index) => {
          let noticeBody = document.createElement('div');
          noticeBody.classList.add('notice');

          // Set background color based on index
          noticeBody.style.backgroundColor =
            backgroundColors[index % backgroundColors.length];

          noticeBody.innerHTML = `
            <div class="notice-title">
              ${notice.Title}
            </div>
            <div class="notice-content">
              <p class="content-text">${notice.BodyText}</p>
            </div>
            <div class="notice-time-info">
              <p class="time">Posted on: <span>${notice.DateTime}</span></p>
              <p class="posted-by">Posted by: Admin</p>
            </div>
          `;

          postedNoticeDiv.appendChild(noticeBody);
        });
      }
    })
    .catch((error) => console.log(error));
}

getNotice();
