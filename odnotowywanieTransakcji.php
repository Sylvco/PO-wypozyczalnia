<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Odnotowywanie Transakcji</title>

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


   	<form action="odnotujTransakcje.php" method="POST">
  <table>
  <tr>
      <td align='right'>	<select name="typTransakcji">
	 <option name="odbior">Odbiór Samochodu</option>
	 <option name="zwrot">Zwrot Samochodu</option>
	</select></td>
      <td align='left'>Typ transakcji</td>

    </tr>
    <tr>
     <td align='right'><input type="text" name="idRezerwacji" required></td>
      <td align='left'>Numer rezerwacji</td>

    </tr>


  </table>

	<input style='margin-left: 10px' type="submit" value="Odnotuj">
</form>

	

</body>
</html>