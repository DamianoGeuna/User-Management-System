<?php

require __DIR__."/vendor/TaskList/testTool.php";
require __DIR__."/src/entity/User.php";
require __DIR__."/src/validator/UserValidation.php";
require __DIR__."/src/validator/ValidationResult.php";

//require "autoload.php";//spiega a php come prendere le classi

if($_SERVER['REQUEST_METHOD']==='GET'){

    $firstName= '';
    $firstNameClass='';
    $firstNameClassMessage='';
    $firstNameMessage='';


}

if($_SERVER['REQUEST_METHOD']==='POST'){

    $user=new User($_POST['firstName'],$_POST['lastName'],$_POST['email'],$_POST['birthday']);
    $val=new UserValidation($user);
    $firstNameValidation = $val->getError('firstName');

    $firstName = $user->getFirstName();
    $firstNameClass=$firstNameValidation->getIsValid()?'is-valid':'is-invalid';
    $firstNameClassMessage=$firstNameValidation->getIsValid()?'valid-feedback':'invalid-feedback';
    $firstNameMessage=$firstNameValidation->getMessage();

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

   
    <div>
        <header>
            USM
        </header>

        <div class="container">
            <form action="add_user_form.php" method="POST">

                <div class="form-group">
                    <label for="">Nome</label>
                    <input
                    value="<?= $firstName ?>"
                    class="form-control <?= $firstNameClass?>"
                    name="firstName"
                    type="text">
                    <div class="<?= $firstNameClassMessage ?>">
                        <?=$firstNameValidation->getMessage()?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Cognome</label>
                    <input value="<?php $lastNameValidation?>"
                     class="form-control<?= $lastNameValidation->getIsValid() ? 'is-valid' : 'is-invalid'?>" 
                     name="lastName" 
                     type="text">
                    <div class="<?= $lastNameValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback'?>"><?= $emailValidation->getIsValid()?> </div>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input value="<?php $email?>"
                     class="form-control<?= $emailValidation->getIsValid() ? 'is-valid' : 'is-invalid'?>" 
                     name="email" 
                     type="text">
                    <div class="<?= $emailValidation->getIsValid() ? 'valid-feedback' : 'invalid-feedback'?>"><?= $emailValidation->getIsValid()?> </div>
                </div>
                <div class="form-group">
                    <label for="">Data di Nascita</label>
                    <input class="form-control" name="birthday" type="date">
                    <div class="invalid-feedback">La data di nascita è obbligatoria</div>
                </div>

                <button class="btn btn-primary mt-3" type="submit">Aggiungi</button>
            </form>
        </div>
    </div>
</body>
</html>