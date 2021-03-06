<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Drukowanie Umowy</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="kontoKlienta.css" rel="stylesheet">

</head>


<body>
    <header>
	<nav>
		<div>
			<span><a href="odnotowywanieTransakcji.php">Odnotowywanie Transakcji</a></span>
			<span><a href="potwierdzanieRezerwacji.php">Potwierdzanie Rezerwacji</a></span>
			<span><a href="drukowanieUmowy.php">Drukowanie Umowy</a></span>
			<span id="aliged_right_menu_item"><a href="konto.php">Konto</a></span>
		</div>
		
	</nav> <br><br><br><br>
	
	</header>
		
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
 
 
 $obslugaKwerend = new ObslugaKwerendMySQL();
 $parserOdpowiedzi = new ParserOdpowiedziMySQL();
 $kwerenda = 'SELECT * FROM rezerwacje ORDER BY DataZlozenia DESC';
 
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
		   
 			<form style='text-align: right;' action="drukujUmowe.php" method="POST">
		   <input type="hidden" value="'.$rezerwacja->idRezerwacji.'" name="idRezerwacji">
		   <input type="submit" value="Drukuj umowę wypożyczenia">
		   </form>
		   
		   </div><br>
		  ';
}

function DajChecked($rezerwacja){
 if($rezerwacja->potwierdzone)
  return 'checked="checked"';
 else
  return '';
}

?>