<?php

session_start();

include_once  '../models/Like.php';

$post_id = $_GET['postId'];

if (isset($post_id)) {
    $like = new Like();
    $data['post_id'] = $post_id;
    $data['status'] = $like::LIKE;
    $data['user_id'] = $_SESSION['id'];
    //if found reaction by user on this post
    if ($like->checkIfFoundReaction($data)) {
        if ($like->checkIfFoundLike($data)) {
            $like->removeLike($data);
            echo 'remove';
        }
    }else {
        $like->addLike($data);
        echo 'add';
    }

}