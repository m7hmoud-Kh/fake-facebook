<?php


include_once(__DIR__.'./condb.php');

class User
{
    private $con;

    public function __construct()
    {
        $this->con = DbConnection::connect();

    }

    public function checkFoundEmail($email)
    {
        $stmt = $this->con->prepare('SELECT email FROM users WHERE email = ?');
        $stmt->execute(array($email));
        return $stmt->rowCount();
    }


    public function create($data)
    {
        $stmt = $this->con->prepare('INSERT INTO users (fname,lname,email,pass,date_brith,gender)
        Values (?,?,?,?,?,?)');
        $stmt->execute(array(
            $data['fname'],
            $data['lname'],
            $data['email'],
            $data['pass'],
            $data['date_brith'],
            $data['gender']
        ));

        return $stmt->rowCount();
    }


    public function CheckEmailForLogin($email) {
        $stmt = $this->con->prepare('SELECT * FROM Users WHERE email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }



}
