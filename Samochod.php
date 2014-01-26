<?php

class Samochod {
 public $idSamochodu,
		$rocznik,
		$marka,
		$model,
		$stan,
		$kategoria,
		$adres,
		$spalanie,
		$obrazek;
 
 function Samochod($idSamochodu, $rocznik, $marka, $model, $stan, $kategoria, $adres, $spalanie, $obrazek){
  $this -> idSamochodu = $idSamochodu;
  $this -> rocznik = $rocznik;
  $this -> marka = $marka;
  $this -> model = $model;
  $this -> stan = $stan;
  $this -> kategoria = $kategoria;
  $this -> adres = $adres;
  $this -> spalanie = $spalanie;
  $this -> obrazek = $obrazek;
 }
}

?>