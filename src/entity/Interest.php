<?php
namespace geunadamiano\usm\entity; 

class Interest {

    private $interestId;
    private $name;
    

    public function __construct($name) {
        $this->name = $name;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

};

 