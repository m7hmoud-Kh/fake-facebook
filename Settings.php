<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './models/User.php';
  include_once './controllers/UserController.php';

  
 $cur_user= new User();
 //var_dump();
//  die();

 // $_POST['name'] || $_POST['bio'] || $_POST['email'] || $_POST['password'] cur_password

  // if (isset($_POST['image']  )) {
  //   var_dump($_POST);
    // die();
    // $data = $_POST;
    // $Files = $_FILES['image']['name'] ?? '';


    // $arrError  =  UserController::validateImage($data, $Files);
    // if (empty($arrError)) {

    //   if (!empty($Files)) {
    //     $ftemp = $_FILES["image"]["tmp_name"];
    //     $fname = $_FILES['image']['name'];
    //     $new_image =  UserController::uploadImage($fname, $ftemp);
    //     $data = $new_image;
    //   }

    //  $cur_user->Updateimage($data);
      

  //  }
  //}
 
  if(isset($_POST['fname']) || isset($_POST['lname']) ||isset($_POST['email']) || isset($_POST['bio'])){
    $data=$_POST;
    $cur_user->fname=$data['fname'];
    $cur_user->lname=$data['lname'];
    $cur_user->email=$data['email'];
    $cur_user->bio=$data['bio'];
    $cur_user->Updatedata();
  }

  if(isset($_POST['cur_password'] ) && isset($_POST['password'] )  && isset($_POST['repassword'] )){
    $data=$_POST;
    if(password_hash($data['cur_password'], PASSWORD_DEFAULT)== $cur_user->password){
      if($data['password']===$data['repassword']){
        $cur_user->password=$data['password'];
        $cur_user->Updatepassword();
      }
      
    }
   
   
  }



 

  // if (isset($_POST['delete_post'])) {
  //   $deleted_post = $post->getPostById($_POST['post_id']);
  //   //remove image from local
  //   if (isset($deleted_post['image'])) {
  //     $postController->removeImage($deleted_post['image']);
  //   }
  //   $post->deletePost($_POST['post_id']);
  // }

  // $allPosts = $post->myPosts($_SESSION['id']);


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
    <link rel="stylesheet" href="./assets/css/settings/settings.css" />
    <title>Settings | facebook</title>
  </head>
  <body>
    <!--Main App Header -->
    <header>
      <div class="logo d-flex gap-4 align-items-center">
        <div class="d-lg-none d-block nav-toggler">
          <i class="toggle-icon fa-solid fa-bars"></i>
        </div>
        Facebook
      </div>
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
              <img src="../../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p>Mohamed Sayed Reacted to your post</p>
              <span class="text-muted">2m ago</span>
            </div>
          </div>
          <div class="notification-box d-flex align-items-center gap-2">
            <div class="img" style="width: 70px">
              <img src="../../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p>Mohamed Sayed Reacted to your post</p>
              <span class="text-muted">2m ago</span>
            </div>
          </div>
          <div class="notification-box d-flex align-items-center gap-2">
            <div class="img" style="width: 70px">
              <img src="../../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p>Mohamed Sayed Reacted to your post</p>
              <span class="text-muted">2m ago</span>
            </div>
          </div>
          <div class="notification-box d-flex align-items-center gap-2">
            <div class="img" style="width: 70px">
              <img src="../../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p>Mohamed Sayed Reacted to your post</p>
              <span class="text-muted">2m ago</span>
            </div>
          </div>
          <div class="notification-box d-flex align-items-center gap-2">
            <div class="img" style="width: 70px">
              <img src="../../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p>Mohamed Sayed Reacted to your post</p>
              <span class="text-muted">2m ago</span>
            </div>
          </div>
          <div class="notification-box d-flex align-items-center gap-2">
            <div class="img" style="width: 70px">
              <img src="../../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <div class="details">
              <p>Mohamed Sayed Reacted to your post</p>
              <span class="text-muted">2m ago</span>
            </div>
          </div>
          <div class="load-more text-center">
            <p>Load More ....</p>
          </div>
        </div>
        <div class="setting-popup">
          <ul class="list-unstyled">
            <a href="#"><li>Settings</li></a>
            <a href="#"><li>Log out</li></a>
          </ul>
        </div>
        <div class="messenger-popup has-scrollbar">
          <a href="#">
            <div class="message-box d-flex align-items-center gap-2">
              <div class="img" style="width: 120px">
                <img src="../../images/profile.jpg" class="img-fluid" alt="" />
              </div>
              <div class="details">
                <p class="sender-name">Mohamed Sayed</p>
                <span class="message-preview text-muted"
                  >hello mohamed, i sent you the solution for the math
                  homework</span
                >
                <br />
                <span class="text-muted">2m ago</span>
              </div>
            </div>
          </a>
          <a href="#">
            <div class="message-box d-flex align-items-center gap-2">
              <div class="img" style="width: 120px">
                <img src="../../images/profile.jpg" class="img-fluid" alt="" />
              </div>
              <div class="details">
                <p class="sender-name">Mohamed Sayed</p>
                <span class="message-preview text-muted"
                  >hello mohamed, i sent you the solution for the math
                  homework</span
                >
                <br />
                <span class="text-muted">2m ago</span>
              </div>
            </div> </a
          ><a href="#">
            <div class="message-box d-flex align-items-center gap-2">
              <div class="img" style="width: 120px">
                <img src="../../images/profile.jpg" class="img-fluid" alt="" />
              </div>
              <div class="details">
                <p class="sender-name">Mohamed Sayed</p>
                <span class="message-preview text-muted"
                  >hello mohamed, i sent you the solution for the math
                  homework</span
                >
                <br />
                <span class="text-muted">2m ago</span>
              </div>
            </div> </a
          ><a href="#">
            <div class="message-box d-flex align-items-center gap-2">
              <div class="img" style="width: 120px">
                <img src="../../images/profile.jpg" class="img-fluid" alt="" />
              </div>
              <div class="details">
                <p class="sender-name">Mohamed Sayed</p>
                <span class="message-preview text-muted"
                  >hello mohamed, i sent you the solution for the math
                  homework</span
                >
                <br />
                <span class="text-muted">2m ago</span>
              </div>
            </div>
          </a>
          <div class="load-more text-center">
            <p>Load More ....</p>
          </div>
        </div>
        <div class="profile-popup">
          <ul class="list-unstyled">
            <a href="#"><li>Profile</li></a>
            <a href="#"><li>Friend Requests</li></a>
          </ul>
        </div>
      </div>
      <div class="aside-header d-lg-none">
        <ul class="list-unstyled">
          <li>
            <a href="#"><i class="fa-solid fa-user"></i>Profile</a>
          </li>
          <li>
            <a href="#"><i class="fa-solid fa-user-group"></i>Friends</a>
          </li>
          <li>
            <a href="#"><i class="fa-solid fa-gear"></i>Settings</a>
          </li>
          <li>
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
          </li>
        </ul>
      </div>
      <div class="overlay d-lg-none"></div>
    </header>
    <!--Settings page main content-->
    <div class="container">
      <div class="setting-header d-flex align-items-center gap-3">
        <div class="back-button">
          <i class="fa-solid fa-angle-left"></i>
        </div>
        <h1 class="text-light mb-5 mt-5">Settings</h1>
      </div>

      <section id="settings-section">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
        <h4>Change Your first name</h4>
          <div class="change-name mb-5">
            <input type="text" value="" name="fname"/>
          </div>
          

          <h4>Change Your last name</h4>
          <div class="change-name mb-5">
            <input type="text" value="" name="lname" />
          </div>

          <h4>Change your email address</h4>
          <div class="change-email mb-5">
            <input type="email" value=""  name="email"/>
          </div>

          <h4>Change Your BIO</h4>
          <div class="change-name mb-5">
            <input
              type="text"
              value=""
              name="bio"
            />
          </div>

          <h4>Change your password</h4>
          <div class="change-password mb-5">
            <label class="mb-2">Enter Your Current Password :</label>
            <input type="password" class="mb-3" name="cur_password" />
            <label class="mb-2">Enter Your New Password :</label>
            <input type="password" class="mb-3"  name="password" />
            <label class="mb-2">Confirm Your New Password :</label>
            <input type="password" class="mb-3" name="repassword" />
          </div>

          <button class="btn btn-success me-2" type="submit">Save Changes</button>
        </form>
          <!-- <h4>Change your profile picture</h4>
          <div class="change-picture mb-5">
            <div class="img">
              <img
                src="../../assets/images/profile.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <div class="actions">
              <button class="btn btn-danger">Delete</button>
              <label class="btn btn-primary" for="input-profile-Image"
                >Upload</label
              >
              <input type="file" hidden id="input-profile-Image"  name= "image"/>
            </div>
          </div>
          <h4>Change your Cover</h4>
          <div class="change-cover mb-5">
            <div class="img cover-img">
              <img
                src="../../assets/images/cover.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <div class="actions">
              <button class="btn btn-danger">Delete</button>
              <label class="btn btn-primary" for="input-cover-Image"
                >Upload</label
              >
              <input type="file" hidden id="input-cover-Image"  name="c_image"/>
            </div>
          </div>
          <h4>Change Your first name</h4>
          <div class="change-name mb-5">
            <input type="text" value="Mohamed El-Sayed" name="fname"/>
          </div>
          

          <h4>Change Your last name</h4>
          <div class="change-name mb-5">
            <input type="text" value="Mohamed El-Sayed" name="lname" />
          </div>
          <h4>Change Your BIO</h4>
         
          <div class="change-name mb-5">
            <input
              type="text"
              value="hello friend my name is khaled, i'm a software developer"
              name="bio"
            />
          </div>
          <h4>Change your email address</h4>
          <div class="change-email mb-5">
            <input type="email" value="mohamed@gmail.com"  name="email"/>
          </div>
          <h4>Change your password</h4>
          <div class="change-password mb-5">
            <label class="mb-2">Enter Your Current Password :</label>
            <input type="password" class="mb-3" />
            <label class="mb-2">Enter Your New Password :</label>
            <input type="password" class="mb-3"  name="password" />
            <label class="mb-2">Confirm Your New Password :</label>
            <input type="password" class="mb-3" />
          </div>
          <footer class="text-center mb-5">
            <button class="btn btn-success me-2" type="submit">Save Changes</button>
            <button class="btn btn-warning">Delete Account</button>
          </footer>
        </form> -->
      </section>
    </div>
    <!--Mobile Navigation Bar-->
    <nav class="footer-nav d-lg-none d-flex">
      <div class="home">
        <a href="../index.html"><i class="fa-solid fa-home"></i></a>
      </div>
      <div class="notification"><i class="fa-solid fa-bell"></i></div>
      <div class="messenger">
        <a href="ChatList.html"
          ><i class="fa-brands fa-facebook-messenger"></i
        ></a>
      </div>
      <div class="porifle">
        <a href="UserProfile.html"><i class="fa-solid fa-user"></i></a>
      </div>
    </nav>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/main.js"></script>
  </body>
</html>
<?php

}

?>