<?php

//geunadamiano\usm\entity\User;
// src/entity/User.php;

//Alcuni step da fare
//1.geunadamiano\usm --> sostituisco con src
//2. \(backslash)--> DIRECT_SEPARATOR (\,/)

//geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
//src/validator/boostrap/ValidationformHelper.php

use geunadamiano\usm\entity\User;

spl_autoload_register(function($classname){
    
    $classPath= str_replace("geunadamiano\usm",__DIR__."\src",$classname);
    $classPath = str_replace("\\", DIRECTORY_SEPARATOR, $classPath).".php";

    //echo $classPath;
    require $classPath;
});

//$u = new User('a','b','c','d');
//print_r($u);