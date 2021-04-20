<?php



class UserValidation{

    //costanti di classe, in genere si mette in cima
    public const FIRST_NAME_ERROR_NONE_MSG = 'Il nome è corretto';
    public const FIRST_NAME_ERROR_REQUIRED_MSG = 'Il nome è obbligatorio';

    private $user;
    private $errors = []; //Array<ValidationResult>
    private $isValid = true;

    public $firstNameResult;

    public function __construct(User $user) {
        $this->user = $user;
        $this->validate();
    }

    private function validate()
    {
        //$this->firstNameResult=$this->validateFirstName();
        $result= $this->validateFirstName();
        $this->errors['firstName'] = $result;

        if(!$result->getisValid())
        {
            $this->isValid=false;
        }
    }


    private function validateFirstName():?ValidationResult
    {
        $firstName= trim($this->user->getFirstName());
        if(empty($firstName))
        {
            $validationResult= new ValidationResult(self::FIRST_NAME_ERROR_REQUIRED_MSG,false,$firstName);
        }else{
            $validationResult=new ValidationResult(self::FIRST_NAME_ERROR_NONE_MSG,true,$firstName);
        };
        return $validationResult;
    }

    /**
     * foreach($userValidation->getErrors()as $error)
     * { echo "<li>  </li>"
     * }
     */

    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * $uservalidation->getError('firstName);
     *  var ValidationResult
     */
     public function getError($errorkey)
     {
         return $this->errors[$errorkey];
     }

}