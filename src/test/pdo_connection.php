<?php

require './src/entity/User.php';

try {
    $conn = new PDO('mysql:dbname=corso_formarete;host=localhost','root','');//tipo datab, nome, dove si trova, username,password
   $stm = $conn -> prepare('select * from user;');
   $stm->execute();
   $result = $stm->fetchAll(PDO::FETCH_CLASS,'User'); //simile a UserFactory (vd correzione verifica intermedia),
    //costante di classe: opzioni che ti permettono di mettere dentro la classe alcuni parametri e posso dare un nome per ricordarmeli
   //new User() id 3
   //new User() id 4
   //new User()

   print_r($result);

} catch (\PDOException $e) {//andrebbe bene anche solo Exception, ma questo è più preciso
    echo $e->getMessage();
}//questo è da tenere sempre pronto. Ci potrebbero essere eccezioni