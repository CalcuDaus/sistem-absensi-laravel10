const DASIFY_KEY = "DASIFY_KEY";

// Elements
const hr = document.getElementById("hr");
const setting = document.querySelector(".setting");
const lessThans = document.querySelectorAll(".less-than");
const dropSides = document.querySelectorAll(".dropdown-sidebar");
const dropNavs = document.querySelectorAll(".drop-nav");
const hamburgerIcon = document.querySelector(".hamburger-icon");
const sidebar = document.querySelector("#sidebar");
const main = document.querySelector("#main");
const notif = document.querySelector(".notif");
const containerNotif = document.querySelector(".container-notif");
const profile = document.querySelector(".profile");
const containerprofile = document.querySelector(".container-profile");
const search = document.querySelector(".search-img");
const searchField = document.querySelector(".search-field");
const btnTheme = document.querySelector(".button-theme");
const imgIcons = document.querySelectorAll(".icon-img");
const navBtns = document.querySelectorAll(".nav-btn");
const aNavs = document.querySelectorAll(".nav-btn a");
const btnShort = document.querySelector(".btn-shorten");



// theme
function toggleLightTheme() {
  main.classList.toggle("light-theme");
  imgIcons.forEach((icon) => icon.classList.toggle("light-img"));
  searchField.classList.toggle("s-theme");
  hr.classList.toggle("hr-theme");
  containerNotif.classList.toggle("notif-light");
  containerprofile.classList.toggle("notif-light");
}

btnTheme.addEventListener("click", function () {
  const data = {
    isDark: !main.classList.contains("light-theme"),
  };
  localStorage.setItem(DASIFY_KEY, JSON.stringify(data));
  toggleLightTheme();
});

function checkTheme() {
  const dataFromStorage = JSON.parse(localStorage.getItem(DASIFY_KEY));
  if (dataFromStorage && dataFromStorage.isDark) {
    toggleLightTheme();
  }
}
checkTheme();

// sidebar
dropNavs.forEach((dropNav, index) => {
  const isActive = dropNav.classList.contains("nav-btn-active");
  if (isActive) {
    activateDropNav(dropNav, index);
  } else {
    dropNav.style.height = "47.99px";
  }
});

function dropNav() {
  dropNavs.forEach((dropNav, index) => {
    dropNav.addEventListener("click", () => activateDropNav(dropNav, index));
  });
}

function activateDropNav(dropNav, index) {
  lessThans[index].classList.toggle("i-active");
  dropNav.classList.toggle("d-side-active");
  const height = dropNav.classList.contains("d-side-active")
    ? dropSides[index].offsetHeight + dropNav.offsetHeight + 10 + "px"
    : "47.99px";
  dropNav.style.height = height;
}

dropNav();

hamburgerIcon.addEventListener("click", () => {
  sidebar.classList.toggle("sidebar-active");
  main.classList.toggle("main-active");
});

dropNavs.forEach((dropNav) => {
  dropNav.addEventListener("click", () => {
    if (sidebar.classList.contains("shorten-active")) {
      toggleSidebar();
    }
  });
});

btnShort.addEventListener("click", () => toggleSidebar());
function toggleSidebar() {
  sidebar.classList.toggle("shorten-active");
  main.classList.toggle("main-short-active");

  if (sidebar.classList.contains("shorten-active")) {
    // Sidebar is shortened
    hideElementsOnShortSidebar();
  } else {
    // Sidebar is not shortened
    showElementsOnFullSidebar();
  }
}

function hideElementsOnShortSidebar() {
  aNavs.forEach((e) => (e.style.display = "none"));
  dropNavs.forEach((e) => (e.style.height = "44px"));
  lessThans.forEach((e) => (e.style.display = "none"));
  document.querySelector(".logo img").style.width = "60px";
  btnShort.style.marginLeft = "0px";
  document.querySelector(".fa-arrow-left").style.transform = "rotate(180deg)";
}

function showElementsOnFullSidebar() {
  aNavs.forEach((e) => (e.style.display = "inline"));
  lessThans.forEach((e) => (e.style.display = "inline"));
  document.querySelector(".logo img").style.width = "100px";
  btnShort.style.marginLeft = "65px";
  document.querySelector(".fa-arrow-left").style.transform = "rotate(0deg)";
}

// header
notif.addEventListener("click", () =>
  containerNotif.classList.toggle("n-active")
);
profile.addEventListener("click", () =>
  containerprofile.classList.toggle("n-active")
);
search.addEventListener("click", () =>
  searchField.classList.toggle("s-active")
);

// window
const maxWidth = 670;

function checkWindowWidth() {
  const windowWidth =
    window.innerWidth ||
    document.documentElement.clientWidth ||
    document.body.clientWidth;
  const isMobile = windowWidth <= maxWidth;
  sidebar.classList.toggle("sidebar-active", isMobile);
  main.classList.toggle("main-active", isMobile);
}

document.addEventListener("DOMContentLoaded", checkWindowWidth);
window.addEventListener("resize", checkWindowWidth);
checkWindowWidth();

const loader = document.querySelector(".wrapper-loader");
// loading
function hideLoading() {
  setTimeout(() => {
    loader.style.display = "none";
  }, 300);
  loader.style.opacity = 0;
}
window.addEventListener("load", function () {
  this.setTimeout(hideLoading, 500);
});


function hideElement(element) {
  element.style.display = "none";
}

function showConfirmation() {
  Swal.fire({
      title: 'Confirm',
      text: 'Apakah Kamu Yakin ?',
      icon: 'question',
      showConfirmButton: true,
      showCancelButton: true
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById('deleteForm').submit();
      }
  });
}
document.getElementById("formSubmit").addEventListener("click", function(event) {
  event.preventDefault(); 
  document.getElementById("formSubmit").submit(); 
});