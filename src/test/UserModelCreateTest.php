<?php

require __DIR__."/../entity/User.php";
require __DIR__."/../model/UserModel.php";

$model = new UserModel();
$User= new User('Gianni','Rodari','mail@mail.com','1900-01-01');
$model->create($User);