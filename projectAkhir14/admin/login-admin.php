<?php 
session_start();

if( isset($_SESSION["login_admin"])) {
    header("Location:index-admin.php");
    exit;
}

require '../functions.php';

if( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    // cek password
    $row = mysqli_fetch_assoc($result);
    if( $password === $row["password"] ) {
        // set session
        $_SESSION["login_admin"] = true;
        $_SESSION["id"] = $row["id"];

        header("Location:index-admin.php");
        exit;
    } 
    
    echo "<script>
            alert('username dan password salah!');
            document.location.href = 'login-admin.php';
          </script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login - Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset=UTF-8></script>
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
         <div class="bottom-text">
            <a href="../login.php">Back</a>
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