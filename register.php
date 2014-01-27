<?php

require_once("ParserOdpowiedziMySQL.php");

session_start();



header('Location: rejestracja.php');

function checkRegistrationData(){
 $answer = checkIfLoginExists($_POST['login']);
 if(!$answer){
  performRegister();
  setcookie('registration','success';
}
else
	setcookie('registration','failed';
}

function performRegister(){
 
}

?>