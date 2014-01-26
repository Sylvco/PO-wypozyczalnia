<?php

require_once("ObslugaTransakcji.php");

session_start();

$obslugaTransakcji = new ObslugaTransakcji();
$idRezerwacji = $_POST['idRezerwacji'];
$obslugaTransakcji -> ZanotujPotwierdzenieRezerwacji($idRezerwacji);

$numerRezerwacji = $_SESSION['numerRezerwacji'];
$_SESSION['numerRezerwacji'] = $numerRezerwacji == 1 ? 1 : $numerRezerwacji - 1;

header('Location: potwierdzanieRezerwacji.php');

?>