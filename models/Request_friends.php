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

    public function delete_request()
    {
        $stmt = $this->con->prepare('DELETE  FROM Request_friends WHERE id = ?');
        $stmt->execute(array($this->id));
    }
}
