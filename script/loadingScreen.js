const content = document.getElementById('content');
const loadingScreen = document.getElementById('loading-container');

window.addEventListener('load', function () {
  setTimeout(() => {
    content.style.display = 'block';
    loadingScreen.style.display = 'none';
  }, 2000);
});

// Function to toggle dark mode
function toggleDarkMode() {
  const theme = document.body;
  theme.classList.toggle('dark-mode');

  const p = document.querySelectorAll('p');
  const heading = document.querySelectorAll('h1, h2, h3, h4, h5, h6');

  // Toggle dark mode for paragraphs and headings
  p.forEach((element) => element.classList.toggle('dark'));
  heading.forEach((element) => element.classList.toggle('dark'));

  // Update and store theme in local storage
  const setTheme = theme.classList.contains('dark-mode') ? 'DARK' : 'LIGHT';
  localStorage.setItem('SetTheme', JSON.stringify(setTheme));
}

// Check if dark mode is enabled and apply styles
window.addEventListener('DOMContentLoaded', () => {
  const theme = document.body;
  const darkModeEnabled =
    JSON.parse(localStorage.getItem('SetTheme')) === 'DARK';
  if (darkModeEnabled) {
    theme.classList.add('dark-mode');
    const p = document.querySelectorAll('p');
    const heading = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
    // Apply dark mode styles to paragraphs and headings
    p.forEach((element) => element.classList.add('dark'));
    heading.forEach((element) => element.classList.add('dark'));
  }
});

// Event listener for dark mode toggle button
const darkModeBtn = document.getElementById('darkMode');
if (darkModeBtn) {
  darkModeBtn.addEventListener('change', toggleDarkMode);
}
