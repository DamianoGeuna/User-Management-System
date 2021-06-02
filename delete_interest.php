<?php

use geunadamiano\usm\model\InteresseModel;

require './__autoload.php';
session_start();


$interestId = filter_input(INPUT_GET,'insterestId',FILTER_SANITIZE_NUMBER_INT);

if($_SESSION['connected']==false){
    header('location: ./login_user.php');
}


if($interestId){
    $interest = new InteresseModel();
    
    $deleteSuccess = $interest->delete($interestId);


    header("location: ./list_interests.php");


}else{
    $invalidInterestId = false;
}

