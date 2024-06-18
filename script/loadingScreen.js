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

  // Update and store theme in local storage
  const setTheme = theme.classList.contains('dark-mode') ? 'DARK' : 'LIGHT';
  localStorage.setItem('SetTheme', JSON.stringify(setTheme));


  if (setTheme === 'DARK') {
    const p = document.querySelectorAll('p');
    const heading = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.add('navDark');
    p.forEach((element) => element.classList.add('dark'));
    heading.forEach((element) => element.classList.add('dark'));
  } else {
    const navItems = document.querySelector('.nav-items');

    // Toggle dark mode for paragraphs and headings
    navItems.classList.remove('navDark');
  }
}

// Check if dark mode is enabled and apply styles
window.addEventListener('DOMContentLoaded', () => {
  const theme = document.body;
  const darkModeEnabled =
    JSON.parse(localStorage.getItem('SetTheme')) === 'DARK';
  if (darkModeEnabled) {
    theme.classList.add('dark-mode');
    const iTag = document.querySelectorAll('i');
    const p = document.querySelectorAll('p');
    // const navItems = document.querySelector('.nav-items');
    const heading = document.querySelectorAll('h1, h2, h3, h4, h5, h6');

    iTag.forEach((e) => (e.style.color = 'gray'));
    // navItems.classList.add('navDark');
    p.forEach((e) => e.classList.add('dark'));
    heading.forEach((element) => element.classList.add('dark'));
  }
});

// Event listener for dark mode toggle button
const darkModeBtn = document.getElementById('darkMode');
if (darkModeBtn) {
  // Initially set the checked state based on the saved theme
  darkModeBtn.checked = JSON.parse(localStorage.getItem('SetTheme')) === 'DARK';

  darkModeBtn.addEventListener('change', toggleDarkMode);
}

// toggleDarkMode();

const hamMenu = document.querySelector('.hamMenu'); // Assuming this is the icon element
const navBar = document.querySelector('.vertical-nav-bar');

const navSlide = () => {
  navBar.classList.toggle('show-nav');

  if (navBar.classList.contains('show-nav')) {
    hamMenu.classList.replace('fa-bars', 'fa-times'); // Replace bars with X (assuming Font Awesome)
  } else {
    hamMenu.classList.replace('fa-times', 'fa-bars'); // Replace X with bars
  }
};

hamMenu.addEventListener('click', navSlide);
