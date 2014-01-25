<?php

class Klient {
 public $idKlienta,
		$imie,
		$nazwisko,
		$pesel,
		$numerTelefonu,
		$adres,
		$email,
		$nrPrawaJazdy,
		$iloscZamowien,
		$login,
		$haslo;
 
 function Klient($idKlienta, $imie, $nazwisko, $pesel, $numerTelefonu, $adres, $nrPrawaJazdy, $email, $iloscZamowien, $login, $haslo){
  $this -> idKlienta = $idKlienta;
  $this -> imie = $imie;
  $this -> nazwisko = $nazwisko;
  $this -> pesel = $pesel;
  $this -> numerTelefonu = $numerTelefonu;
  $this -> adres = $adres;
  $this -> nrPrawaJazdy = $nrPrawaJazdy;
  $this -> email = $email;
  $this -> iloscZamowien = $iloscZamowien;
  $this -> login = $login;
  $this -> haslo = $haslo;
 }
}

?>