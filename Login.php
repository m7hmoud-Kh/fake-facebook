<?php
session_start();
include_once './models/User.php';
include_once './controllers/UserController.php';
include_once './controllers/Cookies.php';

$userController = new UserController();
$user = new User();

if (!empty($_COOKIE['email'])) {
  $cookies = new Cookies($user);
}

if (empty($_SESSION)) {

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;




    $arrError = $userController->validateLogin($data);

    if (!$arrError) {
      $user =  $user->CheckEmailForLogin($data['email']);
      if ($user) {
        if (password_verify($data['pass'], $user['pass'])) {

          foreach ($user as $key => $value) {
            $_SESSION[$key] = $value;
          }

          if ($data['remember']) {
            setcookie('email', $data['email'], time() + 60*60*24, '/');
          }

          header('location: index.php');

        }else {
          $arrError['error_login'] = 'Email Or Password invaild';
        }


      } else {
        $arrError['error_login'] = 'Email Or Password invaild';
      }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    /> -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets\css\Login&SignUp\Login&SignUp.css" />
    <title>Login</title>
  </head>

  <body>
    <div class="container">
      <div class="login-form">
        <!-- Login Form  -->
        <div class="form login">
          <span class="title">Login</span>
          <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
            <div class="input-field">
              <input type="email" placeholder="Email adress" name="email"  />
              <i class="uil uil-envelope icon"></i>
            </div>
            <p class="text-danger mt-2 text-center"><?=$arrError['email'] ?? ''?></p>

            <div class="input-field">
              <input
                type="password"
                class="password"
                placeholder="Password"
                name="pass"
              />
              <i class="uil uil-lock icon"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
            </div>
            <p class="text-danger mt-2 text-center"><?=$arrError['pass'] ?? ''?></p>

            <div class="checkbox-text">
              <div class="checkbox-content">
                <input type="checkbox" id="logCheck" name="remember" value="1" />
                <label for="logCheck" class="text">Remember me</label>
              </div>
              <a href="#" class="text">Forgot password?</a>
            </div>
            <div class="input-field button">
              <input type="submit" value="Login" />
            </div>
            <p class="text-danger mt-2 text-center"><?=$arrError['error_login'] ?? ''?></p>

          </form>
          <div class="login-signup">
            <span class="text">
              <a href="SignUp.php" class="text signup-link"
                >Create New Account</a
              >
            </span>
          </div>
        </div>
      </div>
    </div>

    <script src="./assets\js\Login&Register\Login&SignUp.js"></script>
  </body>
</html>

<?php
} else {
  header('location: index.php');
}
