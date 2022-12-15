<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './models/User.php';
  include_once './models/Request_friends.php';
  include_once './models/Friends.php';



  $friendRequestModel = new Request_friends();
  $friendModel = new Friends();


  //cuernt user is the Auth user
  $cur_user = new user();
  $cur_user->id = $_SESSION['id'];


  //add request
  if (!empty($_POST['AddFriend'])) {
    $recived_user_id = (int) $_POST['AddFriend'];
    $cur_user->add_request_friend($recived_user_id);
  }

  //Confirm friend request by add him to my friends and delete the request
  if (!empty($_POST['confirm'])) {
    $user_receive_request = (int) $_POST['confirm'];
    $cur_user->add_friend($cur_user->id, $user_receive_request);
    $friendRequestModel->deleteRequest($user_receive_request);
  }

  //Delete friend request by change his status to blocked and not show this request
  if (isset($_POST["Delete"])) {
    $send_user_id = (int) $_POST["Delete"];
    $deleted_request = new  Request_friends();
    $deleted_request->send_user = $send_user_id;
    $deleted_request->recuest_user = $cur_user->id;
    $deleted_request->update_ststus(2);
  }

  //unfriend to a friend
  if (!empty($_POST["Unfriend"])) {
    $friend_id = (int) $_POST['Unfriend'];
    $friend_opj = new Friends;
    $friend_opj->friend_id = $friend_id;
    $friend_opj->delete_friend($cur_user->id);
  }


  $getPeopleMayBeKnow = $friendRequestModel->getPeopleMayBeKnow();
  $getAllFriends = $friendModel->getAllFriends();
  $allRequest = $friendRequestModel->getAllRequest();




?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/Home/home.css" />
    <link rel="stylesheet" href="./css/Friends/Friends.css" />
    <link rel="stylesheet" href="./assets/css/Friends/Friends.css" />
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">
    <title>Friends</title>
  </head>

  <body>
    <?php include_once './include/header.php'; ?>
    <div class="main d-flex">
      <?php include_once './include/leftBar.php'; ?>
      <div class="mid">
        <h3 class="text-center">Friend Requests</h3>
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            <?php
            foreach ($allRequest as $request) {
            ?>
              <div class='swiper-slide'>
                <form action='<?php $_SERVER["PHP_SELF"] ?>' method='POST'>
                  <div class='card'>
                    <div class='image-content'>
                      <div class='card-image'>
                        <?php
                        if (isset($request['profile_image'])) {
                        ?>
                          <img src='./assets/images/users/<?= $request['profile_image'] ?>' alt='' class='card-img'>
                        <?php
                        } else {
                        ?>
                          <img src="./assets/images/Home/user.jpg" class='card-img' />
                        <?php
                        }
                        ?>
                      </div>
                    </div>
                    <div class='card-content'>
                      <a href=''>
                        <h2 class='name'><?= $request['fname'] . ' ' . $request['lname'] ?></h2>
                      </a>
                      <div>
                        <button class='btn btn-primary' type='submit' name='confirm' value='<?= $request['user_send_request'] ?>'>Confirm</button>
                        <button class='btn btn-secondary' type='submit' name='Delete' value='<?= $request['user_send_request'] ?>'>Delete</button>
                      </div>
                    </div>
                  </div>
                </form>


              </div>
            <?php
            }
            ?>
          </div>
          <div class="swiper-button-next swiper-navBtn"></div>
          <div class="swiper-button-prev swiper-navBtn"></div>
        </div>
        <!-------------------------------------------------- frindes--------------------->
        <h3 class="text-center friends-word">Friends</h3>
        <div class="friends row row-cols-1 row-cols-sm-2 row-cols-md-4">

          <?php
          foreach ($getAllFriends as $friend) {
          ?>
            <div class='friend-card'>
              <form action="<?= $_SERVER["PHP_SELF"] ?>" method='POST'>
                <div class='image-content'>
                  <div class='card-image'>
                    <?php
                    if (isset($friend['profile_image'])) {
                    ?>
                      <img src='./assets/images/users/<?= $friend['profile_image'] ?>' alt='' class='card-img'>
                    <?php
                    } else {
                    ?>
                      <img src="./assets/images/Home/user.jpg" class='card-img' />
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <div class='card-content'>
                  <h2 class='name'><?= $friend['fname'] . ' ' . $friend['lname'] ?></h2>
                  <a href="./chat.php?chat_with=<?= $friend['id'] ?>" class="btn btn-primary">Message</a>
                  <button class='btn btn-secondary unf-btn' type='submit' name='Unfriend' value='<?= $friend['id'] ?>'>Unfriend</button>
              </form>
            </div>
        </div>

      <?php
          }

      ?>
      </div>
    </div>
    <?php include_once './include/rightBar.php'; ?>

    </div>
    <?php include_once './include/nav.php'; ?>
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <script src="./assets/js/Friends/Friends.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/all.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/jquery-3.5.0.min.js"></script>
  </body>

  </html>

<?php

}

?>