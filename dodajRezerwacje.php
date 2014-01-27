<?php

require_once("Klient.php");
require_once("ObslugaKwerendMySQL.php");

session_start();

if(isset($_POST['dataOdbioru'])){
  $_SESSION['dataOdbioru'] = $_POST['dataOdbioru'];
  $_SESSION['miejsceZwrotu'] = $_POST['miejsceZwrotu'];
  $_SESSION['dataZwrotu'] = $_POST['dataZwrotu'];
}
 
if(isset($_SESSION['klient'])){
 $idKlienta = $_SESSION['klient'] -> idKlienta;
 dodajRezerwacje($idKlienta);
}else{
 $_SESSION['rezerwuje'] = 1;
 header('Location: logowanie.php');
}

function dodajRezerwacje($idKlienta){
 $obslugaKwerend = new ObslugaKwerendMySQL();
 $cena = $_SESSION['cena'];
 if($_SESSION['klient']->iloscZamowien>4)
  $cena = 0.9 * $cena;
 $kaucja = $_SESSION['kaucja'];
 $dataOdbioru = $_SESSION['dataOdbioru'];
 $dataZwrotu = $_SESSION['dataZwrotu'];
 $idSamochodu = $_SESSION['idSamochodu'];
 $miejsceOdbioru = $_SESSION['miejsceOdbioru'];
 $miejsceZwrotu = $_SESSION['miejsceZwrotu'];
 $kwerenda = 'INSERT INTO rezerwacje (Od, Do, Potwierdzone, WysokoscOplaty, WysokoscKaucji, SamochodOdebrany, SamochodZwrocony, Klient, Pracownik, Samochod, MiejsceOdbioru, MiejsceZwrotu) 
                              VALUES ("'.$dataOdbioru.'","'.$dataZwrotu.'","0","'.$cena.'","'.$kaucja.'","0","0","'.$idKlienta.'","0","'.$idSamochodu.'","'.$miejsceOdbioru.'","'.$miejsceZwrotu.'")';
 $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 CzyscSesje();
 echo "<center><meta charset='utf-8'><br><br><br>Pomyślnie zarezerwowano samochód.</center>";
 header('Refresh:5; URL=konto.php');
}

function CzyscSesje(){
 CzyscPoleSesji('cena');
 CzyscPoleSesji('kaucja');
 CzyscPoleSesji('dataOdbioru');
 CzyscPoleSesji('dataZwrotu');
 CzyscPoleSesji('miejsceOdbioru');
 CzyscPoleSesji('miejsceZwrotu');
 CzyscPoleSesji('idSamochodu');
}

function CzyscPoleSesji($pole){
 unset($_SESSION[$pole]);
}

?>