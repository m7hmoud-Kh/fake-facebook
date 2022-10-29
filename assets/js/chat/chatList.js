let search = document.getElementById("chat-list-search");
let allMessengers = document.querySelectorAll(".chat-box .friend-name");

search.addEventListener("keyup", () => {
  let searchValue = search.value,
    searchResults = [];

  allMessengers.forEach((messanger) => {
    if (
      messanger.textContent
        .toLocaleLowerCase()
        .includes(searchValue.toLocaleLowerCase())
    ) {
      searchResults.push(messanger.parentElement.parentElement.parentElement);
    }
  });

  showSearchResults(searchResults);
});

function showSearchResults(nodeList) {
  document.querySelector(".list-content").innerHTML = "";
  if (nodeList.length) {
    nodeList.forEach((node) => {
      document.querySelector(".list-content").appendChild(node);
    });
  } else {
    document.querySelector(".list-content").innerHTML =
      "<h1 class='no-results'>No Results Found !</h2>";
  }
}
