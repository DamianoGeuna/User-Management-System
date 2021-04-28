<?php

use geunadamiano\usm\entity\User;

require './src/entity/User.php';
try {
    // READ / LIST
    $conn = new PDO('mysql:dbname=corso_formarete;host=localhost',
                    'root','');//tipo database, nome, dove si trova, username, password
    
    $stm = $conn->prepare('select * from User;');
    
    
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_CLASS,'User'); // UserFactory
    //Costante di classe: opzioni che ti permettono di mettere dentro la classe alcuni parametri
    //e dare un nome per ricordarli
    // new User() id 3 
    // new User() id 4
    // new User() 

    print_r($result);

} catch (\PDOException $e) {//andrebbe bene anche solo Exceprion, ma così è più preciso
    echo $e->getMessage()."\n";
}//da tenere sempre pronto, potrebbero esserci eccezioni.