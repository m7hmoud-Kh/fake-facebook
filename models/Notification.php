<?php

include_once(__DIR__.'./condb.php');

class Notification
{
    private $con;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }


    public function addNotification($data)
    {
        $stmt = $this->con->prepare('INSERT INTO notifications
        (`to_user_id`,`from_user_id`,`message`,`url`,post_id)
        VALUES (?,?,?,?,?) ');
        $stmt->execute(array($data['to_user_id'],$data['from_user_id'],$data['message'],$data['url'],$data['post_id']));
        return $this->con->lastInsertId();
    }

    public function getUnreadNotificationByUserId()
    {
        $stmt = $this->con->prepare('SELECT notifications.*,users.fname,users.lname,users.profile_image FROM notifications JOIN users ON notifications.from_user_id = users.id WHERE to_user_id = ? AND seen = ? ORDER BY id DESC LIMIT 5 ');
        $stmt->execute(array($_SESSION['id'], false));
        $data = $stmt->fetchAll();
        $count = $stmt->rowCount();
        return [$count, $data];
    }

    public function seenNotification($postId)
    {
        $stmt = $this->con->prepare('UPDATE notifications
        SET seen = ?
        WHERE to_user_id = ? AND post_id = ? AND seen = ?');
        $stmt->execute(array(true, $_SESSION['id'], $postId, false));
    }

    public function getAllNotificationByUserId()
    {
        $stmt = $this->con->prepare('SELECT * FROM notifications
        JOIN users ON notifications.from_user_id = users.id
        WHERE to_user_id = ?');
        $stmt->execute(array($_SESSION['id']));
        return $stmt->fetchAll();
    }
}
