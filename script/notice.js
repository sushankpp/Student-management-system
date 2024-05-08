let dialogPopup = document.querySelector('dialog');
const closeTextEditorBtn = document.querySelector('.closePopUp');
const composeBtn = document.querySelector('.compose-notice-button');
const noticeDiv = document.querySelectorAll('.notice');

const backgroundColors = ['#4CAF50', '#2196F3', '#9C27B0'];

noticeDiv.forEach((notice, index) => {
  notice.style.backgroundColor =
    backgroundColors[index % backgroundColors.length];
});

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

    noticeHeader.classList.add('notice-dark-mode');
  }
});
