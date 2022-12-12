const form = document.querySelector(".typing-area");
const inputChat = document.querySelector(".typing-area .input-field");
const sendButton = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = function (e) {
    e.preventDefault();
}


sendButton.addEventListener("click", function () {
    let elements = document.getElementsByClassName('formVal');
    let formData = new FormData();
    for (let i = 0; i < elements.length; i++) {
        formData.append(elements[i].name, elements[i].value);
    }
    let message = formData.get('message');
    let friend_id = formData.get('friend_id');
    $.ajax({
        type: "GET",
        url: "./controllers/StoreChat.php?to_user_id="+friend_id+"&message="+message,
        data: "JSON",
        success: function (response) {
            inputChat.value = "";
            scrollToBottom();
        }
    });
})



setInterval(function () {
    let elements = document.getElementsByClassName('formVal');
    let formData = new FormData();
    for (let i = 0; i < elements.length; i++) {
        formData.append(elements[i].name, elements[i].value);
    }
    let friend_id = formData.get('friend_id');

    $.ajax({
        type: "GET",
        url: "./controllers/GetChat.php?to_user_id="+friend_id,
        data: "JSON",
        success: function (response) {
            chatBox.innerHTML = response;
            scrollToBottom();
        }
    });

}, 300);


function scrollToBottom() {
    chatBox.scroll(0, chatBox.scrollHeight)
}
