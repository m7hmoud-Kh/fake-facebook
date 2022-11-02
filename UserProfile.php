<?php
session_start();
if (empty($_SESSION)) {
  header('location: login.php');
} else {
  include_once './controllers/PostController.php';
  include_once './models/Post.php';
  include_once './models/Comment.php';

  $post = new Post();
  $postController  = new PostController();


  if (isset($_POST['add_post'])) {
    $data = $_POST;
    $Files = $_FILES['image']['name'] ?? '';

    $arrError  = $postController->validatePost($data, $Files);
    if (empty($arrError)) {

      if (!empty($Files)) {
        $ftemp = $_FILES["image"]["tmp_name"];
        $fname = $_FILES['image']['name'];
        $new_image = $postController->uploadImage($fname, $ftemp);
        $data['image'] = $new_image;
      }

      // create Post
      $post->create($data);

    }
  }

  if (isset($_POST['delete_post'])) {
    $deleted_post = $post->getPostById($_POST['post_id']);
    //remove image from local
    if (isset($deleted_post['image'])) {
      $postController->removeImage($deleted_post['image']);
    }
    $post->deletePost($_POST['post_id']);
  }

  $allPosts = $post->myPosts($_SESSION['id']);


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
  <link rel="stylesheet" href="./assets/css/profile/myProfile.css" />
  <title>Profile</title>
</head>

<body>
  <?php include './include/header.php' ?>
  <div class="container">
    <div class="profile">
      <div class="user-info">
        <div class="cover">
          <img src="../images/cover.jpg" alt="" class="img-fluid" />
        </div>
        <div class="user-data">
          <div class="profile-img">
            <img src="../images/profile.jpg" class="img-fluid" alt="" />
          </div>
          <div class="user-details">
            <h2>Mohamed Sayed Osman</h2>
            <p class="friends text-light">3,180 friend</p>
          </div>
          <div class="btn btn-primary">Update Profile</div>
        </div>
      </div>
      <div class="main-page">
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="bio">
              <h4 class="mt-2 mb-4">About US</h4>
              <div class="about">
                <p>My name is Mohamed Sayed, i'm a front-end developer</p>
                <p>FC Barcelona</p>
                <p>Ahly</p>
              </div>

              <div class="friends px-4 mt-5">
                <div class="head d-flex justify-content-between">
                  <p class="">Friends</p>
                  <p class="">3,800</p>
                </div>
                <hr class="mb-4 mt-0" />

                <div class="row">
                  <div class="col-4 mb-4">
                    <div class="friend-box">
                      <img src="../images/profile.jpg" class="img-fluid mb-2" style="border-radius: 5px" alt="" />
                      <a href="#" style="
                            font-size: 14px;
                            text-overflow: ellipsis;
                            word-wrap: none;
                          ">Mohamed Sayed</a>
                    </div>
                  </div>
                  <div class="col-4 mb-4">
                    <div class="friend-box">
                      <img src="../images/profile.jpg" class="img-fluid mb-2" style="border-radius: 5px" alt="" />
                      <a href="#" style="
                            font-size: 14px;
                            text-overflow: ellipsis;
                            word-wrap: none;
                          ">Mohamed Sayed</a>
                    </div>
                  </div>
                  <div class="col-4 mb-4">
                    <div class="friend-box">
                      <img src="../images/profile.jpg" class="img-fluid mb-2" style="border-radius: 5px" alt="" />
                      <a href="#" style="
                            font-size: 14px;
                            text-overflow: ellipsis;
                            word-wrap: none;
                          ">Mohamed Sayed</a>
                    </div>
                  </div>
                  <div class="col-4 mb-4">
                    <div class="friend-box">
                      <img src="../images/profile.jpg" class="img-fluid mb-2" style="border-radius: 5px" alt="" />
                      <a href="#" style="
                            font-size: 14px;
                            text-overflow: ellipsis;
                            word-wrap: none;
                          ">Mohamed Sayed</a>
                    </div>
                  </div>
                  <div class="col-4 mb-4">
                    <div class="friend-box">
                      <img src="../images/profile.jpg" class="img-fluid mb-2" style="border-radius: 5px" alt="" />
                      <a href="#" style="
                            font-size: 14px;
                            text-overflow: ellipsis;
                            word-wrap: none;
                          ">Mohamed Sayed</a>
                    </div>
                  </div>
                  <div class="col-4 mb-4">
                    <div class="friend-box">
                      <img src="../images/profile.jpg" class="img-fluid mb-2" style="border-radius: 5px" alt="" />
                      <a href="#" style="
                            font-size: 14px;
                            text-overflow: ellipsis;
                            word-wrap: none;
                          ">Mohamed Sayed</a>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <div class="btn btn-primary">Show All Friends</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8 col-12 mt-lg-0 mt-5">
            <div class="posts">
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
                    <button type="submit" name="add_post" class="btn btn-primary">Post</button>
                  </div>
                </form>
              </div>

              <div class="posts-list">
                <?php
                $commentModel = new Comment();
                foreach ($allPosts as $post) {
                  $comments = $commentModel->getCommentByPostId($post['id']);
                  ?>
                <div class="post">
                  <div class="header d-flex justify-content-between mb-2">
                    <div class="publisher d-flex gap-3">
                      <div class="img">
                        <img src="../images/profile.jpg" class="img-fluid" alt="" />
                      </div>
                      <div class="info">
                        <h5><?=$postController->fullName($_SESSION['fname'], $_SESSION['lname'])?></h5>
                        <p class="text-muted">
                          <?=$postController->timeElapsedString($post['created_at'])?>
                        </p>
                      </div>
                    </div>
                    <div class="settings" onclick="openPostSettings(this)">
                      <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                  </div>
                  <div class="text-content">
                    <p>
                      <?=$post['content']?>
                    </p>
                  </div>
                  <?php if (isset($post['image'])) {
                    ?>
                  <div class="img-content text-center">
                    <img src="./assets/images/posts/<?=$post['image']?>" class="img-fluid" />
                  </div>
                  <?php
                  }
                  ?>

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

                  <?php
                    foreach ($comments as $comment) {
                      ?>
                    <div class="comment mb-4">
                      <div class="img">
                        <img src="../images/profile.jpg" class="img-fluid" alt="" />
                      </div>
                      <div class="content">
                        <h6><?=$postController->fullName($_SESSION['fname'], $_SESSION['lname'])?></h6>
                        <p>
                          <?=$comment['comment_body']?>
                        </p>
                        <span class="comment-time text-muted">                          <?=$postController->timeElapsedString($post['created_at'])?></span>
                      </div>
                    </div>
                    <?php
                    }

                    ?>
                    <form class="add-comment" action="#">
                      <div class="img">
                        <img src="./assets/images/profile.jpg" class="img-fluid" style="width: 45px" alt="" />
                      </div>
                      <input type="hidden" id="postId" value="<?=$post['id']?>">
                      <input type="text" id="commentInput" name="comment" placeholder="type your comment ...." />
                      <button type="submit" name="add_comment" class="btn btn-primary">Post</button>
                    </form>
                  </div>
                  <div class="setting">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-post_id="<?=$post['id']?>"
                      data-bs-target="#delete_post">
                      Delete
                    </button>
                  </div>



                </div>
                <?php
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


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





  <?php include './include/nav.php' ?>

  <script src="./assets/js/all.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/jquery-3.5.0.min.js"></script>
  <script src="./assets/js/post/post.js"></script>
  <script src="./assets/js/main.js"></script>

  <script>
    $('#delete_post').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var post_id = button.data('post_id');

      var modal = $(this);
      modal.find('.modal-body #post_id').val(post_id)
    });

    $('button[name="add_comment"]').on('click', function (event) {
      event.preventDefault();
      let parent = $(this).parent()[0];

      let postId = parent.children[1].attributes['value'].value;
      let comment = parent.children[2].value;
      if (comment) {
        var d = new Date();
        let h = d.getHours();
        let m = d.getMinutes();
        let s = d.getSeconds();

        var name = '<?php echo $_SESSION['fname'] . ' ' . $_SESSION['lname'] ?>';

        $.ajax({
          type: "GET",
          url: "./controllers/AddComment.php?comment=" + comment + "&postId=" + postId,
          data: 'JSON',
          success: function (response) {
            $('<div class="comment mb-4">' +
              '<div class="img">' +
              '<img src="../images/profile.jpg" class="img-fluid" alt="" />' +
              '</div>' +
              '<div class="content">' +
              '<h6>' + name + '</h6>' +
              '<p>' +
              comment +
              '</p>' +
              '<span class="comment-time text-muted">' + h + ':' + m + '</span>' +
              '</div>' +
              '</div>').insertBefore(parent)
          }
        });

        parent.children[2].value = '';

      }

    });
  </script>
</body>

</html>
<?php

}

?>