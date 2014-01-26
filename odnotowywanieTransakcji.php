<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Odnotowywanie Transakcji</title>

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
	
	<form action="odnotujTransakcje.php" method="POST">
	
	<select name="typTransakcji">
	 <option name="odbior">Odbiór Samochodu</option>
	 <option name="zwrot">Zwrot Samochodu</option>
	</select>Typ transakcji
	<br>
	<input type="text" name="idRezerwacji" required>Numer rezerwacji
	<br><br>
	<input type="submit" value="Odnotuj">
	</form>
		
</body>
</html>