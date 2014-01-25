<?php

require_once("Klient.php");
require_once("ObslugaKwerendMySQL.php");
require_once("ParserOdpowiedziMySQL.php");

session_start();

$client = $_SESSION['klient'];
$obslugaKwerend = new ObslugaKwerendMySQL();
$parserOdpowiedzi = new ParserOdpowiedziMySQL();
$nowyEmail = $_POST['email'];
$nowyNumer = $_POST['numer'];

$kwerenda = 'UPDATE klienci SET NumerTelefonu="'.$nowyNumer.'", AdresEmail="'.$nowyEmail.'" WHERE IdKlienta="'.$client->idKlienta.'"';
$obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);

$_SESSION['klient'] = $parserOdpowiedzi -> ZapytajBazeODaneKlienta($client->idKlienta);

header('Location: kontoKlienta.php');
?>