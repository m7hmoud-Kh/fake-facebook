<?php

session_start();

include_once  '../models/Like.php';

$post_id = $_GET['postId'];

if (isset($post_id)) {
    $like = new Like();
    $data['post_id'] = $post_id;
    $data['status'] = $like::DISLIKE;
    $data['user_id'] = $_SESSION['id'];

    if ($like->checkIfFoundReaction($data)) {
        if ($like->checkIfFoundLike($data)) {
            $like->removeLike($data);
            echo 'remove';
        }
    }else {
        $like->addLike($data);
        echo 'add';
    }
    // // check if found dislike or not
    // if (!$like->checkIfFoundLike($data)) {
    //     $like->addLike($data);
    //     echo true;
    // }else {
    //     //remove Like
    //     $like->removeLike($data);
    //     echo 0;
    // }
}