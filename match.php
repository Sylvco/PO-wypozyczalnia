<?php
	if (isset($_POST['submit'])) {
		$subject = $_POST['email'];
	$pattern = "/".$_POST['imie_nazwisko']."/";
	preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
	
}
?>