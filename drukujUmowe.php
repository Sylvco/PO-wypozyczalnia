<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Drukowanie Umowy</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="menu.css" rel="stylesheet">

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
		
		
</body>
</html>

<?php

require_once("SystemObslugiRezerwacji.php");

$SOR = new SystemObslugiRezerwacji();

$SOR -> GenerujUmoweWypozyczenia($_POST['idRezerwacji']);

?>