<?php include './src/view/head.php'?>
<?php include './src/view/header.php'?>


    <div class="container"><!-- valore diverso da dove partiamo-->
    <!--form action"$action=add_user_form.php, va su se stessa"
    mettendo action="$action" in base a clicco si modifica-->
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
                <label for="">Data di nascita</label>
                <input
                value="<?= $birthday ?>" 
                class="form-control <?= $birthdayClass ?>"  
                name="birthday"  
                type="date">
               <div class="<?= $birthdayClassMessage ?>">
                  <?= $birthdayMessage ?>
               </div>
            </div>

            <button class="btn btn-primary mt-3" type="submit">Aggiungi</button>
        </form>
    </div>
</body>
</html>