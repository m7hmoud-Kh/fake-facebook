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

        $allowextion = array("png","jpg","jpeg","gif");
        $extion      = explode(".", $fname);
        $extion      = end($extion);
        $extion      = strtolower($extion);

        if (!empty($fname) && !in_array($extion, $allowextion)) {
            $arrError['image'] = "Must be upload photo";
                    return $arrError;

        }

    }

    public function uploadImage($fname, $ftemp)
    {
        $imageavatr = rand(0, 10000)."_".$fname;
        $path  =".\\assets\\images\\posts\\";
        move_uploaded_file($ftemp, $path.$imageavatr);
        return $imageavatr;
    }

    public function timeElapsedString($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';

    }

    public function fullName($fname, $lname)
    {
        return ucfirst($fname) . ' ' . ucfirst($lname);
    }

    public function removeImage($image)
    {
        unlink("./assets/images/posts/$image");
    }


}