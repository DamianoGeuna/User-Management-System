<?php

use geunadamiano\usm\entity\Interest;
use geunadamiano\usm\model\InteresseModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\InterestValidation;

require "./__autoload.php";
session_start();

$action = './add_interest_form.php';
$title = 'Aggiungi Interessi';
$submit = 'Aggiungi un nuovo interesse';
$model = new InteresseModel();

if($_SERVER['REQUEST_METHOD']==='GET'){
    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getDefault();
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $interest = new Interest($_POST['name']);
    $val = new InterestValidation($interest);
    $interestValidation = $val->getError('name');
    print_r($interestValidation);
    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getValidationClass($interestValidation);


    if ($val->getIsValid()) {

        $model->create($interest);
        
        header('location: ./list_interests.php');
    }

}


if($_SESSION['connected']==false){
    header('location: ./login_user.php');
}

include 'src/view/add_interest_view.php';


