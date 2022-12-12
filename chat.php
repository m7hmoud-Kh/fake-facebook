<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './models/Friends.php';
  include_once './models/User.php';


  if (isset($_GET['chat_with']) && is_numeric($_GET['chat_with'])) {

    $friendId =  $_GET['chat_with'];
    //check this is id is realy friend
    $friendModel = new Friends();
    $friend =  $friendModel->checkFriendOrNot($friendId);
    if (!$friend) {
      header('location: index.php');
    } else {
      $userModel = new User();
      $infoFriend = $userModel->getUserById($friendId);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/all.min.css" />
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/Home/home.css" />
  <link rel="stylesheet" href="./assets/css/chat/chat.css" />
  <title>Messenger</title>
</head>

<body>

  <?php
        include_once './include/header.php';
        ?>
  <div class="main d-flex">
    <?php
          include_once './include/leftBar.php';
          ?>
    <div class="mid">
      <div class="chat">
        <div class="chat-header">
          <div class="d-flex align-items-center gap-5">
            <div class="back-button">
              <i class="fa-solid fa-angle-left"></i>
            </div>
            <div class="texter d-flex align-items-center gap-4">
              <div class="img" style="width: 80px">
                <img src="./assets/images/users/<?=$infoFriend['profile_image']?>" class="img-fluid" alt="" />
              </div>
              <div class="name">
                <h3><?=$infoFriend['fname'] . ' ' . $infoFriend['lname'] ?></h3>
              </div>
            </div>
          </div>

          <div class="actions">
            <div class="delete" title="delete chat">
              <i class="fa-solid fa-trash"></i>
            </div>
          </div>
        </div>
        <div class="chat-content has-scrollbar chat-box">
          
        </div>
        <form method="POST" class="chat-message-input typing-area">
          <input type="text" required name="message" class="send-messge input-field formVal" placeholder="type your message ..." />
          <input name="user_id" value="<?=$_SESSION['id']?>" class="formVal" hidden>
          <input name="friend_id" value="<?=$friendId ?>" class="formVal" hidden>
          <button type="submit" class="send">
            <i class="fa-brands fa-atlassian"></i>
          </button>
        </form>
      </div>
    </div>


    <?php
          include_once './include/rightBar.php';
          ?>
  </div>
  <?php
        include_once './include/nav.php'
        ?>
  <script src="./assets/js/jquery-3.5.0.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/all.min.js"></script>
  <script src="./assets/js/chat/chatList.js"></script>
  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/chat/chat.js"></script>
</body>

</html>
<?php
    }
  }else{
    header('location: index.php');
  }

  ?>

<?php
}