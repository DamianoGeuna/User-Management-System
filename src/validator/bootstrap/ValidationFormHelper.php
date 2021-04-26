<?php

class ValidationFormHelper{

    public static function getValidationClass(ValidationResult $validationResult)
    {
        $value = $validationResult->getValue();
        $formControlClass = $validationResult->getIsValid() ? 'is-valid' : 'is-invalid';
        $classMessage = $validationResult->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
        $message = $validationResult->getMessage();

        return[$value, $formControlClass, $classMessage, $message];

        //Quella sopra è la generalizzazione, altimenti dovevamo farlo per ogni campo (nome, cognome, etc.)
        //$firstName = $user->getFirstName();
        //$firstNameClass = $firstNameValidation->getIsValid() ? 'is-valid' : 'is-invalid';
        //$firstNameClassMessage = $firstNameValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
        //$firstNameMessage = $firstNameValidation->getMessage();
    }

    public static function getDefault()
    {
        
    }

}