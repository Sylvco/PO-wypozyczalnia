<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Rejestracja</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="style.css" rel="stylesheet">
	<link href="home.css" rel="stylesheet">



<style>

</style>
<script src="datepicker.js"></script>


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
	<br><br><br>
  <div id='wrapper'>
	<div id="blok">

	<form action='register.php' method='post'>
  <h2>Zarezerwuj samochód</h2>
  <table>
  <tr>
      <td align='right'>Samochód</td>
      <td align='left'><select name="samochod">
        <?php DajListeSamochodow(); ?>
        </select></td>

    </tr>
    <tr>
     <td align='right'>Miejsce odbioru</td>
      <td align='left'><select name="miejsceOdbioru">
            <?php DajListeMiejsc(); ?>
           </select></td>

    </tr>
    <tr>
      <td align='right'>Data odbioru</td>
      <td align='left'><input type="date" name="dataOdbioru" require>
					 </select></td>

    </tr>
    <tr>
       <td align='right'>Miejsce zwrotu</td>
      <td align='left'><select name="miejsceZwrotu">
            <?php DajListeMiejsc(); ?>
           </select></td>

    </tr>

    <tr>
      <td align='right'>Data zwrotu</td>
      <td align='left'><input type="date" name="dataZwrotu" require>
					 </select></td>

    </tr>
  </table>

<input type="submit" value="Rezerwuj">
</form>	
	
	</div>
<div id="onas">
<h3>O NAS</h3><br>
  Nasza firma to wypożyczalnia samochodów osobowych i dostawczych w Łodzi, Warszawie i Poznaniu,  możliwy jest również odbiór i zwrot samochodu w dowolnym mieście na terenie naszgo kraju.
Oferujemy wynajem zarówno krótko jak i długoterminowy. Oferta wynajmu skierowana jest do osób prywatnych a także firm.
Nasze ceny są konkurencyjne a świadczone usługi na najwyższym poziomie.
Kiedy potrzbny jest samochód na wyjazd rodzinny, samochód zastępczy na czas naprawy Państwa pojazdu, kiedy trzeba przewieźć coś większego i cięższego, kiedy w firmie nie kalkuje się leasing wtedy warto skorzystać z naszej wypożyczalni samochodów i po prostu wynająć auto.
Dziękujemy za okazane zaufanie i mamy nadzieję, że zaowocuje ono dobrą współpracą ze szczególnym naciskiem na Państwa zadowolenie i satysfakcję.
Zapraszamy do wypożyczania samochodów.
Prowadzimy wynajem aut na obszarze całego kraju, tj. Białystok, Bydgoszcz, Gdańsk, Gdańsk lotnisko Rębiechowo, Gorzów Wielkopolski, Katowice Miasto, Katowice lotnisko Pyrzowice, Kielce, Kołobrzeg, Kraków Miasto, Kraków lotnisko Balice, Lublin, Łódź, Łódź lotnisko Lublinek, Olsztyn, Opole, Poznań Miasto, Poznań lotnisko Ławica, Rzeszów. Można u nas wypożyczyć samochód miejski jak Skoda Citigo 1.0,  Vw up!, samochód sportowy Mercedes SLK 250 CGI Sport Coupe, auta segmentu D jak VW Passat, Opel Insignia samochody luksusowe BMW X6, Jaguar XF, Jeep Grand Cherokee  jak również samochody dostawcze Fiat Ducato.
Samochód jesteśmy w stanie dowieźć w każde miejsce w Polsce, wynajem samochodów mozę być nawet z kierowcą.
Wypożyczalnia samochodów Łódź, wynajem samochodów, wypożyczalnia samochodów, wynajem samochodu, wynajem samochodow, wypożyczalnia aut, wypożyczalnie samochodów, wypożyczalnia samochodów warszawa, wynajem samochodów warszawa, wypozyczalnia samochodów, wypozyczalnie samochodow, wypożyczalnia samochodów Kraków, wynajem samochodów Kraków, wypożyczalnia samochodów dostawczych Łódź, wypożyczalnia samochodów Poznań, wypożyczalnia samochodów Wrocław, samochody wynajem, wyporzyczalnia samochodów. wynajem samochodów dostawczych Łódź, wyporzyczalnia samochodow, wypożyczalnia samochodów Gdańsk, wypożyczalnia samochodów Katowice, wypożyczanie samochodów Łódź, wypozyczalnia samochodow warszawa, wynajem samochodów Katowice, wypozyczalnia samochodow krakow, wypożyczalnia samochodów szczecin, wynajem samochodów Gdańsk, wynajem samochodów Wrocław, wynajem samochodow warszawa, wynajem samochodu Łódź, wynajem samochodów Poznań, wypozyczalnie aut, wypożyczalnia samochodow, wypożyczalnie aut, wypozyczalnia samochodow Katowice, wypożyczalnia samochodów luksusowych, wynajem aut łódź, wypozyczalnia aut, wynajem długoterminowy łódź, wynajem auta, wynajem aut warszawa, wynajęcie samochodu łódź, samochód wynajem, wypożyczalnia aut warszawa, wynajecie samochodu w łodzi, wynajem aut Katowice, wypożyczalnia samochody, rent car poland, rent car in poland, rent a car lodz, rent a car in poland, autovermitung, autovermitung in polen, autovermitung in lodz.
Wypożyczenie w Speed Sp. z o.o. gwarantuje dobre i pewne samopoczucie i jakośc usługi.
Wypożyczenie Toyoty Aygo to zaledwie 49 zl/netto na dobę, w zamian dostajesz auto zwinne, oszczędne i nie odczuwasz dyskomfortu w kieszeni.
</div>
</div>
</body>

</html>

<?php
function DajListeSamochodow(){
 require_once("ObslugaKwerendMySQL.php");

 $obslugaKwerend = new ObslugaKwerendMySQL();
 $kwerenda = 'SELECT DISTINCT Marka, Model FROM samochody';
 $resource = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 $quant = mysql_num_rows($resource);
 for($i = 0; $i < $quant; $i++){
  $samochod = mysql_fetch_row($resource);
  echo '<option>'.$samochod[0].' '.$samochod[1].'</option>';
 }
}

function DajListeMiejsc(){
 require_once("ObslugaKwerendMySQL.php");

 $obslugaKwerend = new ObslugaKwerendMySQL();
 $kwerenda = 'SELECT DISTINCT Adres FROM samochody';
 $resource = $obslugaKwerend -> ObsluzKwerendePytajaca($kwerenda);
 $quant = mysql_num_rows($resource);
 for($i = 0; $i < $quant; $i++){
  $adres = mysql_fetch_row($resource);
  echo '<option>'.$adres[0].'</option>';
 }
}

?>