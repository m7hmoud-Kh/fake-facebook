<?php

include './models/Notification.php';

$notification = new Notification();
$unSeenNotification = $notification->getUnreadNotificationByUserId();

?>
<header>
    <div class="logo d-flex gap-4 align-items-center">
        <div class="d-lg-none d-block nav-toggler">
            <i class="toggle-icon fa-solid fa-bars"></i>
        </div>
        <a href="index.php">Facebook</a>
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
            <?php
            if ($unSeenNotification[0] > 0) {
            ?>
            <div class="seen"></div>
            <?php
            } else {
            ?>
            <div class="unseen"></div>
            <?php
            }
            ?>
        </div>
        <div class="profile">
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="notifications has-scrollbar">
            <?php
            if(!empty($unSeenNotification[1])){
                foreach ($unSeenNotification[1] as $notifiy) {
                    ?>
            <a href="<?=$notifiy['url']?>">
                <div class="notification-box d-flex align-items-center gap-2">
                    <div class="img" style="width: 70px">
                        <img src="./assets/images/users/<?=$notifiy['profile_image']?>" class="img-fluid" alt="" />
                    </div>
                    <div class="details">
                        <p><?=$notifiy['fname'] . ' ' . $notifiy['lname']?>
                            <strong><?=$notifiy['message']?></strong>
                        </p>
                        <span class="text-muted"><?=$notifiy['created_at']?></span>
                    </div>
                </div>
            </a>
            <?php
                }
            }else{
                ?>
                <div class="notification-box d-flex align-items-center gap-2">
                    <div class="details">
                       <p>No New Notification Until</p>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="load-more text-center">
                <a href="./notification.php">Load more...</a>
            </div>
        </div>
        <div class="setting-popup">
            <ul class="list-unstyled">
                <a href="./Settings.php">
                    <li>Settings</li>
                </a>
                <a href="logout.php">
                    <li>Log out</li>
                </a>
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
                        <img src="../../images/profile.jpg" class="img-fluid" alt="" />
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
                        <img src="../../images/profile.jpg" class="img-fluid" alt="" />
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
                        <img src="../../images/profile.jpg" class="img-fluid" alt="" />
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
                <p>Load More ....</p>
            </div>
        </div>
        <div class="profile-popup">
            <ul class="list-unstyled">
                <a href="UserProfile.php">
                    <li>Profile</li>
                </a>
                <a href="#">
                    <li>Friend Requests</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="aside-header d-lg-none">
        <ul class="list-unstyled">
            <li>
                <a href="UserProfile.php"><i class="fa-solid fa-user"></i>Profile</a>
            </li>
            <li>
                <a href=""><i class="fa-solid fa-user-group"></i>Friends</a>
            </li>
            <li>
                <a href="Settings.php"><i class="fa-solid fa-gear"></i>Settings</a>
            </li>
            <li>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </li>
        </ul>
    </div>
    <div class="overlay d-lg-none"></div>
</header>