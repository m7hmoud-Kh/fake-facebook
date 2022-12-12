<?php

session_start();

include_once '../models/Message.php';

if (isset($_GET['to_user_id']) && isset($_GET['message'])) {
    $data['to_user_id'] = $_GET['to_user_id'];
    $data['message'] = $_GET['message'];
    $data['from_user_id'] = $_SESSION['id'];
    //insert message
    $messageModel = new Message();
    $messageModel->insertMessage($data);
}
