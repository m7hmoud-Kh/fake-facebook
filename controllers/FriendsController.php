<?php
// include_once(__DIR__.'./condb.php');
include_once './models/Friends.php';
class FriendsController
{
 static function add_friend($request_user,$send_user){
        $stmt = $this->con->prepare('INSERT  INTO friends WHERE `user_id` = ? AND friend_id = ?');
        $stmt->execute(array($request_user,$send_user));

    }

    // public function create($data)
    // {
    //     $stmt = $this->con->prepare('INSERT INTO users (fname,lname,email,pass,date_brith,gender)
    //     Values (?,?,?,?,?,?)');
    //     $stmt->execute(array(
    //         $data['fname'],
    //         $data['lname'],
    //         $data['email'],
    //         $data['pass'],
    //         $data['date_brith'],
    //         $data['gender']
    //     ));

    //     return $stmt->rowCount();
    // }
}