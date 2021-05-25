<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>

<div class="container">
<form class="mt-4" action="<?= $action ?>" method="POST">
            <div class="form-group">
               <label for="">Interesse</label>
               <!-- is-invalid  -->
               <input value="<?= $name ?>" 
                      class="form-control <?= $nameClass ?>"  
                      name="name"  
                      type="text">

               <div class="<?= $nameClassMessage ?>">
                  <?= $nameMessage ?>
               </div> 

               <?php if(isset($interestId)) { ?>

               <input type="hidden" name="interestId" value="<?= $interestId ?>" class="form-control">
               </input>

                <?php } ?>

                <button class="btn btn-success mt-3" type="submit"><?= $submit ?></button>
                <a class="btn btn-primary mt-3" href="./list_interests.php">back</a>

            </div>



</div>