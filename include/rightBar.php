<div class="right">
    <div class="friend-active ">
        <h4>Active</h4>
        <div class="search-bar">
            <input type="text" placeholder="search" />
        </div>
        <div class="friends has-scrollbar">
            <?php
        foreach ($getAllFriends as $friend) {
            ?>
            <div class="friend ">
                <div class="image">
                    <?php
                if(isset($friend['profile_image'])){
                    ?>
                    <img src="./assets/images/users/<?=$friend['profile_image'] ?>" alt="" />
                    <?php
                }else {
                    ?>
                    <img src="./assets/images/Home/user.jpg" alt="">
                    <?php
                }
                ?>
                </div>
                <h5><?= $friend['fname'] . ' '. $friend['lname'] ?></h5>
                <div class="d-flex">
                        <a href="chat.php?chat_with=<?=$friend['id']?>" class=" btn btn-primary">Message </a>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>


        </div>
    </div>
</div>