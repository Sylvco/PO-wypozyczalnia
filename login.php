<?php

require_once("ParserOdpowiedziMySQL.php");

if(isset($_POST['login']) && isset($_POST['haslo']))
 checkLoginAndPassword();

function checkLoginAndPassword(){
 $login = $_POST['login'];
 $password = $_POST['haslo'];
 
 $foundTheClient = false;
 $parserOdpowiedziMySQL = new ParserOdpowiedziMySQL();
 $clientQuantity = $parserOdpowiedziMySQL -> ZapytajBazeOIloscWierszyW("klienci");
 for($i = 2; !$foundTheClient && $i <= $clientQuantity+1; $i++){
	$client = $parserOdpowiedziMySQL -> ZapytajBazeODaneKlienta($i);
	if($client -> login == $login && $client -> haslo == $password){
	 $foundTheClient = true;
	 echo "Zalogowano: ".$login;
	 $_SESSION['zalogowanyKlient'] = $client;
	}else{
	 //TODO
	}
 } 
}

?>