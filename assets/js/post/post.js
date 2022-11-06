function openPostSettings(e) {
  e.parentElement.parentElement
    .querySelector(".setting")
    .classList.toggle("show");
}

// let likeButtons = document.querySelectorAll(".post .like");
// likeButtons.forEach((like) => {
//   like.addEventListener("click", () => {
//     like.classList.toggle("liked");
//     if (like.classList.contains("liked")) {
//       like.childNodes[1].childNodes[2].textContent = "  Liked";
//     } else {
//       like.childNodes[1].childNodes[2].textContent = "  Like";
//     }
//   });
// });
