<?php

require_once("SystemObslugiRezerwacji.php");
require_once("ObslugaKwerendMySQL.php");
require_once("Samochod.php");
require_once("Klient.php");
require_once("Rezerwacja.php");
require_once("Pracownik.php");

class ParserOdpowiedziMySQL {
 private $obslugaKwerend;
		 
 function ParserOdpowiedziMySQL(){
  $this -> obslugaKwerend = new ObslugaKwerendMySQL();
 } 
		 
 private function ParsujOdpowiedz($odpowiedz){
  $liczbaWynikow = mysql_num_rows($odpowiedz);
  $tablicaWynikow = array(array());
  
  for($i = 0; $i < $liczbaWynikow; $i++)
   $tablicaWynikow[$i] = mysql_fetch_row($odpowiedz);
   
  if($liczbaWynikow == 1)
   return $tablicaWynikow[0];
  else 
   return $tablicaWynikow;  
 }
 
 static function PrzekazOdpowiedzPotwierdzajacaZmiany($odpowiedz){
  SystemObslugiRezerwacji::OdbierzWiadomoscPotwierdzajaca($odpowiedz);
 }
 
 function ZapytajBazeODaneSamochodu($idSamochodu){
  $tablicaZDanymiSamochodu = $this -> ZapytajBazeODaneZKonkretnymId("samochody","IdSamochodu",$idSamochodu);
  return New Samochod($tablicaZDanymiSamochodu[0], $tablicaZDanymiSamochodu[1],
                      $tablicaZDanymiSamochodu[2], $tablicaZDanymiSamochodu[3],
					  $tablicaZDanymiSamochodu[4], $tablicaZDanymiSamochodu[5],
					  $tablicaZDanymiSamochodu[6]);
 }
 
 function ZapytajBazeODaneKlienta($idKlienta){
  $tablicaZDanymiKlienta =  $this -> ZapytajBazeODaneZKonkretnymId("klienci","IdKlienta",$idKlienta);
  return New Klient(  $tablicaZDanymiKlienta[0],$tablicaZDanymiKlienta[1],
                      $tablicaZDanymiKlienta[2],$tablicaZDanymiKlienta[3],
					  $tablicaZDanymiKlienta[4],$tablicaZDanymiKlienta[5],
					  $tablicaZDanymiKlienta[6],$tablicaZDanymiKlienta[7],
					  $tablicaZDanymiKlienta[8],$tablicaZDanymiKlienta[9],
					  $tablicaZDanymiKlienta[10]);
 }
 
 function ZapytajBazeODaneRezerwacji($idRezerwacji){
  $tablicaZDanymiRezerwacji = $this -> ZapytajBazeODaneZKonkretnymId("rezerwacje","IdRezerwacji",$idRezerwacji);
  return New Rezerwacja($tablicaZDanymiRezerwacji[0], $tablicaZDanymiRezerwacji[1],
                        $tablicaZDanymiRezerwacji[2], $tablicaZDanymiRezerwacji[3],
					    $tablicaZDanymiRezerwacji[4], $tablicaZDanymiRezerwacji[5],
						$tablicaZDanymiRezerwacji[6], $tablicaZDanymiRezerwacji[7],
						$tablicaZDanymiRezerwacji[8], $tablicaZDanymiRezerwacji[9],
						$tablicaZDanymiRezerwacji[10], $tablicaZDanymiRezerwacji[11],
						$tablicaZDanymiRezerwacji[12], $tablicaZDanymiRezerwacji[13]);
 }
 
 function ZapytajBazeODanePracownika($idPracownika){
  $tablicaZDanymiPracownika = $this -> ZapytajBazeODaneZKonkretnymId("pracownicy", "IdPracownika", $idPracownika);
  return new Pracownik($tablicaZDanymiPracownika[0], $tablicaZDanymiPracownika[1],
					   $tablicaZDanymiPracownika[2], $tablicaZDanymiPracownika[3],
					   $tablicaZDanymiPracownika[4], $tablicaZDanymiPracownika[5],
					   $tablicaZDanymiPracownika[6], $tablicaZDanymiPracownika[7]
						);
 }
 
 function ZapytajBazeODaneNiepotwierdzonychRezerwacji(){
  $kwerenda = "SELECT * FROM Rezerwacje WHERE Potwierdzone='0'";
  $resource = $this -> obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
  $tablicaZDanymiRezerwacji = ParsujOdpowiedz($resource);
  $tablicaZObiektamiRezerwacji = array();
  
  for($i = 0; $i < count($tablicaZDanymiRezerwacji); $i++){
   $tablicaZObiektamiRezerwacji[$i] = New Rezerwacja($tablicaZDanymiRezerwacji[0], $tablicaZDanymiRezerwacji[1],
													 $tablicaZDanymiRezerwacji[2], $tablicaZDanymiRezerwacji[3],
													 $tablicaZDanymiRezerwacji[4], $tablicaZDanymiRezerwacji[5],
													 $tablicaZDanymiRezerwacji[6], $tablicaZDanymiRezerwacji[7],
													 $tablicaZDanymiRezerwacji[8], $tablicaZDanymiRezerwacji[9],
													 $tablicaZDanymiRezerwacji[10], $tablicaZDanymiRezerwacji[11],
													 $tablicaZDanymiRezerwacji[12], $tablicaZDanymiRezerwacji[13]);
  }
   return $tablicaZObiektamiRezerwacji;
 }
 
 function ZapytajBazeOIloscWierszyW($nazwaTabeli){
  $kwerenda = "SELECT * FROM ".$nazwaTabeli;
  $resource = $this -> obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
  $quantity = mysql_num_rows($resource);
  
  return $quantity;
 }
 
 function KazBazieUsunacRezerwacje($idRezerwacji){
  $kwerenda = "DELETE * FROM Rezerwacje WHERE IdRezerwacji='".$idRezerwacji."'";
  $odpowiedz = $this -> obslugaKwerend -> ObsluzKwerendeUsuwajaca($kwerenda);
  if($odpowiedz)
   PrzekazOdpowiedzPotwierdzajacaZmiany("Pomyślnie usunięto rezerwacje o numerze: ".$idRezerwacji);
  else
   PrzekazOdpowiedzPotwierdzajacaZmiany("Usuwanie rezerwacji o numerze: ".$idRezerwacji." nie powiodło się.");
 }
 
 private function ZapytajBazeODaneZKonkretnymId($nazwaTabeli, $nazwaId, $szukaneId){
  $kwerenda = "SELECT * FROM ".$nazwaTabeli." WHERE ".$nazwaId."='".$szukaneId."'";
  $resource = $this -> obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
  $tablicaZDanymi = $this -> ParsujOdpowiedz($resource);
  return $tablicaZDanymi;
 }
}

?>