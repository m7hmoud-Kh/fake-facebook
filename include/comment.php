<?php
foreach ($comments as $comment) {
?>
    <div class="comment mb-4">
        <div class="img">
            <img src="./assets/images/users/<?=$comment['profile_image']?>" class="img-fluid" alt="" />
        </div>
        <div class="content">
            <h6><?= $postController->fullName($comment['fname'], $comment['lname']) ?></h6>
            <p>
                <?= $comment['comment_body'] ?>
            </p>
            <?php
            if ($comment['user_id'] == $_SESSION['id'] || $post['user_id'] == $_SESSION['id']) {
            ?>
                <a href="" class="delete-comment" title="remove comment">
                    <i class="fa-solid fa-trash me-1"></i>
                </a>
            <?php
            }
            ?>

            <span class="comment-time text-muted">
                <?= $postController->timeElapsedString($comment['created_at']) ?></span>
        </div>
    </div>
<?php
}
?>