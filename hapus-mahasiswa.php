<?php 
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login'
        </script>";
    exit;
}

include './config/app.php';

// mendapat id mahasiswa
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// pesan penghapusan data
if(delete_mahasiswa($id_mahasiswa)> 0) {
    echo "<script>
            alert('Data Mahasiswa Berhasil Dihapus');
            document.location.href= 'mahasiswa';
        </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa Gagal Dihapus');
            document.location.href= 'mahasiswa';
        </script>";
}

?>