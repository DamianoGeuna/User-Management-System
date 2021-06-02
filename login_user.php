<?php

use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\service\UserSession;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;


require "./__autoload.php";
session_start();

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$title='Login';
$action = './login_user.php';
$submit = 'Login';

$_SESSION['connected'] = false;

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
        
        $_SESSION['connected'] = true;

        header('location: ./list_users.php');

    }else{
        $loginClass = "is-invalid";
        $loginClassMessage="invalid-feedback";
        $loginMessage = "Email o Password errata.";
    }
    
}


include 'src/view/login_user_view.php';
?>