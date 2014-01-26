<?php

require_once("ObslugaKwerendMySQL.php");

$obslugaKwerend = new ObslugaKwerendMySQL();
if(isset($_POST['idRezerwacji'])){
 $idRezerwacji = $_POST['idRezerwacji'];
 $typTransakcji = $_POST['typTransakcji']=='Odbiór Samochodu' ? 'SamochodOdebrany' : 'SamochodZwrocony';
 $kwerenda = 'UPDATE rezerwacje SET '.$typTransakcji.'="1" WHERE idRezerwacji="'.$idRezerwacji.'"';
 
 $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
}

header('Location: odnotowywanieTransakcji.php');
?>