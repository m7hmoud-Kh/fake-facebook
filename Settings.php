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



/*********************************Validation ***********************************/
 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['pass_info']) ){

  $setting_errors=UserController::validatesetting($data);

}
/*********************************update Data ***********************************/
if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['bio'])){

  $cur_user->fname=$data['fname'];
  $cur_user->lname=$data['lname'];
  $cur_user->email=$data['email'];
  $cur_user->bio=$data['bio'];
  $cur_user->Updatedata();

}

/*********************************update password ***********************************/
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

/*********************************update profile image ***********************************/

  if (!empty($_FILES["image"]) && isset($_POST['prof_img']) ){

    $Files = $_FILES['image']['name'] ?? '';


    $arrError  =  UserController::validateImage( $Files);
    if (empty($arrError)) {

      if (!empty($Files)) {
        $ftemp = $_FILES["image"]["tmp_name"];
        $fname = $_FILES['image']['name'];
        $new_image =  UserController::uploadImage($fname, $ftemp);
        $cur_user->prof_image=$new_image;
      }

     $cur_user->Updateimage();
     $_SESSION['profile_image']=$cur_user->prof_image;

   }
  }
/*********************update cuver image *******************************/
if (!empty($_FILES['cuver_image']) && isset($_POST['cuver'])) {

  $Files_2 = $_FILES['cuver_image']['name'] ?? '';


  $arrError_2  =  UserController::validateImage( $Files_2);
  if (empty($arrError_2)) {

    if (!empty($Files_2)) {
      $ftemp = $_FILES["cuver_image"]["tmp_name"];
      $fname = $_FILES['cuver_image']['name'];
      $new_cuver_image =  UserController::uploadImage($fname, $ftemp);
      $cur_user->cuv_image=$new_cuver_image;
    }

   $cur_user->Update_cuver_image();
   $_SESSION['profile_background']=$cur_user->cuv_image;

 }
}
/************************************delete profile image********************/


  if(isset($_POST['Delete_prof_imag'])){
    UserController::removeImage( $_SESSION['profile_image']);
    $cur_user->prof_image=null;
    $cur_user->Updateimage();
    $_SESSION['profile_image']=$cur_user->prof_image;

  }

  /************************************delete cuver image********************/


  if(isset($_POST['Delete_cuver_imag'])){
    UserController::removeImage( $_SESSION['profile_background']);
    $cur_user->cuv_image=null;
    $cur_user->Update_cuver_image();
    $_SESSION['profile_background']=$cur_user->cuv_image;

  }
/*****************************************delete acount******************** */
  if(isset($_POST['delete'])){
    $cur_user->deleteAcount();
    header('location: logout.php');

  }

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
    <!-- header include -->
    <?php
      include_once './include/header.php';
    ?>

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
      <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <h4>Change your profile picture</h4>
        <div class="change-picture mb-5">
          <div class="img">
            <img src=<?php echo "./assets/images/users/".$_SESSION["profile_image"]?> class="img-fluid" alt="" />
          </div>
          <div class="actions">
            <button class="btn btn-danger" name="Delete_prof_imag">Delete</button>
            <label class="btn btn-primary" for="input-profile-Image">Upload</label>
            <input type="file" hidden id="input-profile-Image" name="image" />
            <button type="submit" class="btn btn-success" id="profile-submit" name="prof_img" disabled>
              Save
            </button>

          </div>
        </div>
      </form>
      <!-------------------------------------------Change Cover Form----------------------->
      <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <h4>Change your Cover</h4>
        <div class="change-cover mb-5">
          <div class="img cover-img">
            <img src=<?php echo "./assets/images/users/".$_SESSION["profile_background"]?> class="img-fluid" alt="" />
          </div>
          <div class="actions">
            <button class="btn btn-danger" name="Delete_cuver_imag">Delete</button>
            <label class="btn btn-primary" for="input-cover-Image">Upload</label>
            <input type="file" hidden id="input-cover-Image" name="cuver_image" />
            <button type="submit" class="btn btn-success" id="cover-submit" name="cuver" disabled>
              Save
            </button>
          </div>
        </div>
      </form>
      <!-----------------------Change first name form------------------>
      <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <h4>Change Your First name</h4>
        <div class="change-name mb-5 d-flex align-items-center gap-5 py-4 justify-content-between">
          <input type="text" value="<?php echo $cur_user->fname;?>" name="fname" />

          <i class="fa-regular fa-pen-to-square"></i>
          Edit
          </button>
        </div>
        <!--Change Account last form-->

        <h4>Change Your Last name</h4>
        <div class="change-name mb-5 d-flex align-items-center gap-5 py-4 justify-content-between">
          <input type="text" value="<?php echo $cur_user->lname;?>" name="lname" />

          <i class="fa-regular fa-pen-to-square"></i>
          Edit
          </button>
        </div>

        <!--Change bio form-->

        <h4>Change Your BIO</h4>
        <div class="mb-5 d-flex align-items-center gap-5 py-4 justify-content-between">
          <input type="text" value="<?php echo $cur_user->bio;?>" name="bio" />

          <i class="fa-solid fa-pencil"></i>
          Edit
          </button>
        </div>

        <!--Change Email form-->

        <h4>Change your email address</h4>
        <div class="change-email mb-5 d-flex align-items-center gap-5 py-4 justify-content-between">
          <input type="email" value="<?php echo $cur_user->email;?>" name="email" />

          <i class="fa-regular fa-pen-to-square"></i>
          Edit
          </button>
        </div>
        <button class="btn btn-success me-2" type="submit" name="data">Save Changes</button>
      </form>

      <!----------------------------Change Password Form------------------------>
      <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
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
        <form action="<?php  $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <button class="btn btn-danger" type="submit" name="delete">Delete Account</button>
        </form>
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
      <a href="ChatList.html"><i class="fa-brands fa-facebook-messenger"></i></a>
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