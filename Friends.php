<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './models/User.php';
  include_once './models/Request_friends.php';
  include_once './models/Friends.php';



  //cuernt user is the Auth user
  $cur_user=new user();
  $cur_user->id=$_SESSION['id'];






//Confirm friend request by add him to my friends and delete the request
  if(!empty($_POST['confirm']) ){
    $send_user_id=(int) $_POST['confirm'];
    $cur_user->add_friend($cur_user->id,$send_user_id);
    $cur_user->delete_request($send_user_id);
}

 //Delete friend request by change his status to blocked and not show this request
 if(isset($_POST["Delete"])){
  $send_user_id=(int) $_POST["Delete"];
  $deleted_request=new  Request_friends();
  $deleted_request->send_user=$send_user_id;
  $deleted_request->recuest_user= $cur_user->id;
  $deleted_request->update_ststus(2);

 }

//unfriend to a friend
 if(!empty($_POST["Unfriend"])){
  $friend_id=(int) $_POST['Unfriend'];
  $friend_opj=new Friends;
  $friend_opj->friend_id= $friend_id;
  $friend_opj->delete_friend($cur_user->id);
}

//massage to  a friend
if(!empty($_POST["Message"])){
      $friend_id=(int) $_POST['Message'];
     // header('location: .\chat.php');

}

 //fetch Auth user's reuestfrinds to show them
 $requests_array=$cur_user->fetch_all_reuestfrinds();

  //fetch Auth user's frinds  to show them
  $friends_array=$cur_user->fetch_all_frinds();





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
    <div class="left">
      <div class="bg-color">
        <a class="userInfo">
          <img src="./assets/images/Home/user.jpg" alt="" />
          <h2>Byiringiro Saad</h2>
        </a>
        <div class="menu">
          <div class="box">
            <a href="">
              <i class="fa-sharp fa-solid fa-house"></i>
              <h3>Home</h3>
            </a>
          </div>
          <div class="box">
            <a href="">
              <i class="fa-solid fa-user-group"></i>
              <h3>Friends</h3>
            </a>
          </div>
          <div class="box">
            <a href="">
              <i class="fa-solid fa-users"></i>
              <h3>groups</h3>
            </a>
          </div>
          <div class="box">
            <a href="">
              <i class="fa-solid fa-tv"></i>
              <h3>Watch</h3>
            </a>
          </div>
          <div class="box">
            <a href="">
              <i class="fa-solid fa-flag"></i>
              <h3>Pages</h3>
            </a>
          </div>
          <div class="box">
            <a href="">
              <i class="fa-solid fa-cart-shopping"></i>
              <h3>Market</h3>
            </a>
          </div>
          <div class="box">
            <a href="">
              <i class="fa fa-puzzle-piece"></i>
              <h3>Gaming</h3>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="mid">
      <h3 class="text-center">Friend Requests</h3>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

         <?php
            $send_user=new user();
            $send_user_image="";
            $send_user_name="";

          foreach($requests_array as $request ){

            $request_id= $request['id'];
            $send_user_id=$request['user_send_request'];
            $request_status=$request['status'];

            if ( $request_status==1){


            $send_user->id=$send_user_id;
            $send_user_image=$send_user->fetch_image();
            $send_user_name=$send_user->fetch_name();


          ?>

         <div class='swiper-slide'>
         <form action=' <?php $_SERVER["PHP_SELF"] ?>' method='POST' enctype='multipart/form-data'>
            <div class='card'>
              <div class='image-content'>
                <div class='card-image'>
                  <img src='./assets/images/users/<?php echo $send_user_image; ?>' alt='' class='card-img'>
                </div>
              </div>
              <div class='card-content'>
                <a href=''>
                  <h2 class='name'><?php echo $send_user_name ;?></h2>
                </a>
                <p class='mutual-friends'> 500 Mutual Friends</p>
                <div>
                  <button class='btn btn-primary'  type='submit'   name='confirm' value='<?php echo $send_user_id; ?>'>Confirm</button>
                  <button class='btn btn-secondary'  type='submit' name='Delete' value='<?php echo $send_user_id ; ?>'>Delete</button>
                </div>
              </div>
            </div>
            </form>
          </div>
          <?php
        }
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
        foreach($friends_array as $friend ){
    /***********************$friend is a friend record in data base******** */
            $friend_id=$friend['friend_id'];
            $id=$friend['id'];

   /**********select name and image ffrom my friend to shoe them *************/
            $my_friend=new user();
            $my_friend->id=$friend_id;

            $my_friend_image=$my_friend->fetch_image();
            $my_friend_name=$my_friend->fetch_name();

          $here= $_SERVER["PHP_SELF"];
          echo"

        <div class='friend-card'>
        <form action='$here' method='POST' enctype='multipart/form-data'>
          <div class='image-content'>
            <div class='card-image'>
              <img src='./assets/images/users/$my_friend_image' alt='' class='card-img'>
            </div>
          </div>
          <div class='card-content'>
            <a href=''>
              <h2 class='name'> $my_friend_name</h2>
            </a>
            <p class='mutual-friends'> 500 Mutual Friends</p>
            <button class='btn btn-primary'  type='submit' name='Message' value='$friend_id'>Message</button>
            <button class='btn btn-secondary unf-btn'type='submit' name='Unfriend' value='$friend_id'>Unfriend</button>
            </form>
            </div>
        </div>

        ";

        }
        ?>
      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>

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