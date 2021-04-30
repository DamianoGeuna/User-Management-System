<?php

use geunadamiano\usm\entity\User;
use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\UserValidation;

require "./__autoload.php"; //spiega a php come prendere le classi
//require __DIR__."/vendor/testTools/testTool.php";

/* require __DIR__."/src/entity/User.php";
require __DIR__."/src/validator/UserValidation.php";
require __DIR__."/src/validator/ValidationResult.php";
require __DIR__."/src/validator/bootstrap/ValidationFormHelper.php"; */

// print_r($_POST);
if($_SERVER['REQUEST_METHOD']==='GET'){
    
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage)=ValidationFormHelper::getDefault();
    list($lastName,$lastNameClass,$lastClassMessage,$lastNameMessage)=ValidationFormHelper::getDefault();
    list($email,$emailClass,$emailClassMessage,$emailMessage)=ValidationFormHelper::getDefault();
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage)=ValidationFormHelper::getDefault();

}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $user = new User($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['birthday']);
    $val = new UserValidation($user);

    $firstNameValidation = $val->getError('firstName');
    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage)=ValidationFormHelper::getValidationClass($firstNameValidation);

    $lastNameValidation = $val->getError('lastName');
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage)=ValidationFormHelper::getValidationClass($lastNameValidation);

    $emailValidation = $val->getError('email');
    list($email, $emailClass, $emailClassMessage, $emailMessage)=ValidationFormHelper::getValidationClass($emailValidation);

    $birthdayValidation = $val->getError('birthday');
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage)=ValidationFormHelper::getValidationClass($firstNameValidation);

    if($val->getIsValid()){

        //echo "Salva utente";
        $userModel=new UserModel();
        $userModel->create($user);
        header('location: ./list_users.php');//header-->redirect
    }

    //$firstName = $user->getFirstName();
    //$firstNameClass = $firstNameValidation->getIsValid() ? 'is-valid' : 'is-invalid';
    //$firstNameClassMessage = $firstNameValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
    //$firstNameMessage = $firstNameValidation->getMessage();

}

include './src/view/add_user_view.php';

?>