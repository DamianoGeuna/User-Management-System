<?php

use geunadamiano\usm\entity\User;
use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\model\InteresseModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\UserValidation;
use geunadamiano\usm\service\UserSession;

require "./__autoload.php"; //spiega a php come prendere le classi
//require __DIR__."/vendor/testTools/testTool.php";

/* require __DIR__."/src/entity/User.php";
require __DIR__."/src/validator/UserValidation.php";
require __DIR__."/src/validator/ValidationResult.php";
require __DIR__."/src/validator/bootstrap/ValidationFormHelper.php"; */
/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './add_user_form.php';
$type = '';
$title = 'ADD USER';
$submit = 'aggiungi nuovo utente';
$userModel = new UserModel();
$interestModel = new InteresseModel();

(new UserSession())->redirect();
if($_SERVER['REQUEST_METHOD']==='GET'){
    
    /** Il form viene compilato "vuoto" */
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault();
    list($lastName,$lastNameClass,$lastNameClassMessage,$lastNameMessage) = ValidationFormHelper::getDefault();
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault();
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();
}

if ($_SERVER['REQUEST_METHOD']==='POST') {

    $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday'],$_POST['password']);
    $val = new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');
    $emailValidation = $val->getError('email');
    $birthdayValidation = $val->getError('birthday');
    $passwordValidation = $val->getError('password');

    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);
    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage) = ValidationFormHelper::getValidationClass($birthdayValidation);
    list($password, $passwordClass, $passwordClassMessage, $passwordMessage) = ValidationFormHelper::getValidationClass($passwordValidation);
        
    $user->setBirthday($birthday);

    if ($val->getIsValid()) {
        // TODO
        $userModel = new UserModel();
        $userModel->create($user);
        header('location: ./list_users.php');
    }
}

include 'src/view/add_user_view.php';
?>
