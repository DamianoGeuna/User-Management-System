<?php

class UserModel
{

    private $conn;

    public function __construct()
    {//qualcosa potrebbe andare storto
        try {
            $this->conn = new PDO('mysql:dbname=corso_formarete;host=localhost', 'root', '');//parametri di connessione presi da prima
        } catch (\PDOException $e) {
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    // CRUD:Sono le quattro operazioni fondamentali dell'usermodel
    public function create(User $user)
    {

        try {//pdostatement
            $pdostm = $this->conn->prepare('INSERT INTO User (firstName,lastName,email,birthday)
            VALUES (:firstName,:lastName,:email,:birthday);');//non metto ID perchè è autoincrementale poi ordine non centra, sistema fa da solo

            $pdostm->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STR);
            $pdostm->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
            $pdostm->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $pdostm->bindValue(':birthday', $user->getBirthday(), PDO::PARAM_STR);

            $pdostm->execute();
        } catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();
        
        }
    }


    public function read()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}