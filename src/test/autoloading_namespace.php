<?php

use geunadamiano\usm\entity\User;

//posso cambiare il nome per evitare conflitti con stesso nome

spl_autoload_register(function($className){
    echo "Sto cercando la classe $className\n\n";//prima di dare errore, ha cercato, infatti ha stampato echo

    //DIRECTORY SEPARATOR
    require __DIR__."/../$className.php";//namespace=cartelle, così cercano sia file che cartelle
    
    //require __DIR__."/../validation/$className.php";
    //require __DIR__."/../validation/$className.php";
    //chiamiamo il require $classname anzichè user, così possiamo
    //cercare anche altri file con nome diversi.
});

//new \PDO();

$user= new User('Gianni','Rodari','mail@mail.com','1900-01-01');
//$val = new UserValidation($user);
print_r($user);

