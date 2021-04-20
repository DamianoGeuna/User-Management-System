<?php 

class ValidationResult
{

    public $message;
    public $isValid;
    public $value;
    
    public function __construct($message,$isValid,$value) {
        $this-> message = $message;
        $this-> isValid = $isValid;
        $this-> value = $value;
        
        
    }
    

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Get the value of isValid
     */ 
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }
}