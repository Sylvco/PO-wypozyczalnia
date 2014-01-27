<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Rejestracja</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="style.css" rel="stylesheet">
	<link href="home.css" rel="stylesheet">



<style>

</style>
<script src="datepicker.js"></script>


</head>


<body>
    <header>
    <?php session_start();
	    $value =  $_POST['login'];
		$_SESSION['login'] =  $value;
    	?>
	<nav>
		<div>
			<span><a href="home.php">Home</a></span>
			<span><a href="samochody.php">Samochody</a></span>
			<span><a href="cennik.php">Cennik</a></span>
			<span><a href="faq.php">FAQ</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span id="aliged_right_menu_item"><a href="konto.php">Konto</a></span>
		</div>
		
	</nav>
	
	</header>
	<br><br><br>
	<div id="blok">
	
	<form action="sprawdzDostepnoscRezerwacji.php" method="POST">
	
	Samochód: <select name="samochod">
				<?php DajListeSamochodow(); ?>
			  </select>
    <br>
	Miejsce odbioru: <select name="miejsceOdbioru">
						<?php DajListeMiejsc(); ?>
					 </select>
	<br>
	Data odbioru: <input type="date" name="dataOdbioru" require>
	<br>
	Miejsce zwrotu: <select name="miejsceZwrotu">
						<?php DajListeMiejsc(); ?>
					 </select>
	<br>
	Data zwrotu: <input type="date" name="dataZwrotu" require>
	<input type="submit" value="Rezerwuj">
	</form>
	
	</div>

</body>

</html>

<?php
function DajListeSamochodow(){
 require_once("ObslugaKwerendMySQL.php");

 $obslugaKwerend = new ObslugaKwerendMySQL();
 $kwerenda = 'SELECT DISTINCT Marka, Model FROM samochody';
 $resource = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 $quant = mysql_num_rows($resource);
 for($i = 0; $i < $quant; $i++){
  $samochod = mysql_fetch_row($resource);
  echo '<option>'.$samochod[0].' '.$samochod[1].'</option>';
 }
}

function DajListeMiejsc(){
 require_once("ObslugaKwerendMySQL.php");

 $obslugaKwerend = new ObslugaKwerendMySQL();
 $kwerenda = 'SELECT DISTINCT Adres FROM samochody';
 $resource = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 $quant = mysql_num_rows($resource);
 for($i = 0; $i < $quant; $i++){
  $adres = mysql_fetch_row($resource);
  echo '<option>'.$adres[0].'</option>';
 }
}

?>