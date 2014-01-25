<?php

require_once("ObslugaKwerendMySQL.php");

class ObslugaTransakcji {
 private $obslugaKwerend;
 
 function ObslugaTransakcji(){
  $this -> obslugaKwerend = new ObslugaKwerendMySQL();
 }
 
 function ZanotujRezerwacje($rezerwacja){
  $kwerenda = "INSERT INTO Rezerwacje (DataZlozenia, Od, Do, Potwierdzone, SamochodOdebrany, SamochodZwrocony, Lokalizacja)
                                VALUES(".date( 'Y-m-d H:i:s', $rezerwacja -> $dataZlozenia ).",
								       ".date( 'Y-m-d H:i:s', $rezerwacja -> $od ).",
								       ".date( 'Y-m-d H:i:s', $rezerwacja -> $do ).",
								       0,
									   0,
									   0,
									   ".$rezerwacja -> $lokalizacja."
								      )";
  $obslugaKwerend -> ObsluzKwerendeAktualizujaca($kwerenda, "danych nowej rezerwacji");
 }
 
 function ZanotujOdbiorSamochodu($idRezerwacji){
  $kwerenda = "UPDATE Samochody SET SamochodOdebrany='1' WHERE IdRezerwacji='".$idRezerwacji."'";
  $obslugaKwerend -> ObsluzKwerendeAktualizujaca($kwerenda, "danych o odbiorze samochodu z rezerwacji o numerze: ".$idRezerwacji);
 }
 
 function ZanotujZwrotSamochodu($idRezerwacji){
  $kwerenda = "UPDATE Samochody SET SamochodOdebrany='1' WHERE IdRezerwacji='".$idRezerwacji."'";
  $obslugaKwerend -> ObsluzKwerendeAktualizujaca($kwerenda, "danych o odbiorze samochodu z rezerwacji o numerze: ".$idRezerwacji);
 }
 
 function ZanotujOplateZaWypozyczenie($idRezerwacji){
  //NIE JESTEM PEWNY CO MIAŁA TA METODA ROBIĆ, MOŻLIWE, ŻE POWIELIŁEM METODY MAJĄCE UIŚCIĆ OPŁATĘ...
 }
 
 function ZanotujPotwierdzenieRezerwacji($idRezerwacji){
  $kwerenda = "UPDATE Rezerwacje SET Potwierdzone='1' WHERE IdRezerwacji='".$idRezerwacji."'";
  $obslugaKwerend -> ObsluzKwerendeAktualizujaca($kwerenda, "potwierdzenie rezerwacji o numerze: ".$idRezerwacji);
 }
 
 function ZanotujUisczenieKaucji($idRezerwacji, $wysokoscKaucji){
  $kwerenda = "UPDATE Rezerwacje SET WysokoscKaucji='".$wysokoscKaucji."' WHERE IdRezerwacji='".$idRezerwacji."'";
  $obslugaKwerend -> ObsluzKwerendeAktualizujaca($kwerenda, "danych o uregulowaniu kaucji za rezerwację o numerze: ".$idRezerwacji);
 }
 
 function ZanotujUiszczenieOplatyZaWypozyczenie($idRezerwacji, $wysokoscOplaty){
  $kwerenda = "UPDATE Rezerwacje SET WysokoscOplaty='".$wysokoscOplaty."' WHERE IdRezerwacji='".$idRezerwacji."'";
  $obslugaKwerend -> ObsluzKwerendeAktualizujaca($kwerenda, "danych o uregulowaniu opłaty za wypożyczenie o numerze: ".$idRezerwacji);
 }
}

?>