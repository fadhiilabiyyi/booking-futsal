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

if( isset($_POST["upload"]) ) {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah yang diupload adalah gambar 
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "
			<script>
				alert('yang anda upload bukan gambar!');
				document.location.href = 'pembayaran.php';
			</script>";
	}

	// cek jika ukuran terlalu besar
	if ( $ukuranFile > 1000000 ) {
		echo "
			<script>
				alert('ukuran gambar terlalu besar!');
				document.location.href = 'pembayaran.php';
			</script>";
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	$gambar = $namaFileBaru;

	$result_id = mysqli_query($conn, "SELECT max(id) FROM booking");
	$row_id = mysqli_fetch_row($result_id);
	$idUser = $row_id["0"];

	mysqli_query($conn, "UPDATE booking SET gambar = '$gambar' WHERE id = '$idUser' ");

	$cek = mysqli_affected_rows($conn);

	if( $cek > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan, terimakasih');
				document.location.href = 'index.php';
			</script>";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'pembayaran.php';
			</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Pembayaran</title>
	<link rel="stylesheet" type="text/css" href="css/pembayaranCss.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="typing"><h1><center>Selamat Datang, <?= $nama ?></center></h1></div>

<a href="logout.php" class="btn" onClick="return confirm('yakin?')">Logout</a>
<br>
<br>
<div class="tb">
<table border="1" cellpadding="10" cellspacing="0" >
	<tr id="header">
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th>Waktu Bermain</th>
		<th>Lapangan</th>
	</tr>
	<tr>
		<td><?= $nama ?></td>
		<td><?= $tanggal ?></td>
		<td><?= $jam ?></td>
		<td><?= $waktu_bermain ?></td>
		<td><?= $lapangan ?></td>
	</tr>
</table>
</div>

<div class="tb2">
<form action="" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<!-- button -> cetak struk -->
			<td><a href="struk.php" class="btn2" target="_blank" >Bukti Pembayaran</a></td>
		</tr>
		<tr>
			<td>Total Harga : </td>
		</tr>
		<tr>
			<td><input type="text" name="harga" value="<?= $harga ?>" ></td><br>
		</tr>
		<tr>
			<td>Silahkan Upload Bukti Pembayaran</td>
		</tr>
		<tr>
			<td><input type="file" name="gambar"></td>
		</tr>
		<tr>
			<td><button type="submit" name="upload" class="btn2">Upload!</button></td>
		</tr>
	</table>
</form>
</div>
</div>
<ul class="bg-bubbles">
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	<li></li>
	
</ul>
</body>
</html>