<?php
require './__autoload.php';

use geunadamiano\usm\model\InteresseModel;
use geunadamiano\usm\model\UserModel;

session_start();

$model = new UserModel();
$intModel = new InteresseModel();
$title = 'Elenco Utenti';

if($_SESSION['connected']==false){
    header('location: ./login_user.php');
}

include './src/view/list_users_view.php';

?>