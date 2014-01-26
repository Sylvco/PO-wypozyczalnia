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
			<span><a href="home.php">Strona Główna</a></span>
			<span><a href="samochody.php">Samochody</a></span>
			<span><a href="cennik.php">Cennik</a></span>
			<span><a href="faq.php">FAQ</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span id="aliged_right_menu_item"><a href="konto.php">Konto</a></span>
		</div>
		
	</nav>
	
	</header>
	
	<div class="content">

		<div id="formularz_logowania">
			<h2>Witaj <?php echo $_POST['login'];?>!</h2>
			<p>Wprowadź swoje dane, aby się zalogować.</p>
			<form action="login.php" method="post">
				<p>
					Login:&ensp;<input type="text" name="login" id="login" required><br>
					Hasło:&ensp;<input type="password" name="haslo" required>
				</p>
				<input type="submit" value="Zaloguj">
				<input type="reset" value="Czyść">
			</form>
		</div>
	</div>

	<footer class="down">
		&copy; 2014 Fiołka, Ujma 
		</footer>
		
</body>
</html>