<?php

require_once("ObslugaTransakcji.php");

class SystemPlatnosci {
 private $obslugaTransakcji;
 
 function SystemPlatnosci(){
  $this -> obslugaTransakcji = new ObslugaTransakcji();
 }
 
 function UiscOplateZaWypozyczenie($idRezerwacji, $klient, $wysokoscOplaty){
  ObciazKontoKlienta($klient, $wysokoscOplaty);
  $obslugaTransakcji -> ZanotujUiszczenieOplatyZaWypozyczenie($idRezerwacji, $wysokoscOplaty);
 }
 
 function UiscKaucjeZaWypozyczenie($idRezerwacji, $klient, $wysokoscKaucji){
  ObciazKontoKlienta($klient, $wysokoscKaucji);
  $obslugaTransakcji -> ZanotujUiszczenieKaucji($idRezerwacji, $wysokoscKaucji);
 }
 
 private function ObciazKontoKlienta($klient, $wysokoscOplaty){
  //METODA NIEIMPLEMENTOWANA
 }
}

?>