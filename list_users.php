<?php

error_reporting(E_ALL);

use geunadamiano\usm\model\UserModel;

require './__autoload.php';

try {
    $userModel = new UserModel();
    // ci sarà logica controller per ottenere elenco utenti
    $users = $userModel->readall();

} catch (\Throwable $th) {
    //throw $th;
    echo $th->getMessage();
}



include './src/view/list_users_view.php';

?>