<?php
namespace geunadamiano\usm\model;
use \PDO;
use geunadamiano\usm\entity\Interest;
use geunadamiano\usm\entity\UserInterest;


class InteresseModel
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname=usm_2;host=localhost', 'root', '');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            // TODO: togliere echo
            echo $e->getMessage();
        }
    }

    public function create(Interest $interest)
    {

        try {
            $pdostm = $this->conn->prepare('INSERT INTO interest (name)
            VALUES (:name);');

            $pdostm->bindValue(':name', $interest->getName(), PDO::PARAM_STR);//correzione se qualcuno mette tutto maiusc?

            $pdostm->execute();

        } catch (\PDOException $e) {
            // TODO: Evitare echo
            echo $e->getMessage();

        }
    }

    public function readAll(){
        $pdostm = $this->conn->prepare('SELECT * FROM Interest;');
        $pdostm->execute();
        return $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Interest::class,['']);
    }

    public function assignsInterest($userId, $interestId) {
        if($interestId != 0){
            $sql = "INSERT INTO User_Interest (userId,interestId)
            VALUES (:userId,:interestId);";
            $pdostm = $this->conn->prepare($sql);
            $pdostm->bindValue('userId', $userId, PDO::PARAM_INT);
            $pdostm->bindValue('interestId', $interestId, PDO::PARAM_INT);
            $pdostm->execute();
        }else{
            $this->deleteUserInterest($userId);
        }
    }

    public function readOne($interestId)
    {
        try {
            $sql = "SELECT * FROM User WHERE interestId=:interestId";
            $pdostm = $this->conn->prepare($sql);
            $pdostm->bindValue('interestId', $interestId, PDO::PARAM_INT);
            $pdostm->execute();
            $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,Interest::class,['']);

            return count($result) === 0 ? null : $result[0];

        } catch (\Throwable $th) {
            
            echo "qualcosa è andato storto";
            echo " ". $th->getMessage();
            //throw $th;
        }
    }

    public function readUserInterest($userId){
        $sql = "SELECT * FROM User_Interest WHERE userId=:userId";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue('userId', $userId, PDO::PARAM_INT);
        $pdostm->execute();
        $result = $pdostm->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,UserInterest::class,['']);

        return count($result) === 0 ? null:$result[0];
    }

    public function extractInterestName($id){

        $obj = $this->readUserInterest($id);

        if(is_null($obj)){
            $result = "";
        }else{
            $interestId = $obj->getInterestId();
            $interestObj = $this->readOne($interestId);
            $result = $interestObj->getName();
        }
        
        return $result;
    }


    public function update($interest)
    {
        $sql = "UPDATE Interest SET name=:name WHERE interestId=:interestId;";//modificare qui?
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':name', strtoupper($interest->getName()), PDO::PARAM_STR);
        $pdostm->bindValue(':interestId', $interest->getInterestId(), PDO::PARAM_INT);
        $pdostm->execute();

        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }
    }

    public function delete(int $interestId):bool
    {
        $sql = "DELETE FROM User_Interest WHERE interestId=:interestId;
                DELETE FROM Interest WHERE interestId=:interestId;";
        
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':interestId',$interestId,PDO::PARAM_INT);
        $pdostm->execute();

        if($pdostm->rowCount() === 0) {
            return false;
        } else if($pdostm->rowCount() === 1){
            return true;
        }

  
    }

    public function deleteUserInterest($interestId){
        $sql = "DELETE FROM User_Unterest WHERE interestId=:interestId;";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue(':interestId',$interestId,PDO::PARAM_INT);
        $pdostm->execute();

    }

}