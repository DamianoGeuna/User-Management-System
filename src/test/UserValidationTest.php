<?php

require __DIR__."/../../vendor/TaskList/testTool.php";
require __DIR__."/../entity/User.php";
require __DIR__."/../validator/UserValidation.php";
require __DIR__."/../validator/ValidationResult.php";

$user = new User('Mario','Draghi','mg@prez.gov','2000-01-01');


$val = new UserValidation($user);
//$val->validate();

$firstNameValidation = $val->getError('firstName');

assertEquals(true, $firstNameValidation->getIsValid());
assertEquals(UserValidation::FIRST_NAME_ERROR_NONE_MSG, $firstNameValidation->getMessage());

//------------------------------- Spazio Vuoto Come Nome ------------------------------------------------

$user = new User('','Draghi','mg@prez.gov','2000-01-01');
$val = new UserValidation($user);
$firstNameValidation = $val->getError('firstName');
assertEquals(false, $firstNameValidation->getIsValid());
assertEquals(UserValidation::FIRST_NAME_ERROR_REQUIRED_MSG, $firstNameValidation->getMessage());

//-------------------------------- Tanti Spazi Vuoti -------------------------------------------------

$user = new User('        ','Draghi','mg@prez.gov','2000-01-01');
$val = new UserValidation($user);
$firstNameValidation = $val->getError('firstName');
assertEquals(false, $firstNameValidation->getIsValid());
assertEquals(UserValidation::FIRST_NAME_ERROR_REQUIRED_MSG, $firstNameValidation->getMessage());

//-------------------------------- Null -------------------------------------------------

$user = new User(null,'Draghi','mg@prez.gov','2000-01-01');
$val = new UserValidation($user);
$firstNameValidation = $val->getError('firstName');
assertEquals(false, $firstNameValidation->getIsValid());
assertEquals(UserValidation::FIRST_NAME_ERROR_REQUIRED_MSG, $firstNameValidation->getMessage());