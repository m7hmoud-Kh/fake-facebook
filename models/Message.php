<?php

include_once(__DIR__.'./condb.php');

class Message
{
    private $con;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }

    public function insertMessage($data)
    {
        $stmt = $this->con->prepare('INSERT INTO messages
        (`from_user_id`,to_user_id,`message`) VALUES (?,?,?)');
        $stmt->execute(array($data['from_user_id'],$data['to_user_id'],$data['message']));
    }

    public function getAllMessageBetweenMeAndMyFriend($friendId)
    {
        $stmt = $this->con->prepare('SELECT * FROM messages WHERE from_user_id in (?,?) AND to_user_id in(?,?);');
        $stmt->execute(array($_SESSION['id'],$friendId,$_SESSION['id'],$friendId));
        return $stmt->fetchAll();
    }

    public function messageNotification()
    {
        $stmt = $this->con->prepare('SELECT messages.id,messages.from_user_id,messages.message,messages.created,users.fname,users.lname,users.profile_image FROM `messages` JOIN users ON users.id = messages.from_user_id WHERE to_user_id = ? ORDER BY id DESC; ');
        $stmt->execute(array($_SESSION['id']));
        return $stmt->fetchAll();
    }
}
