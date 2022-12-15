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

    //Auth user
    $cur_user = new user();
    $cur_user->id = $_SESSION['id'];


    //fetch Auth user's frinds id to ignore them
    $friends_array = $cur_user->fetch_all_frinds();

    foreach ($friends_array as $friend) {
        $friend_id[] = $friend['friend_id'];
    }

    //array to have all users
    $all_users = $cur_user->fetch_all_users();


    //array to fetch blocked user
    $all_blocked_users = [];
    foreach ($cur_user->fetch_all_blocked_users() as $blocked_user) {
        $all_blocked_users[] = $blocked_user['user_send_request'];
    }

    //get last request id
    $last_requested_id = $cur_user->get_last_recuest();
    //get this user
    $last_requested_user = $cur_user->fetch_user($last_requested_id);


    $getPeopleMayBeKnow = $friendRequestModel->getPeopleMayBeKnow();
    $getAllFriends = $friendModel->getAllFriends();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <!--=============== Swiper ===============-->
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="./assets/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="./assets/css/Home/home.css" />
    <link rel="stylesheet" href="./assets/css/notifcation/notifcation.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- CSS -->
    <title>Notification</title>
</head>

<body>
    <!-- header include -->
    <?php
        include_once './include/header.php';

         //unseen all notification of this user in this post
        $allNotification = $notification->getAllNotificationByUserId();
        ?>

    <div class="main d-flex">

        <!-- leftBar include -->
        <?php include_once './include/leftBar.php'; ?>

        <div class="mid">
            <div class="notices">
                <?php
                if(!empty($allNotification))
                {
                    foreach ($allNotification as $notifiy) {
                        ?>
                <a href="<?=$notifiy['url']?>">

                    <div class="notice d-flex">
                        <div class="readornot">
                            <div class="div"></div>
                        </div>
                        <div class="content">
                            <div class="image">
                                <?php if(isset($notifiy['profile_image'])){
                                    ?>
                                <img src="./assets/images/users/<?=$notifiy['profile_image']?>" alt="" />
                                <?php
                                } else {
                                    ?>
                                <img src="./assets/images/Home/user.jpg" />

                                <?php
                                }
                                ?>

                            </div>
                            <div class="text">
                                <p><?=$notifiy['fname'] . ' ' . $notifiy['lname']?>
                                    <strong><?=$notifiy['message']?></strong>
                                </p>
                                <span class="text-muted"><?=$notifiy['created_at']?></span>
                            </div>
                        </div>
                    </div>
                </a>
                <?php
                    }
                }
                ?>

            </div>
        </div>


        <!-- rightBar include -->
        <?php include_once './include/rightBar.php'; ?>
    </div>

    <!-- footer include -->
    <?php include_once './include/nav.php'; ?>



    <div class="modal fade" id="delete_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="color:black">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="modal-body">
                        Do Your Want delete This Post
                        <input type="hidden" name="post_id" id="post_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="delete_post" class="btn btn-danger">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/Home/home.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
<?php
}
?>