<?php 
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
        </script>";
    exit;
}

include 'config/app.php';

$id_barang = (int)$_GET['id_barang'];

if(delete_barang($id_barang) > 0) {
    echo "<script>
            alert('Data barang telah berhasil dihapus');  
            document.location.href= 'barang.php'
        </script>";
} else {
    echo "<script>
            alert('Data barang gagal dihapus');  
            document.location.href= 'barang.php'
        </script>";
}

?>