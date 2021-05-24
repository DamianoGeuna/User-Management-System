<?php if ($_SESSION['connected']){ ?>
<div>Sei connesso come <b><?= $_SESSION['user']->getFirstName()?></b></div>
<?php }?>