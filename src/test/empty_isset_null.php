<?php

var_dump($_POST['tonno']);
var_dump(isset($_POST['tonno']));

var_dump(empty($_POST['tonno']));
var_dump(is_null($_POST['tonno']));
var_dump(empty($_POST['']));
var_dump(empty(trim('')));







/*$a = empty('');
var_dump($a);

$a = empty('       ');
var_dump($a);

$value = '';//la stringa vuota quindi non impostata
$a=isset($value);
var_dump($a);

$value = '      ';
$a=isset($value);
var_dump($a);

$value = 'Mario';
$a=isset($value);
var_dump($a);
*/
