<?php include './src/view/head.php' ?> 
<?php include './src/view/header.php' ?>

<div class="container">

<div class="border p-3 my-3">
<a class="btn btn-primary" href="./list_users.php">Lista Utenti</a>
<a class="btn btn-primary" href="./add_interest_form.php">Nuovo Interesse</a>

</div>


<table class="table">
    <tr>
        <th>id</th>
        <th>interesse</th>
        <th width="1%" >action</th>
    </tr>
    <?php foreach($model->readAll() as $interest ){ ?>
        <tr>
        <td width="1%"><?= $interest->getInterestId() ?></td>
        <td><?= $interest->getName()?></td>
        <td class="text-nowrap">
        <a href="edit_user.php?interestId=<?= $interest->getInterestId() ?>" class="btn btn-secondary">edit </a>
        <a href="delete_interest.php?interestId=<?= $interest->getInterestId() ?>" class="btn btn-danger">delete </a>
        </td>
        </tr>
    <?php } ?>
        
</table>