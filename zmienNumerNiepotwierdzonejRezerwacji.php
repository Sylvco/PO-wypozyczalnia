<?php
session_start();

$change = 1;
if(isset($_POST['left']))
 $change = -1;
 
$_SESSION['numerRezerwacji'] += $change;

header('Location: potwierdzanieRezerwacji.php');
?>