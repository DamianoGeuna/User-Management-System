<?php

use geunadamiano\usm\entity\Interest;
use geunadamiano\usm\model\InteresseModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\InterestValidation;

require "./__autoload.php";
session_start();

$action = './edit_interest.php';
$title = 'Cambio Interessi';
$submit = 'Salva modifiche';
$model = new InteresseModel();


if($_SERVER['REQUEST_METHOD']==='GET'){
    $interestId = filter_input(INPUT_GET,'interestId',FILTER_SANITIZE_NUMBER_INT);
    $interest = $model->readOne($interestId);
    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getDefault($interest->getName());


}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $interestId = filter_input(INPUT_POST,'interestId',FILTER_SANITIZE_NUMBER_INT);
    $interest = new Interest($_POST['name']);
    $interest->setInterestId($interestId);

    $val = new InterestValidation($interest);

    $interestValidation = $val->getError('name');

    list($name,$nameClass,$nameClassMessage,$nameMessage) = ValidationFormHelper::getValidationClass($interestValidation);


    if ($val->getIsValid()) {
        // TODO
        $model->update($interest);
        header('location: ./list_interests.php');
    }

}


if($_SESSION['connected']==false){
    header('location: ./login_user.php');
}    

include 'src/view/add_interest_view.php';

?>