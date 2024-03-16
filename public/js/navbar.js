document.addEventListener('DOMContentLoaded', function() {
    var navToggle = document.getElementById('nav-toggle');
    if (!navToggle) return; // Check if the element exists

    navToggle.addEventListener('click', function() {
        var nav1 = document.querySelector('.nav1');
        var content = document.querySelector('.content');
        var iconArrow = document.getElementById('icon-arrow');

        // Toggle the 'open' class for the navigation bar and content
        nav1.classList.toggle('open');
        content.classList.toggle('open');

        // Change the icon based on the state of the navigation bar
        if (nav1.classList.contains('open')) {
            iconArrow.className = 'bx bx-x'; // Replace with the icon you want for the open state
            nav1.style.marginLeft = '40px';
            navToggle.style.right = '20px';
            navToggle.style.top = '20px';
        } else {
            iconArrow.className = 'bx bx-menu'; // Replace with the icon you want for the closed state
            nav1.removeAttribute('style');
            navToggle.removeAttribute('style');
        }
    });
});