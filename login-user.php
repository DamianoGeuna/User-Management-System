<?php

use geunadamiano\usm\entity\User;
use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\UserValidation;

require "./__autoload.php";

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './login_user.php';
$submit = 'login';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    /** Il form viene compilato "vuoto" */
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();       
}


include 'src/view/login_user_view.php';
?>