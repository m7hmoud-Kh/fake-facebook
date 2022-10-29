<?php

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

}