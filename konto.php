<?php

require_once('logowanie.php');
require_once('kontoKlienta.php');
require_once('kontoPracownika.php');

$headTo = "logowanie.php";

if(isset($_SESSION['klient']))
 $headTo = "kontoKlienta.php";
else if(isset($_SESSION['pracownik']))
      $headTo = "kontoPracownika.php";

header("Location: $headTo");
?>