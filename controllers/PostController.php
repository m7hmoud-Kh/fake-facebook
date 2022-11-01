<?php

class PostController
{
    public function validatePost($data, $file)
    {
        $data['content'] = htmlentities($data['content']);

        if (empty($data['content']) && empty($file)) {
            $arrError[] = 'Must be write Content Or Upload Image In post';
        }


        if (!empty($file)) {
            $arrError =  $this->validateImage($file);
        }


        if (empty($arrError)) {
            return false;
        }
        return $arrError;
    }

    private function validateImage($fname)
    {

        $allowextion = array("png","jpg","jepg","gif");
        $extion      = explode(".", $fname);
        $extion      = end($extion);
        $extion      = strtolower($extion);

        if (!empty($fname) && !in_array($extion, $allowextion)) {
            $arrError['image'] = "this file <b>not allowed<b>";
                    return $arrError;

        }

    }

    public function uploadImage($fname, $ftemp)
    {
        $imageavatr = rand(0, 10000)."_".$fname;
        $path  =".\\assets\\images\\logos\\";
        move_uploaded_file($ftemp, $path.$imageavatr);
        return $imageavatr;
    }
}