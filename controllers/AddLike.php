<?php

session_start();

include_once  '../models/Like.php';
include_once '../models/Post.php';
include_once '../models/Notification.php';

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
    } else {

        //get owner post by id
        $postModel = new Post();
        $post = $postModel->getPostById($data['post_id']);
        if ($post['user_id'] != $data['user_id']) {
            $notification = new Notification();
            $data['to_user_id'] = $post['user_id'];
            $data['from_user_id'] = $data['user_id'];
            $data['message'] = 'Reacted to your post';
            $data['url'] = "http://localhost/php_mah/fakeFacebook/post.php?id=$post[id]";
            $data['post_id'] = $post['id'];
            $notification->addNotification($data);
        }
        $likeId =  $like->addLike($data);

        echo 'add';
    }
}
