<?php

class Rezerwacja {
  public $idRezerwacji,
		 $dataZlozenia,
		 $odKiedy,
		 $doKiedy,
		 $potwierdzone,
		 $wysokoscOplaty,
		 $wysokoscKaucji,
		 $samochodOdebrany,
		 $samochodZwrocony,
		 $idKlienta,
		 $idPracownika,
		 $idSamochodu,
		 $miejsceOdbioru,
		 $miejsceZwrotu;
		 
 function Rezerwacja($idRezerwacji, $dataZlozenia, $od, $do, $potwierdzone, $wysOplaty, $wysKaucji, $samochodOdebrany, $samochodZwrocony, $idKlienta, $idPracownika, $idSamochodu, $miejsceOdbioru, $miejsceZwrotu){
  $this -> idRezerwacji = $idRezerwacji;
  $this -> dataZlozenia = $dataZlozenia;
  $this -> odKiedy = $od;
  $this -> doKiedy = $do;
  $this -> potwierdzone = $potwierdzone;
  $this -> wysokoscOplaty = $wysOplaty;
  $this -> wysokoscKaucji = $wysKaucji;
  $this -> samochodOdebrany = $samochodOdebrany;
  $this -> samochodZwrocony = $samochodZwrocony;
  $this -> idKlienta = $idKlienta;
  $this -> idPracownika = $idPracownika;
  $this -> idSamochodu = $idSamochodu;
  $this -> miejsceOdbioru = $miejsceOdbioru;
  $this -> miejsceZwrotu = $miejsceZwrotu;
 }
}

?>