<?php

session_start();

include_once  '../models/Comment.php';
include_once '../models/Post.php';
include_once '../models/Notification.php';

$comment_body = $_GET['comment'];
$post_id = $_GET['postId'];

if (isset($comment_body) && isset($post_id)) {
    $comment = new Comment();
    $data['post_id'] = $post_id;
    $data['comment_body'] = $comment_body;
    $data['user_id'] = $_SESSION['id'];
    $data['comment_id'] = $comment->create($data);

    //get owner post by id
    $postModel = new Post();
    $post = $postModel->getPostById($data['post_id']);
    if ($post['user_id'] != $data['user_id']) {
        $notification = new Notification();
        $data['to_user_id'] = $post['user_id'];
        $data['from_user_id'] = $data['user_id'];
        $data['message'] = 'comment to your post';
        $data['url'] = "http://localhost/php_mah/fakeFacebook/post.php?id=$post[id]";
        $data['post_id'] = $post['id'];
        $notification->addNotification($data);
    }

    echo $data['comment_id'];
}
