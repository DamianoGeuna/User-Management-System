<?php

namespace geunadamiano\usm\validator;

use geunadamiano\usm\entity\User;

class UserValidation {

    public const FIRST_NAME_ERROR_NONE_MSG = 'Il nome è corretto';
    public const FIRST_NAME_ERROR_REQUIRED_MSG = 'Il nome è obbligatorio';

    public const LAST_NAME_ERROR_NONE_MSG = 'Cognome Corretto';
    public const LAST_NAME_ERROR_REQUIRED_MSG = 'Il cognome è obbligatorio';

    public const EMAIL_ERROR_NONE_MSG = 'Email Corretta';
    public const EMAIL_ERROR_REQUIRED_MSG = 'Non hai inserito la mail';
    public const EMAIL_FORM_ERROR_REQUIRED_MSG = 'Formato Email errato';

    //public const EMAIL_ERROR_NONE_MSG = 'Email Corretta';
    //public const EMAIL_ERROR_REQUIRED_MSG = 'La email è obbligatoria';

    private $user;
    private $errors = [] ;// Array<ValidationResult>;
    private $isValid = true;

    public $firstNameResult;
    public $lastNameResult;
    public $emailResult;

    public function __construct(User $user) {
        $this->user = $user;
        $this->validate();
    }

    private function validate()
    {   
        //$this->firstNameResult =  $this->validateFirstName();
        $this->errors['firstName'] = $this->validateFirstName();
        $this->errors['lastName'] = $this->validateLastName();
        $this->errors['email'] = $this->validateemail();
        //$this->errors['Birthday'] = $this->validateBirthday(); Non sarebbe obbligatorio, da aggiungere

    }

    public function getIsValid(){
        $this->isValid = true;
        foreach ($this->errors as $validationResult) {
            $this->isValid = $this->isValid && $validationResult->getIsValid();
        }
        return $this->isValid;
    }

    private function validateFirstName():?ValidationResult
    {
        $firstName = trim($this->user->getFirstName());
        
        if(empty($firstName)){
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_REQUIRED_MSG,false,$firstName);
        } else {
            $validationResult = new ValidationResult(self::FIRST_NAME_ERROR_NONE_MSG,true,$firstName);
        };
        return $validationResult;
    }

    /* private function validatelastName()
    {   
        //$this->firstNameResult =  $this->validateFirstName();
        $result = $this->validatelastName();
        $this->errors['lastName'] = $result; //

        if(!$result->getIsValid()){
             $this->isValid = false;   
        }
    } */

    private function validatelastName():?ValidationResult
    {
        $lastName = trim($this->user->getLastName());
        
        if(empty($lastName)){
            $validationResult = new ValidationResult(self::LAST_NAME_ERROR_REQUIRED_MSG,false,$lastName);
        } else {
            $validationResult = new ValidationResult(self::LAST_NAME_ERROR_NONE_MSG,true,$lastName);
        };
        return $validationResult;
    }

    private function validateemail():?ValidationResult
    {
        $email = trim($this->user->getEmail());
        
        if(empty($email)){
            $validationResult = new ValidationResult(self::EMAIL_ERROR_REQUIRED_MSG,false,$email);
        } elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $validationResult = new ValidationResult(self::EMAIL_FORM_ERROR_REQUIRED_MSG,false,$email);
        } else {
            $validationResult = new ValidationResult(self::EMAIL_ERROR_NONE_MSG,true,$email);
        };
        return $validationResult;
    }



    public function getErrors()
    {
        return $this->errors; 
    }

    /**
     * $userValidation->getError('firstName');
     * @var ValidationResult $errorKey Chiave associativa che contiene un ValidationResult corrispondente
     */
    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }


}