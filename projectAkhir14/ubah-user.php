<?php 
session_start();

if( !isset($_SESSION["login_user"]) ) {
    header("Location: login.php");
    exit;
}

require'functions.php';

$id = $_SESSION["id"];

$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$row = mysqli_fetch_assoc($result);

// cek tombol submit
if( isset($_POST["ubah"]) ) { 

    // cek apakah data berhasil diubah atau tidak
    if( ubahUser($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah-user.php';
            </script>";
    }

}

?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Akun</title>
    <link rel="stylesheet" type="text/css" href="css/ubahUserStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="UTF-8"></script>
</head>
<body>
    <form action="" class="login-form" method="post">
        <h1>Edit Akun</h1>
        <div class="txtb">
            <input type="text" name="nama" required value="<?= $row['nama'] ?>" autofocus>
            <span data-placeholder="Name"></span>
        </div>
        <div class="txtb">
            <input type="text" name="username" required>
            <span data-placeholder="Username"></span>
        </div>
        <div class="txtb">
            <input type="password" name="password" required>
            <span data-placeholder="Password"></span>
        </div>
        <div class="txtb">
            <input type="password" name="password2" required>
            <span data-placeholder="Re-Password"></span>
        </div>
        <input type="submit" class="logbtn" value="Ubah" name="ubah">
        <div class="bottom-text">
            <a href="index.php">Kembali</a>
        </div>
    </form>
    <script type="text/javascript">
        $(".txtb input").on("focus",function()
        {
            $(this).addClass("focus");
        });
        $(".txtb input").on("blur",function()
        {
            if ($(this).val()=="")
            $(this).removeClass("focus");
        });
    </script>
   
</body>
</html>