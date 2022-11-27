<?php


include_once(__DIR__.'./condb.php');


class User
{
    private $con;
    public $id;

    public $prof_image;
    public $cuv_image;

    public $fname;
    public $lname;
    public $email;
    public $bio;

    public $password;





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

    public function Updateimage(){
        

        $stmt=$this->con->prepare("UPDATE users 
        SET 
            profile_image=?
           
        WHERE
             id =?");
             // profile_background=?					  
            //,$this->cuv_image
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

       $_SESSION['fname']= $this->fname;
       $_SESSION['lname']=$this->lname;
       $_SESSION['email'] =$this->email;
       $_SESSION['bio']= $this->bio;
    }

    public function Updatepassword(){
        

        $stmt=$this->con->prepare("UPDATE users 
        SET 
        pass=?
        WHERE
             id =?");					  
            
        $stmt->execute(array(password_hash ($this->password, PASSWORD_DEFAULT) ,$this->id));
        //$_SESSION['pass']= password_hash ($this->password, PASSWORD_DEFAULT);
    }

    public function Updatepassword_at_session(){
        $stmt = $this->con->prepare('SELECT pass FROM Users WHERE id = ?');
        $stmt->execute(array($this->id));
        $new_pass= $stmt->fetch();
        
        $_SESSION['pass']=$new_pass;
    }
    

//$2y$10$jF0QJVqnTXTIRpnZoCkEZOJhyhvEHP74crEpnm8ilREvBDMUVWRBq 20205050
//$2y$10$jF0QJVqnTXTIRpnZoCkEZOJhyhvEHP74crEpnm8ilREvBDMUVWRBq 20205050

//$2y$10$SlyjZ8fQcC4q5rzKeSiX4O/J3A5lSbpr1XvHLdKh44IvnQ0yAfXHu 12345678
//$2y$10$jF0QJVqnTXTIRpnZoCkEZOJhyhvEHP74crEpnm8ilREvBDMUVWRBq

//$2y$10$VI75whJ3E8hUikmgpl9LvuNgIedGpVD1h9osrhwf0QfmaQItIR9Ri 20205050

}