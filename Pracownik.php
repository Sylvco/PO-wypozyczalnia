<?php

class Pracownik {

public $IdPracownika,
	   $imie,
	   $nazwisko,
	   $pesel,
	   $numerTelefonu,
	   $adres,
	   $login,
	   $haslo;
	   
function Pracownik($IdPracownika, $imie, $nazwisko, $pesel, $numerTelefonu, $adres, $login, $haslo){
 $this -> IdPracownika = $IdPracownika;
 $this -> imie = $imie;
 $this -> nazwisko = $nazwisko;
 $this -> pesel = $pesel;
 $this -> numerTelefonu = $numerTelefonu;
 $this -> adres = $adres;
 $this -> login = $login;
 $this -> haslo = $haslo;
}	   

}

?>