<?php

class UserModel{

    private $conn;

    public function __construct() {//qualcosa potrebbe andare storto
        
        try {
            $this->conn = new PDO('mysql:dbname=corso_formarete;host=localhost','root',''); //parametri di connessione presi da prima.
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE );

        
        } catch (\PDOException $e) {
            //TODO: Togliere l'echo
            echo $e->getMessage();
        }

        
    }


    //CRUD: sono le quattro operazioni fondamentali dell'usermodel
    public function create(User $user){

        try {

            //pdostatement
            $pdostm = $this->conn->prepare('INSERT INTO User (firstName,lastName,email,birthday)
                                            VALUES(:firstName,:lastName,:email,:birthday);');//non metto id perchè è autoincrementale, poi ordine non c'entra, il sistema deve solo trovarlo.
            $pdostm->bindValue(':firstName',$user->getFirstName(), PDO ::PARAM_STR);
            $pdostm->bindValue(':lastName',$user->getLastName(), PDO ::PARAM_STR);
            $pdostm->bindValue(':email',$user->getEmail(), PDO ::PARAM_STR);
            $pdostm->bindValue(':birthday',$user->getBirthday(), PDO ::PARAM_STR);

            $pdostm->execute();
        } catch (\PDOException $e) {
            //TODO:evitare echo
            echo $e->getMessage();
        }




        

    }
    //al posto di create si usa anche add
    public function read(){

    }
    public function update(){

    }
    public function delete(){

    }



}