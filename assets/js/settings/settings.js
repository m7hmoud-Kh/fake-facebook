let profilePictureInput = document.querySelector("#input-profile-Image");
let coverPictureInput = document.querySelector("#input-cover-Image");
let profileSubmit = document.querySelector("#profile-submit");
let coverSubmit = document.querySelector("#cover-submit");

profilePictureInput.addEventListener("change", () => {
  profileSubmit.disabled = false;
});
coverPictureInput.addEventListener("change", () => {
  coverSubmit.disabled = false;
});
