<?php

require("ObslugaKwerendMySQL.php");

$obslugaKwerend = new ObslugaKwerendMySQL();
if(isset($_POST['idRezerwacji'])){
 $kwerenda = 'DELETE FROM rezerwacje WHERE idRezerwacji="'.$_POST['idRezerwacji'].'"';
 $obslugaKwerend -> ObsluzKwerendeUsuwajaca($kwerenda);
}

header('Location: kontoKlienta.php');

?>