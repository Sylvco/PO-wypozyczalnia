<?php

require_once("ObslugaKwerendMySQL.php");
require_once("ParserOdpowiedziMySQL.php");

$obslugaKwerend = new ObslugaKwerendMySQL();

$samochod = $_POST['samochod'];
$miejsceOdbioru = $_POST['miejsceOdbioru'];

$samochod = explode(' ', $samochod);
$model = '';
for($i=1;$i<count($samochod);$i++)
 $model .= $samochod[$i].' ';
$model = rtrim($model, ' '); 

$kwerenda = 'SELECT * FROM samochody WHERE Marka="'.$samochod[0].'" AND Model="'.$model.'" AND Adres="'.$miejsceOdbioru.'"';
$resource = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
$quant = mysql_num_rows($resource);
if($quant>0){
 session_start();
 
 $miejsceZwrotu = $_POST['miejsceZwrotu'];
 $dataZwrotu = $_POST['dataZwrotu'];
 $dataOdbioru =$_POST['dataOdbioru'];
 $znalezionySamochod = mysql_fetch_row($resource);
 $_SESSION['idSamochodu'] = $znalezionySamochod[0][0];
 $_SESSION['miejsceOdbioru'] = $miejsceOdbioru;
 $_SESSION['dataOdbioru'] = $dataOdbioru;
 $_SESSION['miejsceZwrotu'] = $miejsceZwrotu;
 $_SESSION['dataZwrotu'] = $dataZwrotu;
 header('Location: rezerwuj.php');
}else{
 echo "<meta charset='utf-8' ><br><br><br><center>Nie posiadamy wybranego samochodu w wybranej lokalizacji. Przepraszamy.</center>";
 header('Refresh: 20; URL=home.php');
}

?>