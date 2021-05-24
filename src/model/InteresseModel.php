<?php
namespace geunadamiano\usm\model;
use \PDO;
use geunadamiano\usm\entity\Interest;


class InteresseModel
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:dbname=corso_formarete;host=localhost', 'root', '');
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

            $pdostm->bindValue(':name', $interest->getName(), PDO::PARAM_STR);

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
        $sql = "INSERT INTO user_interest (userId,interestId)
        VALUES (:userId,:interestId);";
        $pdostm = $this->conn->prepare($sql);
        $pdostm->bindValue('userId', $userId, PDO::PARAM_INT);
        $pdostm->bindValue('interestId', $interestId, PDO::PARAM_INT);
        $pdostm->execute();
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


    public function update($interest)
    {
        $sql = "UPDATE User SET name=:name WHERE interestId=:interestId;";
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
        $sql = "DELETE FROM user_interest WHERE interestId=:interestId;
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

}