<?php


include_once(__DIR__.'./condb.php');

class Post
{
    private $con;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }

    public function create($data)
    {
        $stmt = $this->con->prepare('INSERT INTO posts (content,`image`,`user_id`)
        Values (?,?,?)');
        $stmt->execute(array(
            $data['content'] ?? null,
            $data['image'] ?? null,
            $_SESSION['id']
        ));
    }

    public function myPosts($userId)
    {
        $stmt = $this->con->prepare('SELECT posts.id as post_id , posts.* FROM posts where `user_id` = ? Order By id desc');
        $stmt->execute(array($userId));
        return $stmt->fetchAll();
    }

    public function deletePost($postId)
    {
        $stmt = $this->con->prepare('DELETE FROM posts WHERE id = ?');
        $stmt->execute(array($postId));
    }

    public function getPostById($postId)
    {
        $stmt = $this->con->prepare('SELECT * FROM posts where id = ?');
        $stmt->execute(array($postId));
        return $stmt->fetch();
    }

    public function allPosts()
    {
        $stmt = $this->con->prepare('SELECT  posts.id as post_id, posts.*, users.id as `user_id` ,users.*
        FROM posts JOIN users on posts.user_id = users.id ORDER BY posts.id DESC');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllInfoPostById($postId)
    {
        $stmt = $this->con->prepare('SELECT posts.id as `post_id`, posts.*, users.id as `user_id` ,users.* FROM posts JOIN users on posts.user_id = users.id WHERE posts.id = ?');
        $stmt->execute(array($postId));
        return $stmt->fetch();
    }
}