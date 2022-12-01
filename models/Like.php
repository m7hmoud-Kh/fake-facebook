<?php

include_once(__DIR__.'./condb.php');

class Like
{
    private $con;

    const LIKE = 1;
    const DISLIKE = 0;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }

    public function addLike($data)
    {
        $stmt = $this->con->prepare('INSERT INTO likes (`user_id`,post_id,`status`) VALUES (?,?,?) ');
        $stmt->execute(array($data['user_id'],$data['post_id'],$data['status']));
        return $this->con->lastInsertId();
    }

    public function checkIfFoundLike($data)
    {
        $stmt = $this->con->prepare('SELECT * FROM likes WHERE `user_id` = ? AND post_id = ? AND `status` = ?');
        $stmt->execute(array($data['user_id'],$data['post_id'],$data['status']));
        return $stmt->rowCount();
    }

    public function checkIfFoundReaction($data)
    {
        $stmt = $this->con->prepare('SELECT * FROM likes WHERE `user_id` = ? AND post_id = ?');
        $stmt->execute(array($data['user_id'],$data['post_id']));
        return $stmt->rowCount();
    }
    public function removeLike($data)
    {
        $stmt = $this->con->prepare('DELETE FROM likes WHERE post_id = ? AND `user_id` = ? AND `status` = ?');
        $stmt->execute(array($data['post_id'],$data['user_id'],$data['status']));

    }

    public function countLikeAndDisLike($postId)
    {
        $stmt = $this->con->prepare('SELECT COUNT(*) as count_like_disLike FROM likes WHERE post_id = ?');
        $stmt->execute(array($postId));
        return $stmt->fetch();
    }
}
