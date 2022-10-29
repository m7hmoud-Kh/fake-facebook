<?php
include_once './models/User.php';
class Cookies
{
    public function __construct(User $user)
    {
            $user =  $user->CheckEmailForLogin($_COOKIE['email']);
            foreach ($user as $key => $value) {
                $_SESSION[$key] = $value;
            }
            header('location: index.php');
    }


}