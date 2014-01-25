<?php

require_once("ParserOdpowiedziMySQL.php");
require_once("ObslugaInterakcjiGUI.php");

class SystemObslugiRezerwacji {
 private $parserOdpowiedziMySQL;
 
 function SystemObslugiRezerwacji(){
  $this -> parserOdpowiedziMySQL = new ParserOdpowiedziMySQL();
 }
 
 function DajDaneKlienta($idKlienta){
  return $parserOdpowiedziMySQL -> ZapytajBazeODaneKlienta($idKlienta);
 }
 
 function DajDaneSamochodu($idSamochodu){
  return $parserOdpowiedziMySQL -> ZapytajBazeODaneSamochodu($idSamochodu);
 }
 
 function DajDaneRezerwacji($idRezerwacji){
  return $parserOdpowiedziMySQL -> ZapytajBazeODaneRezerwacji($idRezerwacji);
 }
 
 static function OdbierzWiadomoscPotwierdzajaca($wiadomosc){
  ObslugaInterakcjiGUI::WyswietlWiadomoscPotwierdzajacaPomyslnoscZmian($wiadomosc);
 }
 
 function GenerujUmoweWypozyczenia($idRezerwacji){
  $rezerwacja = $this -> parserOdpowiedziMySQL -> ZapytajBazeODaneRezerwacji($idRezerwacji);
  $idSamochodu = $rezerwacja -> idSamochodu;
  $samochod = $this -> parserOdpowiedziMySQL -> ZapytajBazeODaneSamochodu($idSamochodu);
  $klient = $this -> parserOdpowiedziMySQL -> ZapytajBazeODaneKlienta($rezerwacja -> idKlienta);
  
  $nazwaFirmy = "Wypożyczalnia Inc.";
  $adres = $samochod -> adres;
  $miejscowosc =  explode(" ", $adres)[0];
  $data = date('d/m/Y');
  
  $imie = $klient -> imie;
  $nazwisko = $klient -> nazwisko;
  $adres = $klient -> adres;
  $numerTelefonu = $klient -> numerTelefonu;
  $pesel = $klient -> pesel;
  $nrPrawaJazdy = $klient -> nrPrawaJazdy;
  
  $marka = $samochod -> marka;
  $model = $samochod -> model;
  $rocznik = $samochod -> rocznik;
  
  $wysokoscOplaty = $rezerwacja -> wysokoscOplaty;
  $kaucja = $rezerwacja -> wysokoscKaucji;
  
  $od = $rezerwacja -> odKiedy;
  $do = $rezerwacja -> doKiedy;
  
  echo "<!doctype html>
  
		<meta charset=\"utf-8\">
		
		<link rel=\"Stylesheet\" type=\"text/css\" href=\"wzorUmowy.css\" />
		
		<div class=\"left\">$miejscowosc</div><div class=\"right\">$data</div>
		
		<br><br><br>
		
		<center>
		
		$nazwaFirmy <br>
		
		Umowa wynajmu samochodu o nr ID: $idSamochodu

		</center>
		<br><br>
		
		<div class=\"Blok\">
		
		<div class=\"title\">
		
		Najemca: <br>
		
		</div>
		
		<div class=\"text\">
		
		Imię: $imie	<br>		        
		Nazwisko: $nazwisko <br>		    
		Adres: $adres <br>			    
		Nr telefonu: $numerTelefonu <br>
		PESEL: $pesel <br>
		Nr prawa jazdy: $nrPrawaJazdy <br>
		
		</div>
		</div>
		<br><br>
		
		<div class=\"Blok\">
		
		<div class=\"title\">
		
		Samochód: <br>
		
		</div>
		<div class=\"text\">
		
		ID: $idSamochodu <br>
		Marka: $marka <br>
		Model: $model <br>
		Rocznik: $rocznik <br>
		
		</div>
		</div>
		<br><br>
		
		<div class=\"Blok\">
		
		<div class=\"title\">
		
		Wynajem: <br><br>
		
		</div>
		<div class=\"text\">
		
		Od: $od <br> Do: $do <br><br>
		<center>Opłata:</center> <br>
		Wysokość opłaty: $wysokoscOplaty zł <br>
		Kaucja: $kaucja zł<br>
		
		</div>
		</div>
		<br><br>
		
		<div class=\"Blok\">
		
		<div class=\"title\">
		
		Zwrot samochodu: <br>
		
		</div>
		<div class=\"text\">
		
		Data: <br>
		Godzina: <br>
		Stan licznika: <br>
		Stan paliwa: <br>
		Uwagi: <br><br><br><br>
		Podpis najemcy: <br>
		Podpis pracownika <br><br>
		
		</div>
		</div>
		<br><br><br>
		
		<div class=\"left\">Podpis Wynajmującego: ......................</div>
		<div class=\"right\">Podpis najemcy: ......................</div>

		</html>";
 }
 
 function DajNiepotwierdzoneRezerwacje(){
  return ZapytajBazeODaneNiepotwierdzonychRezerwacji();
 }
 
 function UsunRezerwacje($idRezerwacji){
  return $parserOdpowiedziMySQL -> KazBazieUsunacRezerwacje($idRezerwacji);
 }
}

?>