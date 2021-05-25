<?php

namespace geunadamiano\usm\validator;
use geunadamiano\usm\entity\Interest;

class InterestValidation {
    public const NAME_ERROR_NONE_MSG = 'Interesse inserito';
    public const NAME_ERROR_REQUIRED_MSG = 'Serve un nome';

    private $interest;
    private $errors = [] ;// Array<ValidationResult>;
    private $isValid = true;

    
    public $interestResult;

    public function __construct(Interest $interest) {
        $this->interest = $interest;
        $this->validate();
    }

    private function validate()
    {   
        $this->errors['name']  = $this->validateInterest();
    }

    public function getIsValid(){
        $this->isValid = true;
        foreach ($this->errors as $validationResult) {
            $this->isValid = $this->isValid && $validationResult->getIsValid();
        }
        return $this->isValid;
    }

    private function validateInterest():?ValidationResult
    {
        $interest = $this->interest->getName();

        if(empty($interest)){
            $validationResult = new ValidationResult(self::NAME_ERROR_REQUIRED_MSG,false,$interest);
        } else {
            $validationResult = new ValidationResult(self::NAME_ERROR_NONE_MSG,true,$interest);
        };
        return $validationResult;
    }

    public function getErrors()
    {
        return $this->errors; 
    }

    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }

}