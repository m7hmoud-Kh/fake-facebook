<?php

include_once(__DIR__ . './condb.php');

class Request_friends
{
    private $con;
    public $id;
    public $status;
    public $send_user;  // come from data base
    public $recuest_user; //come from session this is the Auth user

    public function __construct()
    {
        $this->con = DbConnection::connect();
    }

    public function fetch_send_user()
    {
        $stmt = $this->con->prepare('SELECT * FROM Users WHERE id = ?');
        $stmt->execute(array($this->send_user));
        return $stmt->fetch();
    }

    public function update_ststus($status)
    {
        $stmt = $this->con->prepare("UPDATE Request_friends
    SET
    status=?

    WHERE
    user_send_request =?
    AND
    user_receive_request=?

    ");


        $stmt->execute(array($status, $this->send_user, $this->recuest_user));
    }

    public function deleteRequest($user_receive_request)
    {
        $stmt = $this->con->prepare('DELETE FROM Request_friends WHERE user_receive_request = ? AND user_send_request = ?');
        $stmt->execute(array($_SESSION['id'],$user_receive_request));
    }

    public function getPeopleMayBeKnow()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE id NOT IN (select friends.friend_id FROM friends WHERE friends.user_id = ?) AND id NOT IN (SELECT request_friends.user_receive_request FROM request_friends WHERE request_friends.user_send_request = ?) AND id != ?;");
        $stmt->execute(array($_SESSION['id'],$_SESSION['id'],$_SESSION['id']));
        return $stmt->fetchAll();
    }

    public function getAllRequest()
    {
        $stmt = $this->con->prepare('SELECT * FROM `request_friends`
        JOIN users ON users.id = request_friends.user_send_request  WHERE request_friends.user_receive_request  = ? AND request_friends.status = 1');
        $stmt->execute(array($_SESSION['id']));
        return $stmt->fetchAll();
    }
}
