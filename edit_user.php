<?php

use geunadamiano\usm\entity\User;
use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\UserValidation;

//$action = "edit_user.php?user_id=";non cambio indirizzo controller
//oppure input type hidden, si usa in fase di modifica; passarlo come testo

require './__autoload.php';

$user_id = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);

$userModel = new UserModel();

//$user = $userModel-->readOne();


if($_SERVER['REQUEST_METHOD']==='GET'){
    

    $user_id = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    $userModel = new UserModel();
    $user = $userModel->readOne($user_id);

    $firstName = $User->getFirstName();
    $lastName = $User->getLastName();
    $email= $User->getEmail();


}

//ho fatto copia e incolla, user etc sono saltati.
if($_SERVER['REQUEST_METHOD']==='POST'){
    //passare ID in qualche modo
    //hidden field input type hidden
    $user = new User($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['birthday']);
    $val = new UserValidation($user);

    $firstNameValidation = $val->getError('firstName');
    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage)=ValidationFormHelper::getValidationClass($firstNameValidation);

    $lastNameValidation = $val->getError('lastName');
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage)=ValidationFormHelper::getValidationClass($lastNameValidation);

    $emailValidation = $val->getError('email');
    list($email, $emailClass, $emailClassMessage, $emailMessage)=ValidationFormHelper::getValidationClass($emailValidation);

    $birthdayValidation = $val->getError('birthday');
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage)=ValidationFormHelper::getValidationClass($birthdayValidation);

    if($val->getIsValid()){

        //echo "Salva utente";
        $userModel=new UserModel();
        $userModel->create($user);
        header('location: ./list_users.php');//header-->redirect
    }

}