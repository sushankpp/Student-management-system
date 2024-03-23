/* console.log('Home.js loaded');

const aElements = document.querySelectorAll('.nav-items li a');
let pageLocation = document.querySelector('.exact-location');

aElements.forEach((a) =>
  a.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent the default action (page refresh)

    aElements.forEach((item) => item.parentNode.classList.remove('active'));
    a.parentNode.classList.add('active');

    fetch(a.href)
      .then((response) => response.text())
      .then((html) => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const title = doc.querySelector('title').textContent;
        document.querySelector('.results-container').innerHTML = html;
        pageLocation.textContent = title;
      });
  })
);

 */