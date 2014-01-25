<!DOCTYPE HTML>
<?php session_start();?>
<html>

<head>
	<meta charset="utf-8">
	<title>Klub fitness</title>

	<meta name="description" content="Wypożyczalnia samochodów">

	<link href="style.css" rel="stylesheet">

</head>


<body>
    <header>
    <?php 
    	if(!isset($_SESSION['login'])){
	    $value =  $_POST['login'];
		$_SESSION['login'] =  $value;
	}
    	?>
	<nav>
		<div>
			<span><a href="home.php">Home</a></span>
			<span><a href="instruktorzy.php">Instruktorzy</a></span>
			<span><a href="grafik.php">Grafik</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span><a href="onas.php">O Nas</a></span>
		</div>


		
	</nav>
	
	</header>
	
	<div class="content">
	<div id="banner">
		<img src="img/running.png" alt="Brak obrazka" class="log">
		<img src="img/exercise.png" alt="Brak obrazka" class="log">
		<img src="img/water.png" alt="Brak obrazka" class="log">
	</div>

	<div id="formularz_logowania"><div class="hello">
		<h2>Witaj <?php if(isset($_SESSION['login'])) echo $_SESSION['login'];?>!</h2>
	</div>

	<?php if(!isset($_SESSION['login'])){
		//$('formularz_logowania').css('display', 'none');
	 
echo "
		<div class=\"hello\">
			<p>Wprowadź swoje dane, aby się zalogować.</p>
			<form action=\"\" method=\"post\">
				<p>
					Login:&ensp;<input type=\"text\" name=\"login\" id=\"login\" required><br>
					Hasło:&ensp;<input type=\"password\" name=\"haslo\" required>
				</p>
				<input type=\"submit\" value=\"Zaloguj\">
				<input type=\"reset\" value=\"Czyść\">
			</form>
		</div>
	</div>";
	}
	else
		echo "<form action=\"logout.php\" method=\"get\">
	<input type=\"submit\" value=\"Wyloguj\">
	</form>";
?>
</div>
	<footer class="down">
		&copy; 2013 Patalas, Ujma 
		</footer>
		
</body>
</html>