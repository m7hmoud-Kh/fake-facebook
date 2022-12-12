<?php


include_once(__DIR__ . './condb.php');


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


    public function CheckEmailForLogin($email)
    {
        $stmt = $this->con->prepare('SELECT * FROM Users WHERE email = ?');
        $stmt->execute(array($email));
        return $stmt->fetch();
    }

    public function Updateimage()
    {


        $stmt = $this->con->prepare("UPDATE users
        SET
            profile_image=?

        WHERE
             id =?");
        // profile_background=?
        //,$this->cuv_image
        $stmt->execute(array($this->prof_image, $this->id));
        // $_SESSION['profile_image']=$this->prof_image;
    }

    public function Update_cuver_image()
    {


        $stmt = $this->con->prepare("UPDATE users
        SET
        profile_background=?

        WHERE
             id =?");


        $stmt->execute(array($this->cuv_image, $this->id));
    }


    public function Updatedata()
    {


        $stmt = $this->con->prepare("UPDATE users
        SET
           fname=?,
           lname=?,
           email=?,
           bio=?
        WHERE
             id =?");

        $stmt->execute(array($this->fname, $this->lname, $this->email, $this->bio, $this->id));

        $_SESSION['fname'] = $this->fname;
        $_SESSION['lname'] = $this->lname;
        $_SESSION['email'] = $this->email;
        $_SESSION['bio'] = $this->bio;
    }

    public function Updatepassword()
    {

        $stmt = $this->con->prepare("UPDATE users
        SET
        pass=?
        WHERE
             id =?");

        $stmt->execute(array(password_hash($this->password, PASSWORD_DEFAULT), $this->id));
    }

    public function Updatepassword_at_session()
    {
        $stmt = $this->con->prepare('SELECT pass FROM Users WHERE id = ?');
        $stmt->execute(array($this->id));
        $new_pass = $stmt->fetch();
        $_SESSION['pass'] = $new_pass['pass'];
    }

    public function deleteAcount()
    {
        $stmt = $this->con->prepare('DELETE  FROM Users WHERE id = ?');
        $stmt->execute(array($this->id));
    }

    public function getUserById($userId)
    {
        $stmt = $this->con->prepare('SELECT * FROM Users WHERE id = ?');
        $stmt->execute(array($userId));
        return $stmt->fetch();
    }


    public function fetch_all_reuestfrinds(){
        $stmt = $this->con->prepare('SELECT * FROM Request_friends WHERE user_receive_request = ?');
        $stmt->execute(array($this->id));
        return $stmt->fetchALL();
    }

    public function fetch_image(){
        $stmt = $this->con->prepare('SELECT profile_image FROM Users WHERE id = ?');
        $stmt->execute(array($this->id));
        $image= $stmt->fetch();
        $image_name= $image['profile_image'];
        return  $image_name;

    }

    public function fetch_name(){
        $stmt = $this->con->prepare('SELECT fname,lname FROM Users WHERE id = ?');
        $stmt->execute(array($this->id));
        $name= $stmt->fetch();
        $user_name= $name['fname'].$name['lname'];
        return  $user_name;

    }

    public function fetch_all_frinds(){
        $stmt = $this->con->prepare('SELECT * FROM friends WHERE user_id = ?');
        $stmt->execute(array($this->id));
        return $stmt->fetchALL();
    }

    public function delete_request($user_send_request){
        $stmt = $this->con->prepare('DELETE  FROM Request_friends WHERE user_send_request = ? AND user_receive_request = ?');
        $stmt->execute(array($user_send_request,$this->id));
    }

    public function add_friend($request_user,$send_user){
            $stmt = $this->con->prepare('INSERT INTO friends (user_id,friend_id)
            Values (?,?)');
            $stmt->execute(array($request_user,$send_user));
            $stmt->execute(array($send_user,$request_user));
            
    }

   
    // public function fetch_all_users_not_friend ($array){
    //     $stmt = $this->con->prepare("SELECT * FROM Users WHERE id NOT IN (?,?)");
    //     $stmt->execute($array);
    //     return $stmt->fetchALL();

    // }

    public function fetch_all_users (){
        $stmt = $this->con->prepare("SELECT * FROM Users ");
        $stmt->execute();
        return $stmt->fetchALL();

    }

    public function fetch_all_blocked_users (){
        $stmt = $this->con->prepare("SELECT user_send_request FROM Request_friends WHERE user_receive_request =? AND status=?");
        $stmt->execute(array($this->id,2));
        return $stmt->fetchALL();

    }

    public function add_request_friend($recived_user){
        $stmt = $this->con->prepare('INSERT INTO Request_friends (user_send_request,user_receive_request)
        Values (?,?)');
        $stmt->execute(array($this->id,$recived_user));

    }

   




}
