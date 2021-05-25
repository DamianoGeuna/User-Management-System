<?php include './src/view/head.php' ?>
<?php include './src/view/header.php' ?>

<div class="container">
        <!-- <form action="add_user_form.php" method="POST"> -->
        <form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input value="<?= $firstName ?>" 
                      class="form-control <?= $firstNameClass ?>"  
                      name="firstName"  
                      type="text">

               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div> 
            </div>

            <div class="form-group">
               <label for="">Cognome</label>
               <!-- is-invalid  -->
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
               <label for="">email</label>
               <!-- is-invalid  -->
               <input
                value="<?= $email ?>" 
                class="form-control <?= $emailClass ?>"  
                name="email"  
                type="text">
               <div class="<?= $emailClassMessage ?>">
                  <?= $emailMessage ?>
               </div> 
            </div>

             <div class="form-group" <?= $type ?>>
                <label for="">password</label>
                <input 
                value="<?= $password ?>"
                class="form-control <?= $passwordClass ?>" 
                name="password" 
                type="password"
                >
                <div class="<?= $passwordClassMessage ?>">
                  <?= $passwordMessage ?>
               </div> 
             </div>

             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control <?= $birthdayClass ?>" value="<?= $birthday ?>" name="birthday" type="date">
                <div class="<?= $birthdayClassMessage ?>">
                  <?= $birthdayMessage ?>
               </div> 
             </div>

            <div class="form-group mt-3">
                  <label for="interest">Cosa ti piace?</label>
                  <select name="interest" id="interest">
                     <option value="0"> <?= $nointerest ?></option>
                     <?php foreach($interestModel->readAll() as $int){ ?>
                     <option value="<?= $int->getInterestId()?>" <?= $int->getInterestId() == $interest ? 'selected':'' ?>> <?= $int->getName()?> </option>
                     <?php } ?>
                  </select>
            </div>


            <!-- quando gli utenti vengono creati non hanno ancora un id, quindi non ha bisogno del campo nascosto -->
             <?php if(isset($userId)) { ?>
               <!-- invece quando sono in modifica di un utente -->
               <!-- <div class="form-group mt-4 p-4 border border-danger">
               <label class="text-danger">
                  Questo campo è visibile motivi didattici in realtà dovrebbe essere un <b>input[type=hidden]</b> <br> 
                  serve a inviare via POST, il valore dello <b>userId</b> dell'istanza di User da aggiornare sul database<br>
               </label>
               <label class="d-block text-bold">id dell'utente che sto modificando</label> -->
               <input type="hidden" name="userId" value="<?= $userId ?>" class="form-control">
               </input>

             <?php } ?>
             
             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>
             <a class="btn btn-secondary mt-3" href="./list_users.php">Indietro</a>

        </form>
   </div>
    
</body>
</html>