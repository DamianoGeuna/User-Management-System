<?php
require './__autoload.php';
use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\service\UserSession;

(new UserSession())->redirect();
$model = new UserModel();

include './src/view/list_users_view.php';

?>