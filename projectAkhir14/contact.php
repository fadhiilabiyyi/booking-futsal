<?php 
session_start();

if( !isset($_SESSION["login_user"]) ) {
	header("Location: login.php");
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman Contact</title>
	<link rel="stylesheet" type="text/css" href="css/contactStyle.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1>Contact Us</h1>
		<p>Apabila ada keperluan ataupun ada pertanyaan penting bisa hubungi kami. Kami akan senang menanggapi pertanyaan dan membantu anda. Terima Kasih.</p>
		<div class="contact-box">
			<div class="contact-left">
				<h3><u>Kirim Pesan Anda</u></h3><br>
					<div class="input-row">
						<div class="input-grup">
							<label>Nama</label>
							<input type="text" name="nama" placeholder="Nama lengkap anda">
						</div>
						<div class="input-grup">
							<label>No. Telepon</label>
							<input type="text" name="telepon" placeholder="Masukan no telepon anda">
						</div>
					</div>
					<div class="input-row">
						<div class="input-grup">
							<label>Email</label>
							<input type="text" name="email" placeholder="Masukan Email anda">
						</div>
					</div>

					<label>Pesan</label>
					<textarea rows ="5" placeholder="Ketik disini"></textarea>

					<button type="submit">KIRIM</button>
				</form>
			</div>
			<div class="contact-right">
				<h3><u>Hubungi Kami</u></h3>
				<table>
					<tr>
						<td>Email : </td>
					    <td>wikramafutsal@gmail.com</td>
					</tr>
					<tr>
						<td>No.Telepon : </td>
					    <td>+62 800 0000 000</td>
					</tr>
					<tr>
						<td>Alamat : </td>
					    <td>Bogor, Jawa Barat, Indonesia</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

</body>
</html>