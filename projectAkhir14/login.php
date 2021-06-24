<?php 
session_start();

if( isset($_SESSION["login_user"])) {
    header("Location:index.php");
    exit;
}

require 'functions.php';

if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login_user"] = true;
            $_SESSION["id"] = $row["id"];

            header("Location:index.php");
            exit;
        } 
    }

    echo "<script>
            alert('username dan password salah!');
            document.location.href = 'login.php';
          </script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="UTF-8"></script>
</head>
<body>
    <form action="" class="login-form" method="post">
        <h1>Login</h1>
        <div class="txtb">
            <input type="text" name="username" required autofocus autocomplete=off>
            <span data-placeholder="Username"></span>
        </div>
        <div class="txtb">
            <input type="password" name="password" required>
            <span data-placeholder="Password"></span>
        </div>
        <input type="submit" class="logbtn" value="Login" name="login">
        <div class="bottom-text">Belum Daftar?
            <a href="registrasi.php">Daftar Sekarang</a>
        </div>
         <div class="bottom-text">
            <a href="admin/login-admin.php">Admin</a>
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