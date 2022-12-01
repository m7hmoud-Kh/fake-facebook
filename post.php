<?php
session_start();
if (empty($_SESSION)) {
    header('location: login.php');
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $postId   = $_GET['id'];
    }
    include_once './controllers/PostController.php';
    include_once './models/Post.php';
    include_once './models/Comment.php';
    include_once './models/Like.php';

    $post = new Post();
    $postController  = new PostController();
    $commentModel = new Comment();



    if (isset($_POST['delete_post'])) {
        $deleted_post = $post->getPostById($_POST['post_id']);
        //remove image from local
        if (isset($deleted_post['image'])) {
            $postController->removeImage($deleted_post['image']);
        }
        $post->deletePost($_POST['post_id']);
    }


    $post = $post->getAllInfoPostById($postId);
    $comments = $commentModel->getCommentByPostId($postId);

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
    <link rel="stylesheet" href="./assets/css/post/postSyles.css" />
    <title>Post</title>
</head>

<body>
    <!-- header include -->
    <?php
        include_once './include/header.php';

         //unseen all notification of this user in this post
        $notification->seenNotification($postId);
        ?>

    <div class="main d-flex">

        <!-- leftBar include -->
        <?php include_once './include/leftBar.php'; ?>

        <div class="mid">
            <div>
                <div class="posts">
                    <div class="posts-list">
                        <div class="post">
                            <div class="header d-flex justify-content-between mb-2">
                                <div class="publisher d-flex gap-3">
                                    <?php
                                        if (!empty($post['profile_image'])) {
                                        ?>
                                    <div class="img">
                                        <img src="./assets/images/users/<?= $post['profile_image'] ?>" class="img-fluid"
                                            alt="" />
                                    </div>
                                    <?php
                                        }
                                        ?>

                                    <div class="info">
                                        <h5><?= $postController->fullName($post['fname'], $post['lname']) ?></h5>
                                        <p class="text-muted">
                                            <?= $postController->timeElapsedString($post['created_at']) ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                                    if ($post['user_id'] == $_SESSION['id']) {
                                    ?>
                                <div class="settings" onclick="openPostSettings(this)">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="text-content">
                                <p>
                                    <?= $post['content'] ?>
                                </p>
                            </div>
                            <?php if (isset($post['image'])) {
                                ?>
                            <div class="img-content text-center">
                                <img src="./assets/images/posts/<?= $post['image'] ?>" class="img-fluid" />
                            </div>
                            <?php
                                }
                                ?>

                            <?php include './include/state_action.php'; ?>

                            <div class="comments">

                                <?php
                                    include './include/comment.php'
                                    ?>
                                <form class="add-comment" action="#">
                                    <?php
                                        if (!empty($_SESSION['profile_image'])) {
                                        ?>
                                    <div class="img">
                                        <img src="./assets/images/users/<?= $_SESSION['profile_image'] ?>"
                                            class="img-fluid" style="width: 45px" alt="" />
                                    </div>
                                    <?php
                                        }
                                        ?>

                                    <input type="hidden" id="postId" value="<?= $post['post_id'] ?>">
                                    <input type="text" id="commentInput" name="comment"
                                        placeholder="type your comment ...." />

                                    <button type="submit" name="add_comment" class="btn btn-primary">Post</button>
                                </form>
                            </div>

                            <div class="setting">
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-post_id="<?= $post['post_id'] ?>" data-bs-target="#delete_post">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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


    <!--=============== SWIPER JS ===============-->
    <!-- <script src="./assets/js/swiper-bundle.min.js"></script> -->
    <script src="./assets/js/all.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/jquery-3.5.0.min.js"></script>
    <!--=============== Main JS ===============-->
    <script src="./assets/js/post/post.js"></script>
    <script src="./assets/js/Home/home.js"></script>
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
                var fname = `<?= $_SESSION['fname'] ?>`;
                var lname = `<?= $_SESSION['lname'] ?>`;
                var profileImage = `<?= $_SESSION['profile_image'] ?>`
                var fullName = fname + ' ' + lname

                $.ajax({
                    type: "GET",
                    url: "./controllers/AddComment.php?comment=" + comment + "&postId=" + postId,
                    data: 'JSON',
                    success: function (response) {
                        $('<div class="comment mb-4">' +
                            '<div class="img">' +
                            `<img src="./assets/images/users/${profileImage}" class="img-fluid" alt="" />` +
                            '</div>' +
                            '<div class="content">' +
                            '<h6>' + fullName + '</h6>' +
                            '<p>' +
                            comment +
                            '</p>' +
                            `<a data-comment_id="${response}" name='delete-comment' class="delete-comment"
              title="remove comment">
              <i class="fa-solid fa-trash me-1"></i>
              </a>` +
                            '<span class="comment-time text-muted">' + h + ':' + m + '</span>' +
                            '</div>' +
                            '</div>').insertBefore(parent)
                    }
                });

                parent.children[2].value = '';

                // increment comment after insert new Comment
                let commentCount = parseInt(document.getElementById(postId).lastElementChild.textContent)
                commentCount += 1;
                document.getElementById(postId).lastElementChild.textContent = commentCount;

            }

        });

        $('span#likeIcon').on('click', function () {
            let likeIcon = $(this);
            let postId = $(this).attr('data-postId');
            let likeElement = document.querySelector('#countLike' + postId)
            let likeCounter = parseInt(likeElement.textContent);
            $.ajax({
                type: "GET",
                url: "./controllers/AddLike.php?postId=" + postId,
                data: 'JSON',
                success: function (response) {
                    console.log(response);
                    let svg = likeIcon.prev()[0];
                    if (response == 'add') {
                        likeCounter += 1;
                        likeElement.innerText = likeCounter
                        svg.attributes[0].value = 'svg-inline--fa fa-solid fa-thumbs-up'
                    }
                    if (response == 'remove') {
                        likeCounter -= 1;
                        likeElement.innerText = likeCounter
                        svg.attributes[0].value = 'svg-inline--fa fa-regular fa-thumbs-up'
                    }
                }
            });
        });


        $('span#disLikeIcon').on('click', function () {
            let disLikeIcon = $(this);
            let postId = $(this).attr('data-postId');

            let likeElement = document.querySelector('#countLike' + postId)
            let likeCounter = parseInt(likeElement.textContent);

            $.ajax({
                type: "GET",
                url: "./controllers/AddDisLike.php?postId=" + postId,
                data: 'JSON',
                success: function (response) {
                    let svg = disLikeIcon.prev()[0];
                    if (response == 'add') {
                        likeCounter += 1;
                        likeElement.innerText = likeCounter
                        svg.attributes[0].value = 'svg-inline--fa fa-solid fa-thumbs-down';
                    }
                    if (response == 'remove') {
                        likeCounter -= 1;
                        likeElement.innerText = likeCounter
                        svg.attributes[0].value = 'svg-inline--fa fa-regular fa-thumbs-down'
                    }
                }
            });


        });

        $('a[title="remove comment"]').on('click', function (event) {
            // console.log();
            console.log(parent);
            let comment = $(this).parents()[1];
            let commentId = $(this).data('comment_id');
            if (commentId) {
                $.ajax({
                    type: "GET",
                    url: "./controllers/DeleteComment.php?commentId=" + commentId,
                    data: 'JSON',
                    success: function (response) {
                        comment.classList.add('hide')
                    }
                });
            }



        });
    </script>
</body>

</html>
<?php
}
?>