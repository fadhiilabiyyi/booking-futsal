<?php 
session_start();

if( !isset($_SESSION["login_user"]) ) {
	header("Location: login.php");
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/locationStyle.css">
	<title>Google Maps</title>
</head>
<body>
	<div></div>
	<h1><p align="center">Lokasi Wikrama Futsal</p></h1>
	<p align="center"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15847.556407771906!2d106.7824432!3d-6.7833485!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c89505b4c37d%3A0x307fc4a38e65fa2b!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1623462607468!5m2!1sid!2sid" width="900" height="450" style="border:10px" allowfullscreen="" loading="lazy" ></iframe></p>
</body>
</html>