<?php

session_start();

include_once  '../models/Comment.php';

$comment_body = $_GET['comment'];
$post_id = $_GET['postId'];

if (isset($comment_body) && isset($post_id)) {
    $comment = new Comment();
    $data['post_id'] = $post_id;
    $data['comment_body'] = $comment_body;
    $data['user_id'] = $_SESSION['id'];

    $data['comment_id'] = $comment->create($data);

    

}

