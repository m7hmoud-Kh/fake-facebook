<?php


class DbConnection
{
        static private $servername = 'localhost';
        static private $username = 'root';
        static private $password = '';
        static private $dbname = 'fake_facebook';

        static function connect() {
            try {
            $con = new PDO("mysql:host=".self::$servername.";dbname=".self::$dbname, self::$username, self::$password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }
}