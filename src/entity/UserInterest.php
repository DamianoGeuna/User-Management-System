<?php
namespace geunadamiano\usm\entity; 

class UserInterest {

    private $userId;
    private $interestId;
    
    public function __construct($userId,$interestId) {

        $this->userId = $userId;
        $this->interestId = $interestId;
    }

    /**
     * Get the value of userId
     */ 
    public function getInterestId()
    {
        return $this->interestId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setInterestId($interestId)
    {
        $this->interestId = $interestId;
        return $this;
    }

    /**
     * Get the value of firstName
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

};