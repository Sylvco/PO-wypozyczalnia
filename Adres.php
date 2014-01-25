<?php

class Adres {
 $kodPocztowy,
 $NazwaMiejscowosci,
 $nazwaUlicy,
 $numerLokalu,
 $kraj;
 
 function Adres($kodPocztowy, $NazwaMiejscowosci, $nazwaUlicy, $numerLokalu, $kraj;){
  $this -> kodPocztowy = $kodPocztowy;
  $this -> nazwaMiejscowosci = $nazwaMiejscowosci;
  $this -> nazwaUlicy = $nazwaUlicy;
  $this -> numerLokalu = $numerLokalu;
  $this -> kraj = $kraj;
 }
}

?>