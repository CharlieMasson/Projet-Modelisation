<?php
namespace App\Validators;
use App\Classes\Host;
use App\Validators\Validator;

class HostValidator extends Validator{

    private int $id;
    private string $code; 
    private string $name;
    private string $notes;

    public static function initializeArray(): array{
        $myArray = array(
            'codeError' => '',
            'nameError' => '',
            'notesError' => '',
        );
        return $myArray;
    }

    //retourne un array qui contient dans l'ordre: 0/1, erreur code, erreur name, erreur notes
    public static function validateHost(Host $myHost): array{
        
        $myArray = array(
            'isSuccess' => 0,
            'codeError' => '',
            'nameError' => '',
            'notesError' => '',
        );

        $isSuccess = true;

        if (Validator::checkEmpty($myHost->getCode())) {
            $myArray['codeError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength255($myHost->getCode())){
            $myArray['codeError'] = 'Ce champ ne peut pas contenir plus de 255 caractères.';
            $isSuccess = false;
        }

        if (Validator::checkEmpty($myHost->getName())) {
            $myArray['nameError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength255($myHost->getName())){
            $myArray['nameError']= 'Ce champ ne peut pas contenir plus de 255 caractères.';
            $isSuccess = false;
        }

        if (Validator::checkLength1000($myHost->getNotes())){
            $myArray['notesError'] = 'Ce champ ne peut pas contenir plus de 1000 caractères.';
            $isSuccess = false;
        }

        if ($isSuccess == false){
            $myArray['isSuccess'] = '1';
        }

        return $myArray;

    }
}