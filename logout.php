<?php

session_start();

unset($_SESSION['klient']);
unset($_SESSION['pracownik']);

header('Location: logowanie.php');
?>