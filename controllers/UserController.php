<?php
 include_once './models/User.php';
class UserController
{

    public function validateRegister($data)
    {

        if (empty($data['fname'])) {
            $arr_error['fname'] = 'First Name must be Required';
        }
        if (empty($data['lname'])) {
            $arr_error['lname'] = 'Last Name Must be Required';
        }

        if (empty($data['email'])) {
            $arr_error['email'] = 'Email must be Required';
        }

        if (empty($data['pass'])) {
            $arr_error['pass'] = 'password Must be Not Empty';
        }


        if (!empty($data['pass']) && ($data['pass'] != $data['re_pass'])) {

            $arr_error['pass'] = 'password doesn\'t matches';

        }

        if (!isset($data['gender'])) {
            $arr_error['gender'] = 'Gender Must be Required';
        }

        if (empty($data['date_brith'])) {
            $arr_error['date_brith'] = 'BrithDate Must be Required';
        }


        // if (empty($data['social_status'])) {
        //     $arr_error['social_status'] = 'social status Must be Not Empty';
        // }

        if (empty($arr_error)) {
            return false;
        }
        return $arr_error;

    }


    public function validateLogin($data)
    {
        if (empty($data['email'])) {
            $arrErorr['email'] = 'Email must be Required';
        }

        if (empty($data['pass'])) {
            $arrErorr['pass'] = 'password Must be Not Empty';
        }

        if (empty($arrErorr)) {
            return false;
        }
        return $arrErorr;
    }

    static function validateImage($fname)
    {

        $allowextion = array("png","jpg","jepg","gif");
        $extion      = explode(".", $fname);
        $extion      = end($extion);
        $extion      = strtolower($extion);

        if (!empty($fname) && !in_array($extion, $allowextion)) {
            $arrError['image'] = "Must be upload photo";
                    return $arrError;

        }

    }
    

    static function uploadImage($fname, $ftemp)
    {
        $imageavatr = rand(0, 10000)."_".$fname;
        $path  =".\\assets\\images\\users\\";
        move_uploaded_file($ftemp, $path.$imageavatr);
        return $imageavatr;
    }

    static function removeImage($image)
    {
        unlink("./assets/images/users/$image");
    }

    static function validatesetting($data){
        
        if (empty($data['cur_password'])) {
            $setting_errors['cur_password'] = 'current password Must be Not Empty';
        }

        if (!empty($data['cur_password']) && !(password_verify($data['cur_password'],$_SESSION['pass']))){
            $setting_errors['cur_password_value'] = 'current password Must be correct';
        }

        if (empty($data['password'])) {
            $setting_errors['password'] = 'password Must be Not Empty';
        }

        if (empty($data['repassword'])) {
            $setting_errors['repassword'] = 'repassword Must be Not Empty';
        }

        if (!empty($data['password']) && !empty($data['repassword'])  && ($data['password'] != $data['repassword'])) {

            $setting_errors['pass'] = 'password doesn\'t matches';

        }


        if (empty($setting_errors)) {
            return false;
        }
        return $setting_errors;

    }




}