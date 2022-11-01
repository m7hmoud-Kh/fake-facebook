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
            $data['content'],
            $data['image'],
            $_SESSION['id']
        ));

    }

}