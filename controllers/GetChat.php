<?php

session_start();

include_once '../models/Message.php';

if (isset($_GET['to_user_id']) && is_numeric($_GET['to_user_id'])) {

    $friendId = $_GET['to_user_id'];
    //get all data
    $messageModel = new Message();
    $allMessage = $messageModel->getAllMessageBetweenMeAndMyFriend($friendId);

    $output = '';
    foreach ($allMessage as $message) {
        if ($message['from_user_id'] == $_SESSION['id']) {
            $output .= "<div class='message-box me'>
            <p>$message[message]</p>
            <br />
            <span class='message-time text-muted' dir='ltr'>$message[created]</span>
            </div>";
        }else{
            $output .="<div class='message-box him'>
            <p>$message[message]</p>
            <br />
            <span class='message-time text-muted' dir='ltr'>$message[created]</span>
            </div>";
        }
    }

    echo $output;
}