<?php 
//require "autoload.php"; //spiega a php come prendere le classi
require __DIR__."/vendor/testTools/testTool.php";
require __DIR__."/src/entity/User.php";
require __DIR__."/src/validator/UserValidation.php";
require __DIR__."/src/validator/ValidationResult.php";
require __DIR__."/src/validator/bootstrap/ValidationFormHelper.php";

// print_r($_POST);
if($_SERVER['REQUEST_METHOD']==='GET'){
    
    list($firstName,$firstNameClass,$firstNameClassMessage,$firstNameMessage)=ValidationFormHelper::getDefault();
    list($lastName,$lastNameClass,$lastClassMessage,$lastMessage)=ValidationFormHelper::getDefault();
    list($email,$emailClass,$emailClassMessage,$emailMessage)=ValidationFormHelper::getDefault();

    /* $firstName = '';
    $firstNameClass = '';
    $firstNameClassMessage = '';
    $firstNameMessage = '';*/

    /* $lastName = '';
    $lastNameClass = '';
    $lastNameClassMessage = '';
    $lastNameMessage = ''; */

    /* $email = '';
    $emailClass = '';
    $emailClassMessage = '';
    $emailMessage = ''; */

}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $user = new User($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['birthday']);
    $val = new UserValidation($user);

    $firstNameValidation = $val->getError('firstName');
    list($firstName, $firstNameClass, $firstNameClassMessage, $firstNameMessage)=ValidationFormHelper::getValidationClass($firstNameValidation);

    $lastNameValidation = $val->getError('lastName');
    list($lastName, $lastNameClass, $lastNameClassMessage, $lastNameMessage)=ValidationFormHelper::getValidationClass($lastNameValidation);

    $emailValidation = $val->getError('email');
    list($email, $emailClass, $emailClassMessage, $emailMessage)=ValidationFormHelper::getValidationClass($emailValidation);

    if($val->getIsValid()){
        //TODO
        echo "Salva utente";
    }

    //$firstName = $user->getFirstName();
    //$firstNameClass = $firstNameValidation->getIsValid() ? 'is-valid' : 'is-invalid';
    //$firstNameClassMessage = $firstNameValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
    //$firstNameMessage = $firstNameValidation->getMessage();

    //$lastNameValidation = $val->getError('lastName');
    //$lastName = $user->getLastName();
    //$lastNameClass = $lastNameValidation->getIsValid() ? 'is-valid' : 'is-invalid';
    //$lastNameClassMessage = $lastNameValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
    //$lastNameMessage = $lastNameValidation->getMessage();

    //$emailValidation = $val->getError('email');
    //$email = $user->getEmail();
    //$emailClass = $emailValidation->getIsValid() ? 'is-valid' : 'is-invalid';
    //$emailClassMessage = $emailValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback';
    //$emailMessage = $emailValidation->getMessage();




}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <header>
            USM 
    </header>
    <div class="container">
        <form action="add_user_form.php" method="POST">

            <div class="form-group">
               <label for="">Nome</label>
               <input
                value="<?= $firstName ?>" 
                class="form-control <?= $firstNameClass ?>"  
                name="firstName"  
                type="text">
               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div>
            </div>

            <div class="form-group">
                <label for="">Cognome</label>
                <input
                value="<?= $lastName ?>" 
                class="form-control <?= $lastNameClass ?>"  
                name="lastName"  
                type="text">
                <div class="<?= $lastNameClassMessage ?>">
                    <?= $lastNameMessage ?>
                </div>              
            </div>
            
            <div class="form-group">
                <label for="">Email</label>
                <input
                value="<?= $email ?>" 
                class="form-control <?= $emailClass ?>"  
                name="email"  
                type="text">
               <div class="<?= $emailClassMessage ?>">
                  <?= $emailMessage ?>
               </div>
            </div>

             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control" name="birthday" type="date">
             </div>
             <button class="btn btn-primary mt-3" type="submit">Aggiungi</button>
        </form>
    </div>
</body>
</html>