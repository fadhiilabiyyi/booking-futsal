<?php 
session_start();

if( !isset($_SESSION["login_admin"])) {
    header("Location:login-admin.php");
    exit;
}

require '../functions.php';

$booking = tampilBookingUser("SELECT * FROM booking");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
    $booking = cariBooking($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Data Booking User</title>
	<link rel="stylesheet" type="text/css" href="../css/indexBookingDataStyle.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
	<div class="typing">
<h1><center><u>Halaman Data Booking User</u></center></h1>
</div>

<a href="logout-admin.php" class="btn" onClick="return confirm('yakin?')">logout</a>
<br><br>

<a href="index-admin.php" class="btn2">Kembali</a>
<br><br><br>


<form action="" method="post">
<div class="tb">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete=off>
	<button type="submit" name="cari">Cari!</button>
</div>
</form>
<br>

<table border="1" cellpadding="10" cellspacing="0" >
	<tr>
		<th>No</th>
		<th>ID User</th>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th>Waktu Bermain</th>
		<th>Lapangan</th>
		<th>Harga</th>
		<th>Gambar</th>
	</tr>
	

	<?php $no = 1; ?>
	<?php foreach( $booking as $data ) : ?>
	<tr>			
		<td><?= $no++; ?></td>
		<td><?= $data["id_user"] ?></td>
		<td><?= $data['nama'] ?></td>
		<td><?= $data['tanggal'] ?></td>
		<td><?= $data['jam'] ?></td>
		<td><?= $data['waktu_bermain'] ?></td>
		<td><?= $data['lapangan'] ?></td>
		<td><?= $data['harga'] ?></td>
		<td><img src="../img/<?= $data['gambar'] ?>" width="50"></td>
	</tr>
	<?php endforeach; ?>

</table>
</div>
</body>
</html>