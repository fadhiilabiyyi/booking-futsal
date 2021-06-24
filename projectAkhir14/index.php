<?php 
session_start();

if( !isset($_SESSION["login_user"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

$id = $_SESSION["id"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampilan Depan Website</title>
	<link rel="stylesheet" href="css/styleIndex.css">
</head>
<body>
	<div class="banner">
		<div class="navbar">
			<img src="" class="logo">
			<ul>
				<li><a href="logout.php"  onClick="return confirm('yakin?')">Logout</a></li>
				<li><a href="schedule.php">Schedule</a></li>
				<li><a href="location.php">Location</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="ubah-user.php">Edit Akun</a></li>
			</ul>
		</div>
		
		<div class="content">
			<a href="booking.php" class="btn">Booking</a>
			<h1><b>WELCOME <br> TO <br> WIKRAMA FUTSAL</b></h1>
			<p>The field of light in the sporting world in the
				colours red and blue.<br> The thirst for titles is patent and
				palpable at all and in every branch of the club.</p>
		</div>

	</div>
</body>
</html>>
