<?php

use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;


require "./__autoload.php";

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './login_user.php';
$submit = 'login';

if($_SERVER['REQUEST_METHOD']==='GET'){
    
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault();
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault();
    $loginMessage='';    
}


if ($_SERVER['REQUEST_METHOD']==='POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $userModel = new UserModel();
    $isValid = $userModel->login($email, $password);

    if ($isValid) {
        
        header('location: ./list_users.php');

    }else{
        $loginClass = "is-invalid";
        $loginClassMessage="invalid-feedback";
        $loginMessage = "Email o Password sbagliata.";
    }
    
}


include 'src/view/login_user_view.php';
?>