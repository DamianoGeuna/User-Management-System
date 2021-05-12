<?php

use geunadamiano\usm\entity\User;
use geunadamiano\usm\model\UserModel;

require __DIR__."/../entity/User.php";
require __DIR__."/../model/UserModel.php";

$model = new UserModel();
$user= new User('Gianni','Rodari','mail@mail.com','1900-01-01','password');
$model->create($User);