let notificationHeaderButton = document.querySelector("header .notification");
let settingsHeaderButton = document.querySelector("header .settings");
let messengerHeaderButton = document.querySelector("header .messenger");
let profileHeaderButton = document.querySelector("header .profile");

let navToggler = document.querySelector("header .nav-toggler");
let asideHeader = document.querySelector("header .aside-header");
let headerOverlay = document.querySelector("header .overlay");

navToggler.addEventListener("click", () => {
  asideHeader.classList.toggle("open");
  if (asideHeader.classList.contains("open")) {
    document
      .querySelector("header .nav-toggler svg")
      .classList.add("fa-bars-staggered");
    headerOverlay.style.display = "block";
  } else {
    document.querySelector("header .nav-toggler svg").classList.add("fa-bars");
    headerOverlay.style.display = "none";
  }
});
headerOverlay.addEventListener("click", () => {
  navToggler.click();
});

notificationHeaderButton.addEventListener("click", () => {
  document.querySelectorAll("header .navigation div").forEach((item) => {
    if (item.classList.contains("open")) {
      item.classList.remove("open");
    }
  });

  document
    .querySelector("header .navigation .notifications")
    .classList.toggle("open");
});

settingsHeaderButton.addEventListener("click", () => {
  document.querySelectorAll("header .navigation div").forEach((item) => {
    if (item.classList.contains("open")) {
      item.classList.remove("open");
    }
  });

  document
    .querySelector("header .navigation .setting-popup")
    .classList.toggle("open");
});

messengerHeaderButton.addEventListener("click", () => {
  document.querySelectorAll("header .navigation div").forEach((item) => {
    if (item.classList.contains("open")) {
      item.classList.remove("open");
    }
  });

  document
    .querySelector("header .navigation .messenger-popup")
    .classList.toggle("open");
});

profileHeaderButton.addEventListener("click", () => {
  document.querySelectorAll("header .navigation div").forEach((item) => {
    if (item.classList.contains("open")) {
      item.classList.remove("open");
    }
  });
  document
    .querySelector("header .navigation .profile-popup")
    .classList.toggle("open");
});
