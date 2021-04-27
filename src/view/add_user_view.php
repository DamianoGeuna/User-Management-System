<?php include './view/head.php'?>
<?php include './view/header.php'?>


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