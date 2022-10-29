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
  <title>Facebook</title>

  <!--=============== BootsTrap  ===============-->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
  <!--=============== BOXICONS ===============-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./assets/css/all.min.css" />
  <!--=============== Swiper ===============-->
  <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="./assets/css/main.css" />
  <link rel="stylesheet" href="./assets/css/Home/home.css" />
  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Carter+One&family=Modak&family=Open+Sans:ital,wght@0,300;0,700;1,300;1,800&family=Poppins:wght@400;600;800&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,100;1,400&family=Sedgwick+Ave&family=Work+Sans:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;0,800;1,100;1,500&display=swap"
    rel="stylesheet" />
</head>

<body>
  <header>
    <div class="logo">Facebook</div>
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
            <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="details">
            <p>Mohamed Sayed Reacted to your post</p>
            <span class="text-muted">2m ago</span>
          </div>
        </div>
        <div class="notification-box d-flex align-items-center gap-2">
          <div class="img" style="width: 70px">
            <img src="../assets/images/profile.jpg" class="img-fluid" alt="" />
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
          <a href="#">
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
              <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
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
          <a href="#">
            <li>Profile</li>
          </a>
          <a href="#">
            <li>Friend Requests</li>
          </a>
        </ul>
      </div>
    </div>
  </header>
  <div class="main d-flex">
    <div class="left">
      <div class="bg-color">
        <a class="userInfo">
          <img src="images/Home/user.jpg" alt="" />
          <h2>Byiringiro Saad</h2>
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
      </div>
    </div>
    <div class="mid">
      <div class="add-post">
        <form>
          <div class="text-input">
            <div class="img">
              <img src="../images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <textarea placeholder="what's in your mind ..?"></textarea>
          </div>
          <div class="options d-flex justify-content-between mt-4">
            <label class="add-photo" for="file">
              <i class="fa-regular fa-image"></i>
              Photo
            </label>
            <input type="file" hidden id="file" />
            <button class="btn btn-primary">Post</button>
          </div>
        </form>
      </div>
      <div class="">
        <div class="posts">
          <div class="posts-list">
            <div class="post">
              <div class="header d-flex justify-content-between mb-2">
                <div class="publisher d-flex gap-3">
                  <div class="img">
                    <img src="images/profile.jpg" class="img-fluid" alt="" />
                  </div>
                  <div class="info">
                    <h5>Mohamed Sayed</h5>
                    <p class="text-muted">4:55 pm</p>
                  </div>
                </div>
                <div class="settings" onclick="openPostSettings(this)">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
              </div>
              <div class="text-content">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ullam dolores earum officia suscipit autem soluta, mollitia
                  labore culpa iste nulla voluptatibus ad? Saepe magnam libero
                  molestias laudantium sapiente repellendus optio?
                </p>
              </div>
              <div class="img-content text-center">
                <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
              </div>
              <div class="stats mt-4">
                <div class="likes">
                  <i class="fa-solid fa-thumbs-up" style="color: #e7c292; margin-right: 10px"></i>105
                </div>
                <div class="comments">
                  <i class="fa-solid fa-comment" style="color: #fff; margin-right: 10px"></i>105
                </div>
              </div>
              <div class="actions mt-5 d-flex justify-content-between">
                <div class="like">
                  <div><i class="fa-solid fa-thumbs-up"></i> Like</div>
                </div>
                <div class="dislike">
                  <div>
                    <i class="fa-solid fa-thumbs-down"></i>
                    Dislike
                  </div>
                </div>
                <div class="comment">
                  <div><i class="fa-solid fa-comment"></i> Comment</div>
                </div>
              </div>
              <div class="comments">
                <form class="add-comment">
                  <div class="img">
                    <img src="images/profile.jpg" class="img-fluid" style="width: 45px" alt="" />
                  </div>
                  <input type="text" id="commentInput" placeholder="type your comment ...." />
                  <button class="btn btn-primary">Post</button>
                </form>
              </div>
              <div class="setting">
                <ul class="list-unstyled">
                  <li><i class="fa-solid fa-trash mx-1"></i> Delete</li>
                </ul>
              </div>
            </div>
            <div class="post">
              <div class="header d-flex justify-content-between mb-2">
                <div class="publisher d-flex gap-3">
                  <div class="img">
                    <img src="../images/profile.jpg" class="img-fluid" alt="" />
                  </div>
                  <div class="info">
                    <h5>Mohamed Sayed</h5>
                    <p class="text-muted">4:55 pm</p>
                  </div>
                </div>
                <div class="settings" onclick="openPostSettings(this)">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </div>
              </div>
              <div class="text-content">
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Ullam dolores earum officia suscipit autem soluta, mollitia
                  labore culpa iste nulla voluptatibus ad? Saepe magnam libero
                  molestias laudantium sapiente repellendus optio?
                </p>
              </div>
              <div class="stats mt-4">
                <div class="likes">
                  <i class="fa-solid fa-thumbs-up" style="color: #e7c292; margin-right: 10px"></i>105
                </div>
                <div class="comments">
                  <i class="fa-solid fa-comment" style="color: #fff; margin-right: 10px"></i>105
                </div>
              </div>
              <div class="actions mt-5 d-flex justify-content-between">
                <div class="like">
                  <div><i class="fa-solid fa-thumbs-up"></i> Like</div>
                </div>
                <div class="dislike">
                  <div>
                    <i class="fa-solid fa-thumbs-down"></i>
                    Dislike
                  </div>
                </div>
                <div class="comment">
                  <div><i class="fa-solid fa-comment"></i> Comment</div>
                </div>
              </div>
              <div class="comments">
                <div class="comment mb-4">
                  <div class="img">
                    <img src="../images/profile.jpg" class="img-fluid" alt="" />
                  </div>
                  <div class="content">
                    <h6>Mohamed Sayed</h6>
                    <p>
                      This is a nice words, thanks for sharing this content.
                    </p>
                    <span class="comment-time text-muted">5:00 pm</span>
                  </div>
                </div>
                <div class="comment mb-4">
                  <div class="img">
                    <img src="../images/profile.jpg" class="img-fluid" alt="" />
                  </div>
                  <div class="content">
                    <h6>Mohamed Sayed</h6>
                    <p>
                      This is a nice words, thanks for sharing this content.
                    </p>
                    <span class="comment-time text-muted">5:00 pm</span>
                  </div>
                </div>
                <form class="add-comment">
                  <div class="img">
                    <img src="../images/profile.jpg" class="img-fluid" style="width: 45px" alt="" />
                  </div>
                  <input type="text" id="commentInput" placeholder="type your comment ...." />
                  <button class="btn btn-primary">Post</button>
                </form>
              </div>
              <div class="setting">
                <ul class="list-unstyled">
                  <li><i class="fa-solid fa-trash mx-1"></i> Delete</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="request">
        <div class="requests-num">
          <span>Friend requests</span>
          <span>30</span>
        </div>
        <div class="new-requests">
          <div class="rquest-info">
            <img src="images/Home/user.jpg" alt="" />
            <h3>
              Paula Mora
              <span>12 mutual friends</span>
            </h3>
          </div>
          <div class="time">4h</div>
          <div class="actions">
            <a href="">Confirm </a>
            <a href="">Delete</a>
          </div>
        </div>
      </div>
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
          <div class="friend ">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Corina McCoy</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>James Hall</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Rhonda Rhodws</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Kenneth Allen</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Stephanie Nicol</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend ">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Corina McCoy</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>James Hall</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Rhonda Rhodws</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Kenneth Allen</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
          <div class="friend">
            <div class="image">
              <img src="images/Home/user.jpg" alt="" />
              <span></span>
            </div>
            <h5>Stephanie Nicol</h5>
            <div class="action d-flex justify-content-around">
              <button class=" btn btn-primary">Message </button>
              <button class=" btn btn-primary">View Profile </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="footer-nav d-lg-none d-flex">
    <div class="home">
      <a href="index.html"><i class="fa-solid fa-home"></i></a>
    </div>
    <div class="notification"><i class="fa-solid fa-bell"></i></div>
    <div class="messenger">
      <a href="./pages/ChatList.html"><i class="fa-brands fa-facebook-messenger"></i></a>
    </div>
    <div class="porifle">
      <a href="./pages/UserProfile.html"><i class="fa-solid fa-user"></i></a>
    </div>
  </nav>
  <!--=============== SWIPER JS ===============-->
  <script src="./assets/js/swiper-bundle.min.js"></script>
  <!--=============== Main JS ===============-->
  <script src="./assets/js/all.min.js"></script>
  <script src="./assets/js/post/post.js"></script>
  <script src="./assets/js/Home/home.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>
<?php
}

?>