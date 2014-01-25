<?php

require_once("ParserOdpowiedziMySQL.php");

session_start();

if(isset($_POST['login']) && isset($_POST['haslo']))
 checkLoginAndPassword();

header('Location: konto.php');

function checkLoginAndPassword(){
 $answer = checkLoginAndPasswordFor("klienci", "klient", "ZapytajBazeODaneKlienta");
 if(!$answer)
  $answer = checkLoginAndPasswordFor("pracownicy", "pracownik", "ZapytajBazeODanePracownika");
}

function checkLoginAndPasswordFor($table, $arrayKey, $clientFunction){
 $foundTheMan = false;
 $parserOdpowiedziMySQL = new ParserOdpowiedziMySQL();
 $recordQuantity = $parserOdpowiedziMySQL -> ZapytajBazeOIloscWierszyW($table);
 for($i = 2; !$foundTheMan && $i <= $recordQuantity+1; $i++){
	$client = $parserOdpowiedziMySQL -> $clientFunction($i);
	if($client -> login == $_POST['login'] && $client -> haslo == $_POST['haslo']){
	 $foundTheMan = true;
	 echo "Zalogowano: ".$_POST['login'];
	 $_SESSION[$arrayKey] = $client;
	 
    }
 
 }
  return $foundTheMan;
}

?>