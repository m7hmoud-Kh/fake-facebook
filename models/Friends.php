<?php

include_once(__DIR__.'./condb.php');

class Friends
{
    private $con;
    public $id;
    public $user_id;
    public $friend_id;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }

    public function getFriendsCount()
    {
        $stmt = $this->con->prepare('SELECT COUNT(*) as all_friends FROM friends WHERE `user_id` = ?');
        $stmt->execute(array($_SESSION['id']));
        return $stmt->fetch();
    }


    public function checkFriendOrNot($friendId)
    {
        $stmt = $this->con->prepare('SELECT * FROM friends WHERE `user_id` = ? AND friend_id = ?');
        $stmt->execute(array($_SESSION['id'],$friendId));
        return $stmt->rowCount();

    }


    function delete_friend($user_id){
        $stmt = $this->con->prepare('DELETE  FROM friends WHERE  friend_id = ? AND user_id=?');
        $stmt->execute(array($this->friend_id, $user_id));
        $stmt->execute(array($user_id, $this->friend_id ));
       
    }
     
   
}
