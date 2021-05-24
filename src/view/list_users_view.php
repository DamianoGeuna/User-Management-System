<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>
<?php include './src/view/user_connected.php' ?>

<div class="container">
<div class="border p-3 my-3">
<a class="btn btn-primary" href="./add_user_form.php">add new user</a>
<a class="btn btn-primary" href="./login_user.php">logout</a>
<a class="btn btn-primary" href="./add_interest_form.php">aggiungi interesse</a>


</div>

<table class="table">
    <tr>
        <th>id</th>
        <th>nome</th>
        <th>cognome</th>
        <th>data di nascita</th>
        <th>interesse</th>
        <th width="1%" >action</th>
    </tr>
    <?php foreach($model->readAll() as $user ){ ?>
        <tr>
        <td width="1%"><?= $user->getUserId() ?></td>
        <td><?= $user->getFirstName()?></td>
        <td ><?= $user->getLastName() ?></td>
        <td ><?= $user->getBirthday() ?></td>
        <td><?= $intModel->extractInterestName($user->getUserId()) ?></td>
        <td class="text-nowrap">
        <a href="edit_user.php?user_id=<?= $user->getUserId() ?>" class="btn btn-secondary">edit </a>
        <a href="delete_user.php?user_id=<?= $user->getUserId() ?>" class="btn btn-danger">delete </a>
        </td>
        </tr>
    <?php } ?>
        
</table>


</div>