<?php

require_once("ParserOdpowiedziMySQL.php");

class ObslugaKwerendMySQL {
 private $connectionToDatabase;
 
 function ObslugaKwerendMySQL(){
   $databaseName = 'wypozyczalnia';
   $user = 'root';
   $pass = '';
   $host = 'localhost';
 
   $connectionToDatabase = mysql_connect($host, $user, $pass) or die("Błąd połączenia z bazą danych!");
   mysql_select_db($databaseName) or die("Baza danych o nazwie: ".$databaseName." nie istnieje!");
 }
 
 function ObsluzKwerendePytajaca($kwerenda){
  return mysql_query($kwerenda);
 }
 
 function ObsluzKwerendeAktualizujaca($kwerenda, $typTransakcji){
  $odpowiedzBazy = mysql_query($kwerenda);
  $wiadomoscDlaUzytkownika = $odpowiedzBazy ? "Aktualizacja ".$typTransakcji." w bazie danych powiodła się." : "Aktualizacja ".$typTransakcji." w bazie danych<u> nie</u> powiodła się.";
  ParserOdpowiedziMySQL::PrzekazOdpowiedzPotwierdzajacaZmiany($wiadomoscDlaUzytkownika);
 }
 
 function ObsluzKwerendeUsuwajaca($kwerenda){
  return mysql_query($kwerenda);
 }
}

?>