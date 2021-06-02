<?php

use geunadamiano\usm\entity\User;
use geunadamiano\usm\model\InteresseModel;
use geunadamiano\usm\model\UserModel;
use geunadamiano\usm\validator\bootstrap\ValidationFormHelper;
use geunadamiano\usm\validator\UserValidation;

//$action = "edit_user.php?user_id=";non cambio indirizzo controller
//oppure input type hidden, si usa in fase di modifica; passarlo come testo

require './__autoload.php';
session_start();

/** $action rappresentà l'indirizzo a cui verranno inviati i dati del form */
$action = './edit_user.php';
$type = 'hidden';
$title = 'Modifica Utente';
$nointerest = 'Cosa ti piace?';
$submit = 'salva modifiche';
$userModel = new UserModel();
$interestModel = new InteresseModel();

if($_SERVER['REQUEST_METHOD']==='GET'){

    // ottengo l'utente dal suo userId servirà anche per valorizzare il campo nascosto nella view
    $userId = filter_input(INPUT_GET,'user_id',FILTER_SANITIZE_NUMBER_INT);
    $user = $userModel->readOne($userId);
    $interest = $interestModel->readUserInterest($userId);

    //print_r($interest);
    
    /** Il form viene compilato "con le informazioni dell'utente" */
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage) = ValidationFormHelper::getDefault($user->getFirstName());
    list($lastName,$lastNameClass,$lastNameClassMessage,$lastNameMessage) = ValidationFormHelper::getDefault($user->getLastName());
    list($email,$emailClass,$emailClassMessage,$emailMessage) = ValidationFormHelper::getDefault($user->getEmail());
    list($birthday,$birthdayClass,$birthdayClassMessage,$birthdayMessage) = ValidationFormHelper::getDefault($user->getBirthday());
    list($password,$passwordClass,$passwordClassMessage,$passwordMessage) = ValidationFormHelper::getDefault($user->getPassword());        
    
    //interesse nullo
    if(is_null($interest)){
        list($interest, $interestClass, $interestClassMessage, $interestMessage) = ValidationFormHelper::getDefault();
    }else{
        list($interest, $interestClass, $interestClassMessage, $interestMessage) = ValidationFormHelper::getDefault($interest->getInterestId());
    }
    
  
}

if ($_SERVER['REQUEST_METHOD']==='POST') {
    
    $userId = filter_input(INPUT_POST,'userId',FILTER_SANITIZE_NUMBER_INT);
    $intId = $_POST['interest'];
    $user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['birthday'], $_POST['password']);
    // Imposto anche l'id che deve corrispondere a quello dell'utente che sto modificando
    $user->setUserId($userId);

    //print_r($user);
    //die();
    $val = new UserValidation($user);
    
    $firstNameValidation = $val->getError('firstName');
    $lastNameValidation = $val->getError('lastName');
    $emailValidation = $val->getError('email');
    $birthdayValidation = $val->getError('birthday');
    $passwordValidation = $val->getError('password');
   

    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage) = ValidationFormHelper::getValidationClass($firstNameValidation);
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage) = ValidationFormHelper::getValidationClass($lastNameValidation);
    list($email, $emailClass, $emailClassMessage, $emailMessage) = ValidationFormHelper::getValidationClass($emailValidation);
    list($birthday, $birthdayClass, $birthdayClassMessage, $birthdayMessage) = ValidationFormHelper::getValidationClass($birthdayValidation);
    list($password, $passwordClass, $passwordClassMessage, $passwordMessage) = ValidationFormHelper::getValidationClass($passwordValidation);
    $user->setBirthday($birthday);

    if ($val->getIsValid()) {
        // TODO
        $userModel = new UserModel();
        $userModel->update($user);
        $userModel->deleteUserInterest($userId);
        $interestModel->assignsInterest($userId,$intId);
        header('location: ./list_users.php');
    }

}

if($_SESSION['connected']==false){
    header('location: ./login_user.php');
} 

include 'src/view/add_user_view.php';
?>
