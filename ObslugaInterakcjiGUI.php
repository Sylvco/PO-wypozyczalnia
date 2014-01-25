<?php

require_once("SystemObslugiRezerwacji.php");
require_once("ObslugaTransakcji.php");
require_once("SystemPlatnosci.php");

class ObslugaInterakcjiGUI {
 private $SOR;
 private $obslugaTransakcji;
 private $systemPlatnosci;
		 
		 
  function ObslugaInterakcjiGUI(){
   $this -> SOR = new SystemObslugiRezerwacji();
   $this -> obslugaTransakcji = new ObslugaTransakcji(); 
   $this -> systemPlatnosci = new SystemPlatnosci();
  }
  
  static function WyswietlWiadomoscPotwierdzajacaPomyslnoscZmian($wiadomosc){
   //TODO
  }
  
  function WyswietlDaneSamochodu($idSamochodu){
   //TODO
  }
  
  function WyswietlDaneKlienta($idKlienta){
   //TODO
  }
  
  function WyswietlDaneRezerwacji($idRezerwacji){
   //TODO
  }
  
  function WyswietlWynikWeryfikacjiDanychKlienta($idKlienta){
   //TODO
  }
  
  function WyswietlWynikWeryfikacjiDanychRezerwacji($idRezerwacji){
   //TODO
  }
  
  function WyswietlWynikWeryfikacjiDokonanejOplatyZaWypozyczenie($idRezerwacji){
   //TODO
  }
  
  function WyswietlFormularzZwrotuSamochodu(){
   //TODO
  }
  
  function WyswietlFormularzRezerwacji(){
   $this -> SOR -> GenerujUmoweWypozyczenia(1);
  }
  
  function WyswietlNiepotwierdzoneRezerwacje(){
   //TODO
  }
}

?>