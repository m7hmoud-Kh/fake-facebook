<div class="left">
  <div class="bg-color">
    <a class="userInfo">
      <?php
      if (isset($_SESSION['profile_image'])) {
        ?>
          <img src="./assets/images/users/<?= $_SESSION['profile_image'] ?>" alt="" />
      <?php
      }else {
        ?>
          <img src="./assets/images/Home/user.jpg" />
        <?php
      }
      ?>
      <h2><?= $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?></h2>
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
    <div class="maybe_freinds ">
      <h4>
        People may be know
      </h4>
      <div class="freinds has-scrollbar">
        <?php

        //show all user in data base
        foreach ($all_users as $user) {

          if (
            $user['id']==$cur_user->id ||
          in_array($user['id'], $all_blocked_users) ||
          (!empty($friend_id) && in_array($user['id'], $friend_id))
          ) {
            continue;
          }



        ?>
        <div class="friend">
          <div class="image">
            <?php
            if(isset($user['profile_image'])){
              ?>
            <img src="./assets/images/users/<?php echo $user['profile_image']; ?>" alt="" style="width: 40px;
                  height: 40px;
                  margin-right: 10px;
                  border-radius: 50%; " />
            <?php
            }else{
              ?>
            <img src="./assets/images/Home/user.jpg" />
            <?php
            }
            ?>

          </div>
          <h5><?php echo $user['fname'] . ' ' . $user['lname']; ?></h5>

          <div class=" action d-flex justify-content-around">
            <form action=' <?php $_SERVER["PHP_SELF"] ?>' method='POST' enctype='multipart/form-data'>
              <!--return a user id to do some action-->
              <button class=" btn btn-primary" name="AddFriend" type='submit' value=<?php echo $user['id']; ?>>Add
                Friend</button>
              <button class=" btn btn-primary" name="ViewProfile" type='submit' value=<?php echo $user['id']; ?>>View
                Profile </button>
            </form>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>