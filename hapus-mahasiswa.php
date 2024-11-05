<?php 
include './config/app.php';

// mendapat id mahasiswa
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// pesan penghapusan data
if(delete_mahasiswa($id_mahasiswa)> 0) {
    echo "<script>
            alert('Data Mahasiswa Berhasil Dihapus');
            document.location.href= 'mahasiswa.php';
        </script>";
} else {
    echo "<script>
            alert('Data Mahasiswa Gagal Dihapus');
            document.location.href= 'mahasiswa.php';
        </script>";
}

?>