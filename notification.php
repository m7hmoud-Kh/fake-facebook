<?php
session_start();
if (empty($_SESSION)) {
    header('location: login.php');
} else {


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
    <link rel="stylesheet" href="./assets/css/notifcation/notifcation.css" />

    <title>Post</title>
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
                                <img src="./assets/images/users/<?=$notifiy['profile_image']?>" alt="" />
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