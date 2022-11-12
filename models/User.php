<?php
//session_start();

include_once(__DIR__.'./condb.php');
//include_once './controllers/Cookies.php';

class User
{
    private $con;
    public $id;

    public $prof_image;
    public $cuv_image;

    public $fname;
    public $lanme;
    public $email;
    public $bio;

    public $pass;





    public function __construct()
    {
        $this->con = DbConnection::connect();
        $this->id=$_SESSION['id'];

        $this->prof_image=$_SESSION['profile_image'];
        $this->cuv_image=$_SESSION['profile_background'];

        $this->fname=$_SESSION['fname'];
        $this->lanme=$_SESSION['lname'];
        $this->email=$_SESSION['email'];
        $this->bio=$_SESSION['bio'];

        $this->password=$_SESSION['pass'];
        
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


    public function UpdateUser(){
        
        $stmt=$this->con->prepare("UPDATE users 
        SET 
            profile_image=?,
            profile_background=?,
            fname =?, 
            lname =?, 
            email=?,
            pass=?
           
            

        WHERE
             id =?");					  
            
        $stmt->execute(array($this->prof_image,$this->cuv_image,$this->fname,$this->email,$this->pass,$this->id));
    }

    public function Updateimage(){
        

        $stmt=$this->con->prepare("UPDATE users 
        SET 
            profile_image=?
        WHERE
             id =?");					  
            
        $stmt->execute(array($this->prof_image,$this->id));
    }
    public function Updatedata(){
        

        $stmt=$this->con->prepare("UPDATE users 
        SET 
           fname=?,
           lname=?,
           email=?,
           bio=?
        WHERE
             id =?");					  
            
        $stmt->execute(array($this->fname,$this->lname,$this->email,$this->bio,$this->id));
    }



}
