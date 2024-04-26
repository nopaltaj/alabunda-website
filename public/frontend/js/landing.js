const hamburger = document.querySelector(".menu-toggle");
const topnav = document.querySelector(".menu");

hamburger.addEventListener("click", () => {
    topnav.classList.toggle("active");
});
