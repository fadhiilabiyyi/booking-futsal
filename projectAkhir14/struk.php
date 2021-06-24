<?php 
session_start();
require 'functions.php';

if( !isset($_SESSION["login_user"]) ) {
	header("Location: login.php");
	exit;
}

if( !isset($_SESSION["pembayaran"]) ) {
	header("location: index.php");
	exit;
}

$id = $_SESSION["id"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$row = mysqli_fetch_assoc($result);
$nama = $row["nama"];

$tanggal = $_SESSION["tanggal"];
$jam = $_SESSION["jam"];
$waktu_bermain = $_SESSION["waktu_bermain"];
$lapangan = $_SESSION["lapangan"];
$harga = $_SESSION["harga"];

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Bukti Pembayaran</title>
</head>
<body>
<h1><center>Struk - Wikrama Futsal</center></h1>

<center>
	<table border="1" cellpadding="10" cellspacing="0" >
		<tr id="header">
			<th>Nama</th>
			<th>Tanggal</th>
			<th>Jam</th>
			<th>Waktu Bermain</th>
			<th>Lapangan</th>
			<th>Harga</th>
		</tr>
		<tr>
			<td><?= $nama ?></td>
			<td><?= $tanggal ?></td>
			<td><?= $jam ?></td>
			<td><?= $waktu_bermain ?></td>
			<td><?= $lapangan ?></td>
			<td><?= $harga ?></td>
		</tr>
	</table>
	<br>
	<i>Silahkan upload Struk ini pada form pembayaran untuk bukti pemesanan</i>
	<br>
	<i>Simpan Screenshot Struk Ini untuk mengkonfirmasi pemesanan lapangan</i>
</center>
	
	

<!-- Cetak -->
<script>
	window.print();
</script>

</body>
</html>