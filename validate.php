<?php
/*=============================================================*/
#### How to Validate Form with PHP - Server Side Validation ####
#### Author :   Arpan Das                                   ####
#### site   :   http://w3epic.com/                          ####
#### email  :   admin@w3epic.net                            ####
/*=============================================================*/
 
$error = "";
 
if (isset($_POST['submit'])) {
    $imie_nazwisko           = $_POST['imie_nazwisko'];
    $email                     = trim($_POST['email']);
    $message                =$_POST['message'];

 
        if (!ctype_alnum($imie_nazwisko)) {
            $error .= '<p class="error">Imię i nazwisko nie może mieć znaków specjalnych.</p>';
        }
        // if username is not 3-20 characters long, throw error
         if (strlen($imie_nazwisko) < 3 OR strlen($username) > 20) {
            $error .= '<p class="error">Imię musi zawierać 3-20 liter.</p>';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error .= '<p class="error">Podany email nie jest poprawny</p>';
        }
    }
?>