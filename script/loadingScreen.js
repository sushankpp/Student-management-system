const content = document.getElementById('content');
const loadingScreen = document.getElementById('loading-container');

window.addEventListener('load', function () {
  setTimeout(() => {
    content.style.display = 'block';
    loadingScreen.style.display = 'none';
  }, 2000);
});
