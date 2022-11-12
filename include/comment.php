<?php
    foreach ($comments as $comment) {
        ?>
<div class="comment mb-4">
    <div class="img">
        <img src="../images/profile.jpg" class="img-fluid" alt="" />
    </div>
    <div class="content">
        <h6><?=$postController->fullName($comment['fname'], $comment['lname'])?></h6>
        <p>
            <?=$comment['comment_body']?>
        </p>
        <span class="comment-time text-muted">
            <?=$postController->timeElapsedString($comment['created_at'])?></span>
    </div>
</div>
<?php
    }
?>