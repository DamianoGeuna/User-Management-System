<?php
namespace geunadamiano\usm\entity; 

class UserInterest {

    private $userId;
    private $interestId;
    
    public function __construct($userId,$interestId) {

        $this->userId = $userId;
        $this->interestId = $interestId;
    }

    public function getInterestId()
    {
        return $this->interestId;
    }


    public function setInterestId($interestId)
    {
        $this->interestId = $interestId;
        return $this;
    }
 
    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

};