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
        $stmt = $this->con->prepare('SELECT comments.*, users.fname , users.lname , users.profile_image FROM
        comments JOIN users ON users.id = comments.user_id WHERE post_id = ?; ');
        $stmt->execute(array($postId));
        return $stmt->fetchAll();
    }


    public function getCountCommentbyPostId($postId)
    {
        $stmt = $this->con->prepare('SELECT COUNT(*) as comment_count FROM comments WHERE post_id = ?');
        $stmt->execute(array($postId));
        return $stmt->fetch();
    }


    public function deleteCommentById($commentId)
    {
        $stmt = $this->con->prepare('DELETE FROM comments WHERE id = ?');
        $stmt->execute(array($commentId));
    }
}