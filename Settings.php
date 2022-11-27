<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './models/User.php';
  include_once './controllers/UserController.php';

  
 $cur_user= new User();
 $data=$_POST;

 $cur_user->id=$_SESSION['id'];

 $cur_user->prof_image=$_SESSION['profile_image'];
 $cur_user->cuv_image=$_SESSION['profile_background'];

 $cur_user->fname=$_SESSION['fname'];
 $cur_user->lname=$_SESSION['lname'];
 $cur_user->email=$_SESSION['email'];
 $cur_user->bio=$_SESSION['bio'];

 $cur_user->password=$_SESSION['pass'];
  
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['pass_info']) ){
  
  $setting_errors=UserController::validatesetting($data);
}

if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['bio'])){
  
  $cur_user->fname=$data['fname'];
  $cur_user->lname=$data['lname'];
  $cur_user->email=$data['email'];
  $cur_user->bio=$data['bio'];
  $cur_user->Updatedata();
 
}

if(!empty($_POST['cur_password'] ) && !empty($_POST['password'] )  && !empty($_POST['repassword'] )){
    
  if(password_verify($_POST['cur_password'],$cur_user->password)){
    
    if($data['password']===$data['repassword']){
      $cur_user->password=$data['password'];
      $cur_user->Updatepassword();
      $cur_user->Updatepassword_at_session();
      $sucess_msg="you successfuly update your password";
    }
    

}
}

 // $_POST['name'] || $_POST['bio'] || $_POST['email'] || $_POST['password'] cur_password
 
  // if (isset($_POST['image']  )) {
  //   var_dump($_POST);
  //   die();
   
  //   $data = $_POST;
  //   $Files = $_FILES['image']['name'] ?? '';


  //   $arrError  =  UserController::validateImage($data, $Files);
  //   if (empty($arrError)) {

  //     if (!empty($Files)) {
  //       $ftemp = $_FILES["image"]["tmp_name"];
  //       $fname = $_FILES['image']['name'];
  //       $new_image =  UserController::uploadImage($fname, $ftemp);
  //       $data = $new_image;
  //     }

  //    $cur_user->Updateimage($data);
      

  //  }
  // }
 
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
        
        <!---------------------------------Change profile picture form--------------------------->
        <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
          <h4>Change your profile picture</h4>
          <div class="change-picture mb-5">
            <div class="img">
              <img
                src="./assets/images/profile.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <div class="actions">
              <button class="btn btn-danger">Delete</button>
              <label class="btn btn-primary" for="input-profile-Image"
                >Upload</label
              >
              <input type="file" hidden id="input-profile-Image" name="image" />
              <button
                type="submit"
                class="btn btn-success"
                id="profile-submit"
                disabled
              >
                Save
              </button>
             
            </div>
          </div>
        </form>
        <!--Change Cover Form-->
        <form>
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
              <input type="file" hidden id="input-cover-Image" />
              <button
                type="submit"
                class="btn btn-success"
                id="cover-submit"
                disabled
              >
                Save
              </button>
            </div>
          </div>
        </form> 
        <!-----------------------Change first name form------------------>
        <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
          <h4>Change Your First name</h4>
          <div
            class="change-name mb-5 d-flex align-items-center gap-5 py-4 justify-content-between"
          >
            <input type="text" value="<?php echo $cur_user->fname;?>" name="fname" />
           
              <i class="fa-regular fa-pen-to-square"></i>
              Edit
            </button>
          </div>
           <!--Change Account last form-->
     
          <h4>Change Your Last name</h4>
          <div
            class="change-name mb-5 d-flex align-items-center gap-5 py-4 justify-content-between"
          >
            <input type="text" value="<?php echo $cur_user->lname;?>" name="lname"  />
         
              <i class="fa-regular fa-pen-to-square"></i>
              Edit
            </button>
          </div>
      
        <!--Change bio form-->
       
          <h4>Change Your BIO</h4>
          <div
            class="mb-5 d-flex align-items-center gap-5 py-4 justify-content-between"
          >
          <input
              type="text"
              value="<?php echo $cur_user->bio;?>"
              name="bio"
            />
         
              <i class="fa-solid fa-pencil"></i>
              Edit
            </button>
          </div>
      
        <!--Change Email form-->
      
          <h4>Change your email address</h4>
          <div
            class="change-email mb-5 d-flex align-items-center gap-5 py-4 justify-content-between"
          >
            <input type="email" value="<?php echo $cur_user->email;?>" name="email"  />
          
              <i class="fa-regular fa-pen-to-square"></i>
              Edit
            </button>
          </div>
          <button class="btn btn-success me-2" type="submit" name="data">Save Changes</button>
        </form>
        
        <!----------------------------Change Password Form------------------------>
        <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
       <?php if (isset($sucess_msg)){echo '<div class="alert alert-success">'.$sucess_msg.'</div>';}?>
          <h4>Change your password</h4>
          <div class="change-password mb-5 py-4 mt-3">
            <label class="mb-2">Enter Your Current Password :</label>
            <input type="password" class="mb-3" name="cur_password" />
            <?php if (isset($setting_errors['cur_password'])){echo '<div class="alert alert-danger">'. ($setting_errors['cur_password']).'</div>';}?>
            <?php if (isset($setting_errors['cur_password_value'])){echo '<div class="alert alert-danger">'.($setting_errors['cur_password_value']).'</div>';}?>
           <br>

           
            <label class="mb-2">Enter Your New Password :</label>
            <input type="password" class="mb-3" value="<?php  $cur_user->password;?>" name="password" />
            <?php if (isset($setting_errors['password'])){echo '<div class="alert alert-danger">'.($setting_errors['password']).'</div>';}?>
            <br>

            <label class="mb-2">Confirm Your New Password :</label>
            <input type="password" class="mb-3" value="<?php  $cur_user->password;?>" name="repassword" />
            <?php if (isset($setting_errors['repassword'])){echo '<div class="alert alert-danger">'. ($setting_errors['repassword']).'</div>';}?>
            <?php if (isset($setting_errors['pass'])){echo '<div class="alert alert-danger">'. ($setting_errors['pass']).'</div>';}?>
            <br>
            
            <div class="mt-4 text-center">
              <button class="btn btn-dark" type="submit" name="pass_info">
                <i class="fa-regular fa-pen-to-square me-2"></i>
                Change Password
              </button>
            </div>
          </div>
        </form>
        <footer class="text-center mb-5">
          <button class="btn btn-danger">Delete Account</button>
        </footer>
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
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/all.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/settings/settings.js"></script>
  </body>
</html>
<?php

}

?>