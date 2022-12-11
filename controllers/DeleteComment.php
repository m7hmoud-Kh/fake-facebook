<?php

session_start();

include_once  '../models/Comment.php';

$commentId = $_GET['commentId'];

if (isset($commentId)) {
    $comment = new Comment();
    $comment->deleteCommentById($commentId);
}

