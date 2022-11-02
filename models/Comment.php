<?php

include_once(__DIR__.'./condb.php');

class Comment
{
    private $con;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }

    public function create($data)
    {
        $stmt = $this->con->prepare('INSERT INTO comments (`user_id`, post_id, comment_body) VALUES (?,?,?)');
        $stmt->execute(array($data['user_id'],$data['post_id'],$data['comment_body']));
        return $this->con->lastInsertId();
    }


    public function getCommentByPostId($postId)
    {
        $stmt = $this->con->prepare('SELECT * FROM comments WHERE post_id = ?');
        $stmt->execute(array($postId));
        return $stmt->fetchAll();
    }
}