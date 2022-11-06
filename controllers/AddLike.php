<?php

session_start();

include_once  '../models/Like.php';

$post_id = $_GET['postId'];

if (isset($post_id)) {
    $like = new Like();
    $data['post_id'] = $post_id;
    $data['status'] = $like::LIKE;
    $data['user_id'] = $_SESSION['id'];
    if (!$like->checkIfFoundLike($data)) {
        $like->addLike($data);
        echo true;
    }else {
        //remove Like
        $like->removeLike($data);
        echo 0;
    }
}