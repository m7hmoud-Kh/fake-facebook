<?php

$like = new Like();
$comment_count = $commentModel->getCountCommentbyPostId($post['id']);
$data['post_id'] = $post['id'];
$data['user_id'] = $_SESSION['id'];
$data['status'] = $like::LIKE;
$found = $like->checkIfFoundLike($data);
$data['status'] = $like::DISLIKE;
$foundDislike = $like->checkIfFoundLike($data);
$count_like_disLike = $like->countLikeAndDisLike($post['id']);
?>

<div class="stats mt-4">
    <div class="likes">
        <i class="fa-solid fa-thumbs-up" style="color: #e7c292"></i>
        <i class="fa-solid fa-thumbs-down" style="color: #e7c292; margin-right: 10px"></i>

        <span id="countLike<?=$post['id']?>">
            <?=$count_like_disLike['count_like_disLike']?>
        </span>
    </div>
    <div class="comments commentCount" id="<?=$post['id']?>">
        <i class="fa-solid fa-comment" style="color: #fff; margin-right: 10px"></i>
        <span><?=$comment_count['comment_count']?></span>
    </div>
</div>
<div class="actions mt-5 d-flex justify-content-between">
    <div class="liked">
        <div>
            <?php
            if ($found) {
                ?>
            <i class="fa-solid fa-thumbs-up"></i>
            <?php
            } else {
                ?>
            <i class="fa-regular fa-thumbs-up"></i>
            <?php
            }
            ?>
            <span id="likeIcon" data-postId="<?=$post['id']?>">Like</span>
        </div>
    </div>
    <div class="dislike">
        <div>
            <?php
            if ($foundDislike) {
                ?>
                    <i class="fa-solid fa-thumbs-down"></i>
                <?php
            } else {
                ?>
                    <i class="fa-regular fa-thumbs-down"></i>
                <?php
            }
            ?>
            <span id="disLikeIcon" data-postId="<?=$post['id']?>">Dislike</span>
        </div>
    </div>
    <div class="comment">
        <div><i class="fa-solid fa-comment"></i> Comment</div>
    </div>

</div>