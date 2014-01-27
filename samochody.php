<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="carlist_style.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">

</head>


<body>
    <header>
    <?php session_start();
	    $value =  $_POST['login'];
		$_SESSION['login'] =  $value;
    	?>
 <nav>
		<div>
			<span><a href="home.php">Strona główna</a></span>
			<span><a href="samochody.php">Samochody</a></span>
			<span><a href="cennik.php">Cennik</a></span>
			<span><a href="faq.php">FAQ</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span id="aliged_right_menu_item"><a href="konto.php">Konto</a></span>
		</div>
		
	</nav><br><br><br><br>
	
	</header>
<?php

require_once("ObslugaKwerendMySQL.php");
require_once("ParserOdpowiedziMySQL.php");

$sql = "SELECT * FROM samochody";
$obslugaKwerend = new ObslugaKwerendMySQL();
$parserOdpowiedzi = new ParserOdpowiedziMySQL();
$resource = $obslugaKwerend -> ObsluzKwerendePytajaca($sql);
$iloscRekordow = mysql_num_rows($resource);

 echo "
 <div id='selectiondiv'>
 <p class='item_p'><h3>Kategoria: </h3></p>
<select>
  <option value='all'>All</option>
  <option value='B'>B</option>
  <option value='A'>B</option>
  <option value='S'>S</option>
</select>
</div>";
  echo "<div id='maindiv'>
<div id='relativediv'>";
$counter = 2;
while($counter<=$iloscRekordow+1){
  $auto = $parserOdpowiedzi -> ZapytajBazeODaneSamochodu($counter);
  $category     = $auto -> kategoria;
  $make    = $auto -> marka;
  $model     = $auto -> model;
  $year = $auto -> rocznik;
  $gasusage    = $auto -> spalanie;
  $price    = $parserOdpowiedzi -> SprawdzCeneKategorii($category);
  $photo    = $auto -> obrazek;
  $id = $auto -> idSamochodu;



echo "
<div class='centre'>
<img class='column1' src='".$photo."' alt='CAR' width='100' height='100'>

<div class='column2'>
<p class='item_p'>Kategoria: ".$category."</p>
<p class='item_p'>Marka: ".$make."</p>
<p class='item_p'>Model: ".$model."</p>
<p class='item_p'>Rocznik: ".$year."</p>
<p class='item_p'>Spalanie ".$gasusage." L</p>
</div>
<p>Cena bazowa ".$price." zł/dzień</p>
<form action='rezerwuj.php' method='POST'>
<input type='hidden' value='".$id."' name='idSamochodu'>
<input type='submit' value='Rezerwuj'>
</form>
</div>
";
$counter++;
}

echo "</div></div>"
?>

</body>
</html>