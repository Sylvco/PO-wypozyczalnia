<?php
require_once("ParserOdpowiedziMySQL.php");

$parserOdpowiedzi = new ParserOdpowiedziMySQL();
session_start();

if(isset($_POST['idSamochodu']))
 $_SESSION['idSamochodu'] = $_POST['idSamochodu'];

$samochod = $parserOdpowiedzi -> ZapytajBazeODaneSamochodu($_SESSION['idSamochodu']);

if(isset($_POST['dataOdbioru'])){
 $_SESSION['dataOdbioru'] = $_POST['dataOdbioru'];
 $_SESSION['dataZwrotu'] = $_POST['dataZwrotu'];
 $_SESSION['miejsceZwrotu'] = $_POST['miejsceZwrotu'];
}

?>

<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Rezerwacja</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="style.css" rel="stylesheet">
	<link href="rezerwuj.css" rel="stylesheet">



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
			<span><a href="home.php">Strona Główna</a></span>
			<span><a href="samochody.php">Samochody</a></span>
			<span><a href="cennik.php">Cennik</a></span>
			<span><a href="faq.php">FAQ</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span id="aliged_right_menu_item"><a href="konto.php">Konto</a></span>
		</div>
		
	</nav>
	
	</header>
	
	<br><br><br>
	<center>
	
	Samochód:<br>
	Marka: <?php echo $samochod->marka; ?><br>
	Model: <?php echo $samochod->model; ?><br>
	Spalanie: <?php echo $samochod->spalanie; ?><br>
	Rocznik: <?php echo $samochod->rocznik; ?><br>
	<br>
	<?php DajOdbiorIZwrot(); ?>
	<br><br>
	Opłata:<br>
	<?php DajCene(); ?>

	</center>

</body>

</html>

<?php


function DajOdbiorIZwrot(){
require_once('Klient.php');
require_once('Samochod.php');

$print = '';

if(isset($_SESSION['miejsceOdbioru'])){
 $miejsceOdbioru = $_SESSION['miejsceOdbioru'];
 $miejsceZwrotu = $_SESSION['miejsceZwrotu'];
 $dataOdbioru = $_SESSION['dataOdbioru'];
 $dataZwrotu = $_SESSION['dataZwrotu'];
 
 $print = 'Odbiór:<br>
		   Miejsce: '.$miejsceOdbioru.' <br>
		   Data: '.$dataOdbioru.' <br>
		   <br>
		   Zwrot:<br>
		   Miejsce: '.$miejsceZwrotu.' <br>
		   Data: '.$dataZwrotu.' <br>
		   <br>
		   <form action="dodajRezerwacje.php" method="POST">
		   <input type="submit" value="Potwierdź rezerwację">
		   </form>';
}else{
 $parserOdpowiedzi = new ParserOdpowiedziMySQL();
 $samochod = $parserOdpowiedzi -> ZapytajBazeODaneSamochodu($_SESSION['idSamochodu']);
 $adres = $samochod->adres;

 $print = '<form action="rezerwuj.php" method="POST">
		   Odbiór:<br>
		   Miejsce: '.$adres.' <br>
		   Data: <input type="date" name="dataOdbioru"> <br>
		   <br>
		   Zwrot:<br>
		   Miejsce: <select name="miejsceZwrotu">
		   '.DajListeMiejsc().'
		   </select><br>
		   Data: <input type="date" name="dataZwrotu"><br>
		   <br>
		   <input type="submit" value="Wylicz opłatę">
		   </form>';
 $_SESSION['miejsceOdbioru'] = $adres;
}

echo $print;

}

function DajListeMiejsc(){
 require_once("ObslugaKwerendMySQL.php");

 $obslugaKwerend = new ObslugaKwerendMySQL();
 $kwerenda = 'SELECT DISTINCT Adres FROM samochody';
 $resource = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 $quant = mysql_num_rows($resource);
 $ret = '';
 for($i = 0; $i < $quant; $i++){
  $adres = mysql_fetch_row($resource);
  $ret .= '<option>'.$adres[0].'</option>';
 }
 return $ret;
}

function DajCene(){
 if(isset($_SESSION['dataOdbioru'])){
 $dataZwrotu = strtotime($_SESSION['dataZwrotu']);
 $dataOdbioru = strtotime($_SESSION['dataOdbioru']);
 
 $roznicaDni = $dataZwrotu - $dataOdbioru;
 $roznicaDni = floor($roznicaDni/(60*60*24));
 $parserOdpowiedzi = new ParserOdpowiedziMySQL();
 $samochod = $parserOdpowiedzi -> ZapytajBazeODaneSamochodu($_SESSION['idSamochodu']);
 $kategoria = $samochod->kategoria;
 $stawka = $parserOdpowiedzi -> SprawdzCeneKategorii($kategoria);
 $cena = $stawka*$roznicaDni;
 if($roznicaDni>13)
  $cena = 0.75*$cena;
 $_SESSION['cena'] = $cena;
 if(isset($_SESSION['klient']) && $_SESSION['klient']->iloscZamowien>4)
  $cena = 0.9 * $cena;
 $kaucja = 5*$stawka;
 $_SESSION['kaucja'] = $kaucja;
 
 echo "Wypożyczenie: $cena zł<br>
       Kaucja: $kaucja zł";
 }
}




?>