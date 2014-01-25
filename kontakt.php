<!DOCTYPE HTML>

<html>



<head>
	<meta charset="utf-8">
	<title>Klub fitness | Kontakt</title>

	<meta name="description" content="Strona Fitness Clubu">

	<link href="style.css" rel="stylesheet">

</head>


<body>

<?php 
    include('validate.php');
    include('match.php');
    include('sendmail.php');
?>

    <header>
	<nav>
		<div>
			<span><a href="home.php">Home</a></span>
			<span><a href="instruktorzy.html">Instruktorzy</a></span>
			<span><a href="grafik.html">Grafik</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span><a href="onas.html">O Nas</a></span>
		</div>
	</nav>
	<div id="extra_header"></div>
	</header>

	<div class="content" id="contact">
		
		<div id="address">
			<h3>Dane</h3>
			<p>Fitness Club<br><a href="download/regulamin.txt" download="regulamin.txt" target="_blank">Ściągnij regulamin</a></p>
			<h4>Adres:</h4>
			<p>Powstańców Sląski 31<br>52-121, Zimbabwe</p>
			<h4>Kontakt:</h4>
			<p>Telefon: 724-435-345<br>e-mail: <a href="mailto:klubfitness@example.zim">klubfitness@example.zim</a></p>

			<div>
			<form autocomplete="on" name="contact_form"  method="post">

				<?php
					if (isset($_POST['submit']) && $error == '') {
						echo "<p class='success'><b>Formularz przeszedł walidację.</b></p>";
					} else echo $error;

					if(@$matches) echo "Imie i nazwisko zawiera sie w mailu.";
					if(@$mail_status) echo "<b>Mail został poprawnie wysłany.</b>";
        		?>
				<!--<form autocomplete="on" action="kontakt.php" method="post">-->

					<h3>Formularz kontaktowy</h3>

					<!--Imię i nazwisko:<input type="text" name="imie_nazwisko" placeholder="Imię i Nazwisko" required><br>
					E-mail:<input type="email" name="email" placeholder="nazwa@przyklad.pl" required><br>
					Treść:<br><textarea name="messeage" maxlength="300" rows=3 cols=40 placeholder="Tutaj wpisz swoją wiadomość (max. 300 znaków)." required></textarea> -->

					Imię i nazwisko:<input type="text" value="<?=@$imie_nazwisko?>" name="imie_nazwisko" placeholder="Imię i Nazwisko" required><br>
					E-mail:<input type="email" value="<?=@$email?>" name="email" placeholder="nazwa@przyklad.pl" required><br>
					Treść:<br><textarea name="message" maxlength="300" rows=3 cols=40 
					value="<?=@$message?>"
					placeholder="Tutaj wpisz swoją wiadomość (max. 300 znaków)." required></textarea>
					
					<p>Czy jesteś już naszym klientem?<br>
					<input type="radio" name="client" value="client_yes" checked>Tak<br>
					<input type="radio" name="client" value="client_no">Nie
					</p>

					<p>Jakie zajęcia Cię interesują?<br>
					<input type="checkbox" name="client_interests" value="areobics">Areobowe<br>
					<input type="checkbox" name="client_intrests" value="strengh">Siłowe
					</p>
					<p>Kto jest Twoim intruktorem?<br>
						<select name="inst_who">
							<option value="inst_1">Instruktor 1</option>
							<option value="inst_2">Instruktor 2</option>
							<option value="inst_3">Instruktor 3</option>
							<option value="nobody" selected>Jeszcze nie mam</option>
						</select>					
					</p>
					<input type="submit" name='submit' value="Wyślij">
					<input type="reset" value="Wyczyść">
				</form>


        		<?php var_dump($_POST); ?>
			</div>

		</div>
	
		<div id="map">
			<iframe width="425" height="350" frameborder="0" scrolling="yes" marginheight="0" marginwidth="0" src="https://www.google.pl/maps?t=m&amp;ie=UTF8&amp;ll=-8.880037,13.255928&amp;spn=0.006201,0.010568&amp;z=17&amp;output=embed"></iframe><br />
			<small><a href="https://www.google.pl/maps?t=m&amp;ie=UTF8&amp;ll=-8.880037,13.255928&amp;spn=0.006201,0.010568&amp;z=17&amp;source=embed" style="color:#0000FF;text-align:left">Wyświetl większą mapę</a></small>
		</div>
		
	</div>

		<div class="footer">
		<footer>
		&copy; 2013 Patalas, Ujma 
		</footer>
	</div>
</body>

<?php die(); ?>
</html>