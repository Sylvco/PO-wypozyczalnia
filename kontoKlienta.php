<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Twoje Konto</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="kontoKlienta.css" rel="stylesheet">

</head>


<body>
    <header>
	<nav>
		<div>
			<span><a href="home.php">Strona główna</a></span>
			<span><a href="samochody.php">Samochody</a></span>
			<span><a href="cennik.php">Cennik</a></span>
			<span><a href="faq.php">FAQ</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span id="aliged_right_menu_item"><a href="logout.php">Wyloguj</a></span>
		</div>
		
	</nav>
	
	</header>
	
	<center>
	<br><br>
	<h1> Twoje Konto </h1>
	</center>
	<br><br><br><br>
	<font >
	Numer klienta: 
	
	<?php 
	require_once("Klient.php");
	session_start();
	$client = $_SESSION['klient'];
	echo $client -> idKlienta;
	?>
	
	</font>
	<br><br>
	<form action="updateClientsEmailAndNumber.php" method="post">
				<div id="form">
				<div id="leftForm">				    
					Numer kontaktowy:<br>
					Adres e-mail:
				</div>
				<div id="rightForm">
				<input type="text" name="numer" value="<?php echo $client -> numerTelefonu;?>" required> <br>
				<input type="text" name="email" id="login" value="<?php echo $client -> email;?>" required>
				</div>
				</div>
				<br><br><br><br>
				<div id="button"> <input type="submit" value="Zmień dane"> </div>
	</form>
	<br><br><br><br>
	<center>Ostatnie Rezerwacje</center><br>
	<div id="listaRezerwacji">

    <?php 
	 DajBlokiRezerwacji();
	?>

    </div>
		
</body>
</html>

<?php


function DajBlokiRezerwacji(){
 require_once("ParserOdpowiedziMySQL.php");
 require_once("ObslugaKwerendMySQL.php");
 require_once("Rezerwacja.php");
 
 
 $client = $_SESSION['klient'];
 $obslugaKwerend = new ObslugaKwerendMySQL();
 $parserOdpowiedzi = new ParserOdpowiedziMySQL();
 $kwerenda = 'SELECT * FROM rezerwacje WHERE Klient="'.$client->idKlienta.'" ORDER BY DataZlozenia DESC';
 
 $res = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 $rezerwacje = stworzObiektyRezerwacji($res);
 
 $kodBlokowRezerwacji = '';
 for($i = 0; $i < count($rezerwacje); $i++){
  $rezerwacja = $rezerwacje[$i];
  $samochod = $parserOdpowiedzi -> ZapytajBazeODaneSamochodu($rezerwacja->idSamochodu);
  $kodBlokowRezerwacji .= DajBlokRezerwacjiDla($rezerwacja, $samochod);
 }
 
 echo $kodBlokowRezerwacji;
}

function StworzObiektyRezerwacji($resource){
 $rows = mysql_num_rows($resource);
 for($i = 0; $i < $rows; $i++){
  $tablicaZDanymiRezerwacji = mysql_fetch_row($resource);
  $rezerwacje[$i] = new Rezerwacja($tablicaZDanymiRezerwacji[0], $tablicaZDanymiRezerwacji[1],
								   $tablicaZDanymiRezerwacji[2], $tablicaZDanymiRezerwacji[3],
								   $tablicaZDanymiRezerwacji[4], $tablicaZDanymiRezerwacji[5],
								   $tablicaZDanymiRezerwacji[6], $tablicaZDanymiRezerwacji[7],
								   $tablicaZDanymiRezerwacji[8], $tablicaZDanymiRezerwacji[9],
						           $tablicaZDanymiRezerwacji[10], $tablicaZDanymiRezerwacji[11],
								   $tablicaZDanymiRezerwacji[12], $tablicaZDanymiRezerwacji[13]);
 }
 return $rezerwacje;
}

function DajBlokRezerwacjiDla($rezerwacja, $samochod){
 return '  <div id="blokRezerwacji">
						   
		   <div id="top"><p> 
		   Numer Rezerwacji: '.$rezerwacja -> idRezerwacji.'</p>
		   </div>
		   <div id="checkboxstyle"><input type="checkbox" disabled="disabled" '.DajChecked($rezerwacja).'> Potwierdzona</div>

		   <div style='margin-top: 30px; text-align: center;'>
		   <div class="column1">
		   <p>Marka: '.$samochod -> marka.'</p>
		   <p>Model: '.$samochod -> model.'</p>
		   </div>
		   <div class="column2">
		   <p>Data Odbioru: '.$rezerwacja -> odKiedy.'</p>
		   <p>Data Zwrotu: '.$rezerwacja -> doKiedy.'</p>
		   </div>
		   <div class="column3">
		   <p>Miejsce Odbioru: '.$rezerwacja -> miejsceOdbioru.'</p>
		   <p>Miejsce Zwrotu: '.$rezerwacja -> miejsceZwrotu.'</p>
		   </div>
		   </div>
		   <br>
		   
		   <form style='text-align: right;' action="usunRezerwacje.php" method="POST">
		   <input type="hidden" value="'.$rezerwacja->idRezerwacji.'" name="idRezerwacji">
		   <input type="submit" value="Anuluj rezerwację">
		   </form>
		   
		   </div><br>
		  ';
}

function UsunRezerwacje(){
 if(isset($_POST['idRezerwacji'])){
  echo "PRzeszło";
 }else{
  echo "Nie przeszło";
 }
}

function DajChecked($rezerwacja){
 if($rezerwacja->potwierdzone)
  return 'checked="checked"';
 else
  return '';
}
?>