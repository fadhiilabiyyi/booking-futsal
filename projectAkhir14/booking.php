<?php 
session_start();

if( !isset($_SESSION["login_user"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$id = $_SESSION["id"];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

$id_user = $id;
$nama = $row["nama"];

if( isset($_POST["booking"]) ) {
	$tanggal = $_POST["tanggal"];
	$jam = $_POST["jam"];
	$waktu_bermain = $_POST["waktu_bermain"];
	$lapangan = $_POST["lapangan"];

	// menentukan harga
	if( $waktu_bermain == '1 jam' ) {
		$harga1 = 100000;
	} elseif( $waktu_bermain == '2 jam' ) {
		$harga1 = 150000;
	} elseif( $waktu_bermain == '3 jam' ) {
		$harga1 = 200000;
	}

	// menentukan harga
	if( $lapangan == 'lapangan 1' ) {
		$harga2 = 20000;
	} elseif( $lapangan == 'lapangan 2' ) {
		$harga2 = 40000;
	}

	// menghitung harga
	$harga = $harga1 + $harga2;
	$hasil_rupiah = "Rp " . number_format($harga,2,',','.');

	// format rupiah
	$totalHarga = $hasil_rupiah;

	// query, masukkan ke tabel booking
	mysqli_query($conn, "INSERT INTO booking(id_user, nama, tanggal, jam, waktu_bermain, lapangan, harga) VALUES($id, '$nama', '$tanggal', '$jam', '$waktu_bermain', '$lapangan', '$totalHarga')");

	// atur session buat halaman pembayaran
	$_SESSION["tanggal"] = $tanggal;
	$_SESSION["jam"] = $jam;
	$_SESSION["waktu_bermain"] = $waktu_bermain;
	$_SESSION["lapangan"] = $lapangan;
	$_SESSION["harga"] = $totalHarga;
	$_SESSION["pembayaran"] = true;

	$cek = mysqli_affected_rows($conn);

	if( $cek > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'pembayaran.php';
			</script>";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'booking.php';
			</script>";
	}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Halaman Booking</title>
    <link rel="stylesheet" href="css/bookingStyle.css">
</head>
<body>
    <div class="wrap">
        <div class="container">
            <h1>Halaman Booking</h1>
            <p>Selamat Datang, <?= $nama; ?><p>
            <br>
            
            <a href="logout.php"  onClick="return confirm('yakin?')">Logout</a>

            <form action="" method="post">
                <table>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><input type="date" name="tanggal" required></td>
                    </tr>
                    <tr>
                        <td>Jam</td>
                        <td>:</td>
                        <td><input type="time" name="jam" required></td>
                    </tr>
                    <tr>
                        <td>Waktu Bermain</td>
                        <td>:</td>
                        <td>
                            <select name="waktu_bermain" required>
                                <option value='1 jam'>1 Jam</option>
                                <option value='2 jam'>2 Jam</option>
                                <option value='3 jam'>3 Jam</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Lapangan</td>
                        <td>:</td>
                        <td>
                            <select name="lapangan" required>
                                <option value="lapangan 1">Lapangan 1</option>
                                <option value="lapangan 2">Lapangan 2</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><button type="submit" name="booking">Booking!</button></td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>        
</body>
</html>