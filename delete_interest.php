<?php

use geunadamiano\usm\model\UserModel;

require './__autoload.php';

//$_GET['user_id']; estrarrebbe solo il valore
$userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
//$user_id = filter_var($_GET['user_id'],FILTER_SANITIZE_NUMBER_INT); sinonimo di sopra.

//var_dump($user_id);
//echo "<h1>$user_id</h1>";
if($userId){
    $user = new UserModel();
    $deleteSuccess = $user->delete($userId);


    echo "prima del redirect devo cancellare ";

    header("location: ./list_users.php");


}else{
    $invaliUserId = false;
}
