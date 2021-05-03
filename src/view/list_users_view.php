<?php include './src/view/head.php'?>
<?php include './src/view/header.php'?>


<div class="container">

<table class="table">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Email</th>
        <th>Birthday</th>
    
    </tr>

    <?php
    foreach ($users as $user) {?>
    <tr>
        <td><?= $user->getUserId() ?></td>
        <td><?= $user->getFirstName() ?></td>
        <td><?= $user->getLastName() ?></td>
        <td><?= $user->getEmail() ?></td>
        <td><?= $user->getBirthday() ?></td>
        <td>
            <a href="edit_user.php?user_id=<?= $user->getUserId() ?>" class="btn btn-secondary">edit</a>
            <a href="delete_user.php?user_id=<?= $user->getUserId() ?>" class="btn btn-danger">delete </a>
        </td>
    </tr>

    <?php } ?>

</table>



</div>
