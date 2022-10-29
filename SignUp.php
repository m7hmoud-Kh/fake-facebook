<?php

include_once './models/User.php';
include_once './controllers/UserController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST;
    $userController = new UserController();
    $userModel = new User();
    $arrError = $userController->validateRegister($data);

    if (!$arrError) {
        $found = $userModel->checkFoundEmail($data['email']);
        if ($found != 0) {
            $arrError['duplicate'] = 'Email Already Taken';
        } else {
            $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);
            $created = $userModel->create($data);
            if ($created) {
                $success = 'User Register Successfully';
                header('Refresh:3;url=Login.php');
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="./assets\css\Login&SignUp\Login&SignUp.css" />

    <title>Register</title>
</head>

<body>
    <div class="container">

        <div class="signup-form">
            <!-- Sign Up Form -->
            <div class="form signup">
                <?php
                if (isset($success)) {
                    ?>
                    <div class="alert alert-success">
                        <?=  $success ?>
                    </div>
                    <?php
                }
                ?>
                <span class="title">Sign Up</span>
                <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="input-field">
                        <input type="text" name="fname" placeholder="First Name" >
                        <i class="uil uil-user"></i>
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['fname'] ?? ''?></p>
                    <div class="input-field">
                        <input type="text" name="lname" placeholder="Last Name" >
                        <i class="uil uil-user"></i>
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['lname'] ?? ''?></p>

                    <div class="input-field">
                        <input type="email" name="email" placeholder="Your Email" >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['email'] ?? ''?></p>

                    <div class="input-field">
                        <input type="password" name="pass" class="password" placeholder="Password" >
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['pass'] ?? ''?></p>

                    <div class="input-field">
                        <input type="password" name="re_pass" class="password" placeholder="Re-enter Password" >
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['re_pass'] ?? ''?></p>

                    <div class="birthday">
                        <label for="birthday">Birthday:</label>
                        <input type="date" id="birthday" name="date_brith">
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['date_brith'] ?? ''?></p>

                    <div class="gender">
                        <label for="gender">Gender:</label>
                        <input type="radio" name="gender" value="0"> Male
                        <input type="radio" name="gender" value="1"> Female
                    </div>
                    <p class="text-danger mt-2 text-center"><?=$arrError['gender'] ?? ''?></p>


                    <div class="input-field button">
                        <input type="submit" value="Create New Account">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Have an Accont?
                        <a href="Login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets\js\Login&Register\Login&SignUp.js"></script>

</body>

</html>

