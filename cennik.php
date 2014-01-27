<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree</title>

	<meta name="description" content="Strona wypożyczalni">

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
		
	</nav>
	
	</header>
<br><br><br><br><br>
<center>
<img src="tabela.png">
</center>
	
</body>
</html>