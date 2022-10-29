let notificationHeaderButton = document.querySelector("header .notification");
let settingsHeaderButton = document.querySelector("header .settings");
let messengerHeaderButton = document.querySelector("header .messenger");
let profileHeaderButton = document.querySelector("header .profile");

let headerPopups = [
  document.querySelector("header .navigation .messenger-popup"),
  document.querySelector("header .navigation .setting-popup"),
  document.querySelector("header .navigation .notifications"),
  document.querySelector("header .navigation .profile-popup"),
];

notificationHeaderButton.addEventListener("click", () => {
  closePopups([headerPopups[0], headerPopups[1], headerPopups[3]]);
  document
    .querySelector("header .navigation .notifications")
    .classList.toggle("open");
});

settingsHeaderButton.addEventListener("click", () => {
  closePopups([headerPopups[0], headerPopups[2], headerPopups[3]]);

  document
    .querySelector("header .navigation .setting-popup")
    .classList.toggle("open");
});

messengerHeaderButton.addEventListener("click", () => {
  closePopups([headerPopups[1], headerPopups[2], headerPopups[3]]);

  document
    .querySelector("header .navigation .messenger-popup")
    .classList.toggle("open");
});

profileHeaderButton.addEventListener("click", () => {
  closePopups([headerPopups[0], headerPopups[1], headerPopups[2]]);

  document
    .querySelector("header .navigation .profile-popup")
    .classList.toggle("open");
});

function closePopups(arr) {
  arr.forEach((popup) => {
    popup.classList.remove("open");
  });
}
