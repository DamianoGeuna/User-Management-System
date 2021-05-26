<?php
namespace geunadamiano\usm\entity; 

class Interest {

    private $interestId;
    private $name;
    

    public function __construct($name) {
        $this->name = $name;//cambiare???
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


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

};

 