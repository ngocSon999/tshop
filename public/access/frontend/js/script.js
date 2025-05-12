document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('#navbarNav .nav-link');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('#navbarNav');
    let isNavbarOpen = false;

    navbarCollapse.addEventListener('show.bs.collapse', () => {
        isNavbarOpen = true;
    });

    navbarCollapse.addEventListener('hidden.bs.collapse', () => {
        isNavbarOpen = false;
    });

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            const isMdOrLess = window.innerWidth <= 768;
            if (isNavbarOpen && isMdOrLess) {
                navbarToggler.click();
            }
        });
    });

    document.addEventListener('click', function(event) {
        const isMdOrLess = window.innerWidth <= 768;
        const targetElement = event.target;

        if (isNavbarOpen && isMdOrLess) {
            const isClickInsideNavbar = navbarCollapse.contains(targetElement) || navbarToggler.contains(targetElement);

            if (!isClickInsideNavbar) {
                navbarToggler.click();
            }
        }
    });
});
let modal = document.getElementById("imageModal");
let modalTriggers = document.querySelectorAll("body img[src]");
let modalImage = document.getElementById("fullScreenImage");
let closeButton = document.querySelector(".close-button");
modalTriggers.forEach(function(img) {
    img.addEventListener("click", function() {
        modal.style.display = "block";
        modalImage.src = this.getAttribute("src");
    });
});

closeButton.addEventListener("click", function() {
    modal.style.display = "none";
});

window.addEventListener("click", function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
});
