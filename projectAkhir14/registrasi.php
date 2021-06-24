<?php 
require'functions.php';

if( isset($_POST["register"])) {

    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('user baru berhasil ditambahkan!');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo mysqli_error($conn);
    }

}

?>     

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="UTF-8"></script>
</head>
<body>
    <form action="" class="login-form" method="post">
        <h1>Daftar</h1>
        <div class="txtb">
            <input type="text" name="nama" required autofocus autocomplete=off>
            <span data-placeholder="Name"></span>
        </div>
        <div class="txtb">
            <input type="text" name="username" required autocomplete=off>
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
        <input type="submit" class="logbtn" value="Daftar" name="register">
        <div class="bottom-text">Sudah Punya Akun?
            <a href="login.php">Login Disini</a>
    
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