<?php

namespace geunadamiano\usm\model;

use geunadamiano\usm\entity\User;
use \PDO;

class UserModel
{

    private $conn;

    public function __construct()
    {//qualcosa potrebbe andare storto
        try {
            $this->conn = new PDO('mysql:dbname=corso_formarete;host=localhost', 'root', '');//parametri di connessione presi da prima
            //$this->conn->setAttribute(PDO::ATTR)
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


    public function readall()
    {
        $sql = "select * from User;";//ottengo tutti gli utenti
        $pdostm = $this->conn->prepare($sql);
        $pdostm->execute();//eseguo e tiene in memoria.

        //$pdostm->fetchAll(PDO::FETCH_CLASS,'geunadamiano\usm\entity\User'::class);
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,User::class,['','','','']);//chiamare proprietà statica
    }

    public function readOne()
    {
        $sql = "select from User where userId=:user_id";
    }


    public function update(User $user)
    {
        $sql = "UPDATE User set firstName = :firstName,
                                lastName = :lastName,
                                email = :email,
                                birthday = :birthday
                                WHERE userId=:user_id;";

        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STR);
        $pdostm->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
        $pdostm->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $pdostm->bindValue(':birthday', $user->getBirthday(), PDO::PARAM_STR);
        $pdostm->bindValue(':user_id', $user->getUserId());

    }


    public function delete(int $user_id):bool
    {
        $sql = "delete from User where userId=:user_id ";

        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':user_id',$user_id,PDO::PARAM_INT);//parametro che sto passando lo tratto come intero
        $pdostm->execute();

        if ($pdostm->rowCount() === 0)
        {
            return false;
        }else{
            return true;
        };
    }
}