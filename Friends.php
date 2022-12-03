<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './models/User.php';
  include_once './models/Request_friends.php';
  include_once './models/Friends.php';
  include_once './controllers/UserController.php';
  include_once './controllers/Request_friendsController.php';
  include_once './controllers/Request_friendsController.php';
  include_once './controllers/FriendsController.php';
  
  $cur_user=new user();
  $cur_user->id=$_SESSION['id'];
  $requests_array=$cur_user->fetch_all_reuestfrinds();
  //var_dump($requests_array);
  // $send_user_id=$requests_array[0]['user_send_request'];
  // $send_user=new user();
  // $send_user->id=$send_user_id;
  // $send_user_image=$send_user->fetch_image();
  // $send_user_name=$send_user->fetch_name();


  // $friend_request= new Request_friends();
  // $friend_request->send_user=2;
  // $friend_request->recuest_user=$cur_user->id;

  // $send_user=$friend_request->fetch_send_user();
  // $send_user_name=$send_user['fname'].$send_user['lname'];
  // $send_user_image=$send_user['profile_image'];



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
  <header>
    <div class="logo">Facebook</div>
    <div class="search-bar">
      <input type="text" placeholder="search" />
    </div>
    <div class="navigation d-lg-flex d-none position-relative">
      <div class="settings">
        <i class="fa-solid fa-ellipsis-vertical"></i>
      </div>
      <div class="messenger">
        <i class="fa-brands fa-facebook-messenger"></i>
        <div class="unseen"></div>
      </div>
      <div class="notification">
        <i class="fa-solid fa-bell"></i>
        <div class="unseen"></div>
      </div>
      <div class="profile">
        <i class="fa-solid fa-user"></i>
      </div>
      <div class="notifications has-scrollbar">
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="././images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="././images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="././images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="././images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="././images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="././images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="load-more text-center">
          <p>Load More .</p>
        </div>
      </div>
      <div class="setting-popup">
        <ul class="list-unstyled">
          <a href="#">
            <li>Settings</li>
          </a>
          <a href="#">
            <li>Log out</li>
          </a>
        </ul>
      </div>
      <div class="messenger-popup has-scrollbar">
        <a href="#">
          <div class="message-box d-flex align-items-center gap-2">
            <div class="img" style="width: 120px">
              <img src="././images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p class="sender-name">Mohamed Sayed</p>
              <span class="message-preview text-muted">hello mohamed, i sent you the solution for the math
                homework</span>
              <br />
              <span class="text-muted">2m ago</span>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="message-box d-flex align-items-center gap-2">
            <div class="img" style="width: 120px">
              <img src="././images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p class="sender-name">Mohamed Sayed</p>
              <span class="message-preview text-muted">hello mohamed, i sent you the solution for the math
                homework</span>
              <br />
              <span class="text-muted">2m ago</span>
            </div>
          </div>
        </a><a href="#">
          <div class="message-box d-flex align-items-center gap-2">
            <div class="img" style="width: 120px">
              <img src="././images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p class="sender-name">Mohamed Sayed</p>
              <span class="message-preview text-muted">hello mohamed, i sent you the solution for the math
                homework</span>
              <br />
              <span class="text-muted">2m ago</span>
            </div>
          </div>
        </a><a href="#">
          <div class="message-box d-flex align-items-center gap-2">
            <div class="img" style="width: 120px">
              <img src="././images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p class="sender-name">Mohamed Sayed</p>
              <span class="message-preview text-muted">hello mohamed, i sent you the solution for the math
                homework</span>
              <br />
              <span class="text-muted">2m ago</span>
            </div>
          </div>
        </a>
        <div class="load-more text-center">
          <p>Load More .</p>
        </div>
      </div>
      <div class="profile-popup">
        <ul class="list-unstyled">
          <a href="#">
            <li>Profile</li>
          </a>
          <a href="#">
            <li>Friend Requests</li>
          </a>
        </ul>
      </div>
    </div>
  </header>
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
         for($i=0; $i<count($requests_array) ; $i++){
          $send_user_id=$requests_array[$i]['user_send_request'];
          $request_id=$requests_array[$i]['id'];
          $request_status=$requests_array[$i]['status'];

          $friend_request= new Request_friends();
          $friend_request->id= $request_id;
          $friend_request->status= $request_status;
         
          $send_user=new user();
          $send_user->id=$send_user_id;
          $send_user_image=$send_user->fetch_image();
          $send_user_name=$send_user->fetch_name();

          $here= $_SERVER["PHP_SELF"];
         echo"<div class='swiper-slide'>
         <form action='$here' method='POST' enctype='multipart/form-data'>
            <div class='card'>
              <div class='image-content'>
                <div class='card-image'>
                  <img src='./assets/images/users/$send_user_image' alt='' class='card-img'>
                </div>
              </div>
              <div class='card-content'>
                <a href=''>
                  <h2 class='name'>$send_user_name</h2>
                </a>
                <p class='mutual-friends'> 500 Mutual Friends</p>
                <div>
                  <button class='btn btn-primary'  type='submit' name='Confirm'>Confirm</button>
                  <button class='btn btn-secondary'  type='submit' name='Delete'>Delete</button>
                </div>
              </div>
            </div>
            </form>
          </div>" ;
      
        // if(isset($_POST['Confirm'])){
        //   FriendsController::add_friend($cur_user->id,$send_user_id);
        //   unset($requests_array[$i]);

        // }

        // if(isset($_POST['Delete'])){
        //    $friend_request->update_ststus();
        //    unset($requests_array[$i]);

        // }
        // var_dump($_POST);
      }
       
        ?> 
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
      </div>
<!-------------------------------------------------- frindes--------------------->
      <h3 class="text-center friends-word">Friends</h3>
      <div class="friends row row-cols-1 row-cols-sm-2 row-cols-md-4">

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>

        <div class="friend-card">
          <div class="image-content">
            <div class="card-image">
              <img src="./assets/images/Home/user.jpg" alt="" class="card-img">
            </div>
          </div>
          <div class="card-content">
            <a href="">
              <h2 class="name">Hamada</h2>
            </a>
            <p class="mutual-friends"> 500 Mutual Friends</p>
            <button class="btn btn-primary">Message</button>
            <button class="btn btn-secondary unf-btn">Unfriend</button>
          </div>
        </div>
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
    <div class="right">
      <div class="friend-active ">
        <h4 class="text-center">Active Friends</h4>
        <div class="search-bar">
          <input type="text" placeholder="search" />
        </div>
        <div class="friends has-scrollbar">
          <div class="friend ">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Corina McCoy</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>James Hall</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Rhonda Rhodws</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Kenneth Allen</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Stephanie Nicol</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend ">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Corina McCoy</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>James Hall</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Rhonda Rhodws</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Kenneth Allen</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="./assets/images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Stephanie Nicol</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <nav class="footer-nav d-lg-none d-flex">
    <div class="home">
      <a href="./index.php"><i class="fa-solid fa-home"></i></a>
    </div>
    <div class="notification"><i class="fa-solid fa-bell"></i></div>
    <div class="messenger">
      <a href="ChatList.html"><i class="fa-brands fa-facebook-messenger"></i></a>
    </div>
    <div class="porifle">
      <a href="UserProfile.html"><i class="fa-solid fa-user"></i></a>
    </div>
  </nav>
  <script src="./assets/js/swiper-bundle.min.js"></script>
  <script src="./assets/js/Friends/Friends.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/all.min.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>
<?php

}

?>