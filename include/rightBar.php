<div class="right">
    <div class="request">
        <div class="requests-num">
            <span>Friend requests</span>
            <span></span>
        </div>
        <?php
        if (!empty($last_requested_user)) {
            $last_requested_user_id = $last_requested_user['id'];
            $last_requested_user_name = $last_requested_user['fname'] . $last_requested_user['lname'];
            $last_requested_user_profile_image = $last_requested_user['profile_image'];

        ?>
            <div class="new-requests">
                <div class="rquest-info">
                    <img src="./assets/images/users/<?php echo $last_requested_user_profile_image ?>" alt="" />
                    <h3>
                        <?php echo $last_requested_user_name; ?>
                    </h3>
                </div>
                <div class="time">4h</div>
                <div class="actions">
                    <form action=' <?php $_SERVER["PHP_SELF"] ?>' method='POST' enctype='multipart/form-data'>
                        <button class=" btn btn-primary" name="confirm" type='submit' value=<?php echo $last_requested_user_id; ?>>
                            Confirm
                        </button>
                        <button class=" btn btn-primary" name="Delete" type='submit' value=<?php echo $last_requested_user_id; ?>>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
    </div>
<?php } ?>
<div class="birthdays">
    <h4>Birthdays</h4>
    <div class="friend-birthday">
        <i class="fa-solid fa-gift"></i>
        <p>Mr Jones and 7 others have <br />birthdays today.</p>
    </div>
</div>
<div class="friend-active ">
    <h4>Active</h4>
    <div class="search-bar">
        <input type="text" placeholder="search" />
    </div>
    <div class="friends has-scrollbar">
        <?php
        foreach ($friends_array as $friend) {
            /***********************$friend is a friend record in data base******** */
            $friend_id = $friend['friend_id'];
            $id = $friend['id'];

            /**********select name and image ffrom my friend to shoe them *************/
            $my_friend = new user();
            $my_friend->id = $friend_id;

            $my_friend_image = $my_friend->fetch_image();
            $my_friend_name = $my_friend->fetch_name();
        ?>
            <div class="friend ">
                <div class="image">
                    <img src="./assets/images/users/<?php echo $my_friend_image ?>" alt="" />
                    <span></span>
                </div>
                <h5><?php echo $my_friend_name ?></h5>
                <div class="action d-flex justify-content-around">
                    <form action=' <?php $_SERVER["PHP_SELF"] ?>' method='POST' enctype='multipart/form-data'>
                        <!--return a friend id to do some action-->
                        <button class=" btn btn-primary" name="Message" type='submit' value=<?php echo $friend_id; ?>>Message </button>
                        <button class=" btn btn-primary" name="ViewProfile" type='submit' value=<?php echo $friend_id; ?>>View Profile </button>
                    </form>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
</div>
</div>