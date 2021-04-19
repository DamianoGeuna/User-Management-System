<?php

    if($_SERVER['REQUEST_METHOD']==='POST'){
        //qualcuno ha premuto aggiungi
        // - [] Creo istanza User
        // - [] Effettuo validazione istanza User
        // - [] Se è tutto ok salvo utente --> si va a pagine di conferma
                //[] Istanza del model e uso metodo create
        // - [] Se sbagliato. rimando su form e segnalo errori
        //posso controllare i dati e se sono giusti inserire il nuovo utente.

        //per ogni errore/campo bisogna far si che si ricordi le cose giuste.
                                            // deve segnalare il campo obbligatorio
                                            //proprietà is valid è false
                                            //codice di errore

        $user = userFactory :: fromArray($_POST);
        $userValidation = new UserValidation($user);
        $userValidation ->validate();

        if($userValidation->validate())
        {
            $userModel=new UserModel();
            $userModel->create($user);

            //redirect alla conferma  dell'iscrizione e grazie per esserti iscritto.
        };


        $firstNameValidationResult=$userValidation->firstNameValid;






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
                    <!--Mettere is invalid-->
                    <input class="form-control <??>" name="firstName" type="text">
                    <div class="invalid-feedback">Il nome è obbligatorio</div>
                </div>
                <div class="form-group">
                    <label for="">Cognome</label>
                    <input class="form-control" name="lastName" type="text">
                    <div class="invalid-feedback">Il cognome è obbligatorio</div>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" name="email" type="text">
                    <div class="invalid-feedback">La email è obbligatoria</div>
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