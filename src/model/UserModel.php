<?php

namespace geunadamiano\usm\model;
use \PDO;
//use geunadamiano\usm\config\local\AppConfig;
use geunadamiano\usm\entity\User;

class UserModel
{

    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname=usm_2;host=localhost', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {//qualcosa potrebbe andare storto
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    // CRUD:Sono le quattro operazioni fondamentali dell'usermodel
    public function create(User $user)
    {

        try {
            $pdostm = $this->conn->prepare('INSERT INTO User (firstName,lastName,email,birthday,password)
            VALUES (:firstName,:lastName,:email,:birthday,:password);');

            $pdostm->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STR);
            $pdostm->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
            $pdostm->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
            $pdostm->bindValue(':birthday', $user->getBirthday(), PDO::PARAM_STR);
            $pdostm->bindValue(':password', md5($user->getPassword()), PDO::PARAM_STR);

            $pdostm->execute();
            $last_id = $this->conn->lastInsertId();
            
            return $last_id;
        } catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();

        }
    }


    public function readAll()//ottengo tutti gli utenti
    {
        $pdostm = $this->conn->prepare('SELECT * FROM User;');
        $pdostm->execute();
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,User::class,['','','','','']);
    }

    public function readOne($user_id)
    {
        try {
            $sql = "Select * from User where userId=:user_id";
            $pdostm = $this->conn->prepare($sql);
            $pdostm->bindValue('user_id', $user_id, PDO::PARAM_INT);
            $pdostm->execute();//eseguo e tiene in memoria.
            $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,User::class,['','','','','']);

            return count($result) === 0 ? null : $result[0];

        } catch (\Throwable $th) {
            
            echo "qualcosa è andato storto";
            echo " ". $th->getMessage();
            //throw $th;
        }
    }


    public function update($user)
    {
        $sql = "UPDATE User set firstName=:firstName, 
                                lastName=:lastName,
                                email=:email,
                                birthday=:birthday,
                                password=:password
                                where userId=:user_id;";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':firstName', $user->getFirstName(), PDO::PARAM_STR);
        $pdostm->bindValue(':lastName', $user->getLastName(), PDO::PARAM_STR);
        $pdostm->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $pdostm->bindValue(':birthday', $user->getBirthday(), PDO::PARAM_STR);
        $pdostm->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $pdostm->bindValue(':user_id',$user->getUserId());
        $pdostm->execute();

        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }
    }

    //Mettere qui update password

    public function delete(int $user_id):bool
    {
        $sql = "delete from User where userId=:user_id ";
        
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':user_id',$user_id,PDO::PARAM_INT);//parametro che sto passando lo tratto come intero
        $pdostm->execute();

        
        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }  
    }

    public function deleteUserInterest($user_id){
        $sql = "DELETE FROM user_interest WHERE userId=:user_id;";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':user_id',$user_id,PDO::PARAM_INT);
        $pdostm->execute();
        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }

    }


    public function login($email, $password){
        $sql = "SELECT * FROM User WHERE email=:email AND password=:password";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue('email', $email, PDO::PARAM_STR);
        $pdostm->bindValue('password', md5($password), PDO::PARAM_STR);
        $pdostm->execute();
        $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,User::class,['','','','','']);

        return count($result)===0 ? null:$result[0];
    }
}