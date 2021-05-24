<pre>

<?php

use geunadamiano\usm\service\UserSession;

//print_r(scandir('.'));

require __DIR__."/../../__autoload.php";
require __DIR__."/../../vendor/testTools/testTool.php";

$us = new UserSession();


$user = $us->autenticate('luigi.russo@email.com','qwerty');

print_r($_SESSION['user_autenticated']);
//assertEquals($_SESSION['user_autenticated'],$user);
?>

</pre>

