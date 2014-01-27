<!DOCTYPE HTML>
		<script type="text/javascript">
    $("#faqs dd").hide();
    $("#faqs dt").click(function () {
        $(this).next("#faqs dd").slideToggle(500);
        $(this).toggleClass("expanded");
    });
</script>
<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree</title>

	<meta name="description" content="Strona wypożyczalni">



	<link href="faq.css" rel="stylesheet">
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
<!-- 	<br><br><br><br><br>
	<div id="scroll">
	<?php
	 WypiszPytania();
	?>
	</div> -->
		<h2>FAQ</h2>
	<div id="scroll">

	<dl id="faqs">
  <dt>Od ilu wypożyczeń przysługuje zniżka?</dt>
  <dd>Od pięciu wypożyczeń.</dd>
 
  <dt>Co oznacza, iż rezerwacja jest niepotwierdzona?</dt>
  <dd>Oznacza to, iż pracownik musi się jeszcze upewnić, że dane związane z rezerwacją są poprawne.</dd>
 
  <dt>Co oznaczają kategorie?</dt>
  <dd>Od kategorii zależy dzienna stawka.</dd>

  <dt>Jak wysoka jest zniżka?</dt>
  <dd>Zniżka wynosi 10%.</dd>

  <dt>Czym różni się wypożyczenie długoterminowe od krótkoterminowego?</dt>
  <dd>Wypożyczenie długoterminowe to wypożyczenie trwające co najmniej 14 dni.</dd>

   <dt>Czy mogę mieć dwie rezerwację na raz?</dt>
  <dd>Oczywiście, że tak.</dd>

   <dt>Czy mogę wypożyczyć samochód dla kogoś?</dt>
  <dd>Tak, lecz na Pana/Pani odpowiedzialność.</dd>
</dl>
</div>
</body>
</html>

<?php

function WypiszPytania(){
 $pytania = array('Od ilu wypożyczeń przysługuje zniżka?',
				  'Co oznacza, iż rezerwacja jest niepotwierdzona?', 
				  'Co oznaczają kategorie?', 
				  'Jak wysoka jest zniżka?',
				  'Czym różni się wypożyczenie długoterminowe od krótkoterminowego?',
				  'Czy mogę mieć dwie rezerwację na raz?',
				  'Czy mogę wypożyczyć samochód dla kogoś?');
 $odpowiedzi = array('Od pięciu wypożyczeń.',
					 'Oznacza to, iż pracownik musi się jeszcze upewnić, że dane związane z rezerwacją są poprawne.',
					 'Od kategorii zależy dzienna stawka.',
					 'Zniżka wynosi 10%.',
					 'Wypożyczenie długoterminowe to wypożyczenie trwające co najmniej 14 dni.',
					 'Oczywiście, że tak.',
					 'Tak, lecz na Pana/Pani odpowiedzialność.');
					 
 for($i = 0; $i < count($pytania); $i++){
  echo '<div id="blok"><div id="trescPytania">'.$pytania[$i].'</div><br>
	    <div id="odpowiedz">'.$odpowiedzi[$i].'</div></div>';
 }
}

?>