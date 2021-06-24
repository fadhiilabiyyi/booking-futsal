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
	<title>Schedule</title>
	<link rel="stylesheet" type="text/css" href="css/scheduleStyle.css">
</head>
<body>
	
	<div class="filter">
		
	</div>
	<table>
		<tr>
			<th>No</th>
			<th>Hari</th>
			<th>Buka</th>
			<th>Tutup</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Senin</td>
			<td>08.00</td>
			<td>24.00</td>
		</tr>
		<tr>
			<td>2</td>
			<td>Selasa</td>
			<td>08.00</td>
			<td>24.00</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Rabu</td>
			<td>08.00</td>
			<td>24.00</td>
		</tr>
		<tr>
			<td>4</td>
			<td>Kamis</td>
			<td>08.00</td>
			<td>24.00</td>
		</tr>
		<tr>
			<td>5</td>
			<td>Jum'at</td>
			<td>13.00</td>
			<td>24.00</td>
		</tr>
		<tr>
			<td>6</td>
			<td>Sabtu</td>
			<td>08.00</td>
			<td>24.00</td>
		</tr>
		<tr>
			<td>7</td>
			<td>Minggu</td>
			<td>08.00</td>
			<td>24.00</td>
		</tr>
	</table>

</body>
</html>