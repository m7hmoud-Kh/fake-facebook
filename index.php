<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './controllers/PostController.php';
  include_once './models/Post.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = $_POST;
      $Files = $_FILES['image']['name'] ?? '';
      $postController  = new PostController();
      $arrError  = $postController->validatePost($data, $Files);
      if (empty($arrError)) {

        if (!empty($Files)) {
          $ftemp = $_FILES["image"]["tmp_name"];
          $fname = $_FILES['image']['name'];
          $new_image = $postController->uploadImage($fname, $ftemp);
        }

        // create Post
        $post = new Post();
        $data['image'] = $new_image;
        $post->create($data);

      }

  }
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


  <!-- header include -->
  <?php
      include_once './include/header.php';
    ?>

  <div class="main d-flex">

    <!-- leftBar include -->
    <?php   include_once './include/leftBar.php'; ?>

    <div class="mid">
      <div class="add-post">
        <?php
        if (!empty($arrError)) {
          foreach ($arrError as $error) {
              ?>
        <p class="alert alert-danger"><?=$error?></p>
        <?php
            }
        }
        ?>



        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
          <div class="text-input">
            <div class="img">
              <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
            </div>
            <textarea name="content" placeholder="what's in your mind ..?"></textarea>
          </div>
          <div class="options d-flex justify-content-between mt-4">
            <label class="add-photo" for="file">
              <i class="fa-regular fa-image"></i>
              Photo
            </label>
            <input type="file" name="image" hidden id="file" />
            <button class="btn btn-primary">Post</button>
          </div>
        </form>
      </div>

      <div>
        <div class="posts">
          <div class="posts-list">
            <div class="post">
              <div class="header d-flex justify-content-between mb-2">
                <div class="publisher d-flex gap-3">
                  <div class="img">
                    <img src="./assets/images/profile.jpg" class="img-fluid" alt="" />
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
            <!-- <div class="post">
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
            </div> -->
          </div>
        </div>
      </div>
    </div>

    <!-- rightBar include -->
    <?php   include_once './include/rightBar.php'; ?>
  </div>

  <!-- footer include -->
  <?php   include_once './include/nav.php'; ?>



  <!--=============== SWIPER JS ===============-->
  <script src="./assets/js/swiper-bundle.min.js"></script>
  <!--=============== Main JS ===============-->
  <script src="./assets/js/all.min.js"></script>
  <script src="./assets/js/post/post.js"></script>
  <script src="./assets/js/Home/home.js"></script>
  <script src="./assets/js/main.js"></script>

  <script>

  </script>
</body>

</html>
<?php
}

?>