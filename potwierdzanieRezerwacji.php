<?php
 require_once("Rezerwacja.php");
 require_once("Pracownik.php");
 require_once("SystemObslugiRezerwacji.php");
 
 session_start();
 
 $SOR = new SystemObslugiRezerwacji();
 $niepotwierdzoneRezerwacje = $SOR -> DajNiepotwierdzoneRezerwacje();
 
 $_SESSION['niepotwierdzoneRezerwacje'] = $niepotwierdzoneRezerwacje;
 $pracownik = $_SESSION['pracownik'];
 
 $numerRezerwacji = 0;
 if(isset($_SESSION['numerRezerwacji']))
  $numerRezerwacji = $_SESSION['numerRezerwacji'];
 else {
  $numerRezerwacji = 1;
  $_SESSION['numerRezerwacji'] = 1;
 }
 
 $aktualnaRezerwacja = $niepotwierdzoneRezerwacje[$numerRezerwacji-1];
?>

<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Potwierdzanie Rezerwacji</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="style.css" rel="stylesheet">

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
	<?php  DajIloscRezerwacji(); ?>
	<form action="zmienNumerNiepotwierdzonejRezerwacji.php" method="POST">
	
	<input type="submit" value="Poprzednia" name="left" <?php DezaktywujEwentualniePoprzedni(); ?> >
	<input type="submit" value="Następna" name="right" <?php DezaktywujEwentualnieNastepny(); ?> >
	
	</form>
	
	<br><br><br>
	Rezerwacja numer: <?php echo $aktualnaRezerwacja->idRezerwacji ?><br>
	Numer klienta: <?php echo $aktualnaRezerwacja->idKlienta ?><br>
	<br><br><br>
	Data odbioru: <?php echo $aktualnaRezerwacja->odKiedy ?><br>
	Miejsce odbioru: <?php echo $aktualnaRezerwacja->miejsceOdbioru ?><br>
	<br><br>
	Data zwrotu: <?php echo $aktualnaRezerwacja->doKiedy ?><br>
	Miejsce zwrotu: <?php echo $aktualnaRezerwacja->miejsceZwrotu ?><br>
	<br>
	Numer samochodu: <?php echo $aktualnaRezerwacja->idSamochodu ?><br>
	<br><br>
	<form action="zatwierdzRezerwacje.php" method="POST">
	<input type="hidden" name="idRezerwacji" value="<?php echo $aktualnaRezerwacja->idRezerwacji ?>">
	<input type="submit" value="Zatwierdź rezerwację">
	</form>
		
</body>
</html>

<?php

require_once('Rezerwacja.php');

function DajIloscRezerwacji(){ 
 $numerRezerwacji = $_SESSION['numerRezerwacji'];
 
 $iloscNiepotwierdzonychRezerwacji = $_SESSION['niepotwierdzoneRezerwacje'] instanceOf Rezerwacja ? 1 : count($_SESSION['niepotwierdzoneRezerwacje']);
 echo $numerRezerwacji.' / '.$iloscNiepotwierdzonychRezerwacji;
}

function DezaktywujEwentualniePoprzedni(){
 $numerRezerwacji = $_SESSION['numerRezerwacji'];
 if($numerRezerwacji==1)
  echo 'disabled="disabled"';
}

function DezaktywujEwentualnieNastepny(){
 $numerRezerwacji = $_SESSION['numerRezerwacji'];
 $iloscNiepotwierdzonychRezerwacji = $_SESSION['niepotwierdzoneRezerwacje'] instanceOf Rezerwacja ? 1 : count($_SESSION['niepotwierdzoneRezerwacje']);
 if($numerRezerwacji==$iloscNiepotwierdzonychRezerwacji)
  echo 'disabled="disabled"';
}

?>