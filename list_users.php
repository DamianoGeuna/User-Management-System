<?php
use geunadamiano\usm\model\UserModel;

require './__autoload.php';

$model = new UserModel();


include './src/view/list_users_view.php';

?>