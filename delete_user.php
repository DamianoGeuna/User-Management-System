<?php

use geunadamiano\usm\model\UserModel;

require './__autoload.php';

//$_GET['user_id']; estrarrebbe solo il valore
$user_id = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
//$user_id = filter_var($_GET['user_id'],FILTER_SANITIZE_NUMBER_INT); sinonimo di sopra.

//var_dump($user_id);
//echo "<h1>$user_id</h1>";
$userModel = new UserModel();
if ($userModel->delete($user_id)=== true){
    echo "utente cancellato";
}else{
    echo "utente non esiste o già cancellato";
};

header("location: list_users.php");