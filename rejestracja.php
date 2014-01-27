<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<title>TwentyThree | Rejestracja</title>

	<meta name="description" content="Strona wypożyczalni">

	<link href="style.css" rel="stylesheet">
	<link href="rejestracjastyle.css" rel="stylesheet">



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
			<span><a href="stronaglowna.php">Home</a></span>
			<span><a href="samochody.php">Samochody</a></span>
			<span><a href="cennik.php">Cennik</a></span>
			<span><a href="faq.php">FAQ</a></span>
			<span><a href="kontakt.php">Kontakt</a></span>
			<span id="aliged_right_menu_item"><a href="konto.php">Konto</a></span>
		</div>
		
	</nav>
	
	</header>

<h1>Rejestracja w serwisie</h1>
<body>
<?php
if(!isset($_COOKIE['registration']) || $_COOKIE['registration'] == 'failed'){
	if($_COOKIE['registration'] == 'failed')
	echo "<center><h2>Rejestracja nieudana</h2><center>";
echo "
<div id='centertable'>
   <form action='register.php' method='post'>
  <table>
  <tr>
      <td align='right'>Login</td>
      <td align='left'><input type='text' name='login' required/></td>
      <td align='right'>Hasło</td>
      <td align='left'><input type='password' name='pass' required/></td>
    </tr>
    <tr>
     <td align='right'>Powtórz hasło</td>
      <td align='left'><input type='password' name='rpass' required/></td>
      <td align='right'>Kod pocztowy</td>
      <td align='left'><input type='text' name='zip' required/></td>
    </tr>
    <tr>
      <td align='right'>Imie</td>
      <td align='left'><input type='text' name='first' required/></td>
      <td align='right'>Ulica i numer domu</td>
      <td align='left'><input type='text' name='details' required/></td>
    </tr>
    <tr>
       <td align='right'>Nazwisko</td>
      <td align='left'><input type='text' name='last' required/></td>
      <td align='right'>Numer kontaktowy</td>
      <td align='left'><input type='tel' name='number' required/></td>
    </tr>

    <tr>
      <td align='right'>PESEL</td>
      <td align='left'><input type='text' name='pesel'required/></td>
      <td align='right'>Adres e-mail</td>
      <td align='left'><input type='email' name='email' required/></td>
    </tr>

    <tr>
    <td align='right'>Numer prawa jazdy</td>
      <td align='left'><input type='text' id='birthday' name='licenseNumber' size='20' required/></td>
      <td align='right'>Miasto</td>
      <td align='left'><input type='text' name='city' required/></td>
    </tr>

  </table>

<center><input type='submit' value='Zarejestruj'></center>
</form>

</div>";
}
else if($_COOKIE['registration']=='success'){
	echo "<center><h2>Rejestracja udana</h2><center>";
	header ("Refresh:5; URL=index.php");
}
?>

<body>

</body>
</html>