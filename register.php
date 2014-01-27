<?php

require_once("ParserOdpowiedziMySQL.php");
require_once("ObslugaKwerendMySQL.php");

session_start();


checkRegistrationData();



function checkRegistrationData(){
 $parserOdpowiedzi = new ParserOdpowiedziMySQL();
 $answer = $parserOdpowiedzi -> checkIfLoginExists($_POST['login']);
 if(!$answer){
  performRegister();
  setcookie('registration','success');
}
else
	setcookie('registration','failed');
}

header('Location: rejestracja.php');

function performRegister(){
 $login = $_POST['login'];
 $haslo = $_POST['pass'];
 $kod = $_POST['zip'];
 $imie = $_POST['first'];
 $nazwisko = $_POST['last'];
 $email = $_POST['email'];
 $numerPrawka = $_POST['licenseNumber'];
 $numerTel = $number;
 $ulicaINumberDomu = $_POST['details'];
 $miasto = $_POST['city'];
 
 $adres = $miasto.' '.$kod.' '.$ulicaINumerDomu;
 
 $obslugaKwerend = new ObslugaKwerendMySQL();
 $kwerenda = 'INSERT INTO klienci (Imie, Nazwisko, PESEL, NumerTelefonu, Adres, NrPrawaJazdy, AdresEmail, IloscWypozyczen, Login, Haslo) 
                           VALUES ("'.$imie.'","'.$nazwisko.'","'.$pesel.'","'.$numerTel.'","'.$adres.'","'.$numerPrawka.'","'.$email.'","0","'.$login.'","'.$haslo.'")';
 echo $kwerenda;
 $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
}

?>