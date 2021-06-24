<?php 
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "project_akhir_14");

// function user

// function registrasi
function registrasi($data) {
	global $conn;

	$nama = $data["nama"];
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username tersedia
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar, silahkan cari username lain!');
			  </script>";
		return false;
	} 

	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			  </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

// function ubah data user
function ubahUser($data) {
	global $conn;
	$id = $_SESSION["id"];

	$nama = $data["nama"];
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username tersedia
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar, silahkan cari username lain!');
			  </script>";
		return false;
	} 

	// cek konfirmasi password
	if ( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
			  </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan ke database
	mysqli_query($conn, "UPDATE user SET 
								nama = '$nama',
								username = '$username',
								password = '$password'
								WHERE id = $id");

	return mysqli_affected_rows($conn);

}



// function admin

// function tampilkan data dari table user
function tampilDataUser($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// function cari user
function cariUser($keyword) {
	global $conn;
	$cari =  "SELECT * FROM user 
							WHERE 
							nama LIKE '%$keyword%' OR
							username LIKE '%$keyword%'";

	return tampilDataUSer($cari);
}

// function tampilkan data dari table booking
function tampilBookingUser($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// function cari booking
function cariBooking($keyword) {
	global $conn;
	$cari =  "SELECT * FROM booking 
							WHERE 
							id_user LIKE '%$keyword%' OR
							nama LIKE '%$keyword%' OR
							tanggal LIKE '%$keyword%' OR 
							jam LIKE '%$keyword%' OR 
							waktu_bermain LIKE '%$keyword%' OR 
							lapangan LIKE '%$keyword%' OR 
							harga LIKE '%$keyword%'";

	return tampilBookingUser($cari);
}

?>