<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>



<div class="container">
<div class="border p-3 my-3">


<div class="container">
        <form class="mt-4" action="<?= $action ?>" method="POST">

            <div class="form-group">
               <label for="">email</label>
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
               <label for="">Password</label>
               <input value="<?= $password ?>" 
                      class="form-control <?= $passwordClass ?>"  
                      name="password"  
                      type="text">

               <div class="<?= $passwordClassMessage ?>">
                  <?= $passwordMessage ?>
               </div> 
            </div>
             
             <button class="btn btn-primary mt-3" type="submit"><?= $submit ?></button>
        </form>
    </div>
