<?php
use geunadamiano\usm\model\UserModel;
include "./__autoload.php";

$userModel = new UserModel();
$userModel->readAll();