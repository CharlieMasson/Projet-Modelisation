<?php
namespace Classes;

class Validation{

    public static function checkEmpty(string $data) : bool{
        if (empty($data)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function trimData(string $data): string{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function checkLength255(string $data): bool{
        if (strlen($data)>255){
            return true;
        }
        else{
            return false;
        }
    }

    public static function checkLength1000(string $data): bool{
        if (strlen($data)>1000){
            return true;
        }
        else{
            return false;
        }
    }

}
