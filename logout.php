<?php
session_start();
if (!empty($_SESSION)) {
    session_unset();
    session_destroy();
    setcookie('email', '', time()-3600, '/');
    header('location: login.php');
}