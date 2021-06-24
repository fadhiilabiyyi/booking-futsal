<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_SESSION["id"];

if( hapusUser($id) > 0 ) {
    echo "
        <script>
                alert('akun berhasil dihapus!');
                document.location.href = 'login.php';
            </script>";
} else {
    echo "
        <script>
                alert('akun gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
}

$_SESSION = [];
session_unset();
session_destroy();

header("Location: login.php");
exit;

 ?>