<?php
namespace App\Validators;

use App\Classes\Project;
use App\Validators\Validator;

class ProjectValidator extends Validator{

    public static function initializeArray(): array{
        $myArray = array(
            'nameError' => '',
            'codeError' => '',
            'lastPassFolderError' => '',
            'linkMockUpsError' => '',
            'managedServerError' => '',
            'notesError' => '',
            'hostIdError' => '',
            'customerIdError' => '',
        );
        return $myArray;
    }

    //retourne un array qui contient dans l'ordre: 0/1, erreur code, erreur name, erreur notes
    public static function validateProject(Project $myProject): array{

        $myArray = array(
            'isSuccess' => 0,
            'nameError' => '',
            'codeError' => '',
            'lastPassFolderError' => '',
            'linkMockUpsError' => '',
            'managedServerError' => '',
            'notesError' => '',
            'hostIdError' => '',
            'customerIdError' => '',

        );

        $isSuccess = true;

        if (Validator::checkEmpty($myProject->getName())) {
            $myArray['nameError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength255($myProject->getName())){
            $myArray['nameError'] = 'Ce champ ne peut pas contenir plus de 255 caractères.';
            $isSuccess = false;
        }

        if (Validator::checkEmpty($myProject->getCode())) {
            $myArray['codeError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength255($myProject->getCode())){
            $myArray['codeError']= 'Ce champ ne peut pas contenir plus de 255 caractères.';
            $isSuccess = false;
        }
        if (Validator::checkEmpty($myProject->getLastPassFolder())) {
            $myArray['lastPassFolderError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength255($myProject->getLastPassFolder())){
            $myArray['lastPassFolderError']= 'Ce champ ne peut pas contenir plus de 255 caractères.';
            $isSuccess = false;
        }
        if (Validator::checkEmpty($myProject->getLinkMockUps())) {
            $myArray['linkMockUpsError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength255($myProject->getLinkMockUps())){
            $myArray['linkMockUpsError']= 'Ce champ ne peut pas contenir plus de 255 caractères.';
            $isSuccess = false;
        }
        if (Validator::checkEmpty($myProject->getManagedServer())) {
            $myArray['managedServerError'] = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        else if (Validator::checkLength1($myProject->getManagedServer())){
            $myArray['managedServerError']= 'Ce champ ne peut pas contenir plus de 1 caractères.';
            $isSuccess = false;
        }

        if (Validator::checkLength1000($myProject->getNotes())){
            $myArray['notesError'] = 'Ce champ ne peut pas contenir plus de 1000 caractères.';
            $isSuccess = false;
        }

        if ($isSuccess == false){
            $myArray['isSuccess'] = '1';
        }

        return $myArray;

    }
}