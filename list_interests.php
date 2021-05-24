<?php

use geunadamiano\usm\model\InteresseModel;

require "./__autoload.php";
session_start();

$model = new InteresseModel();
$title = 'Lista Interessi';


if($_SESSION['connected']==false){
    header('location: ./login_user.php');
}  

    include './src/view/list_interests_view.php';

?>