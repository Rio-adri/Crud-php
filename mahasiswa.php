<!-- header -->
<?php
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
        </script>";
    exit;
}

 // membatasi halaman sesuai login
 if($_SESSION['level'] != 1 && $_SESSION['level'] != 3) {
    echo "<script>
            alert('anda tidak punya hak akses');
            document.location.href = 'crud-modal.php'
        </script>";
    exit;
}


$title = "Daftar Mahasiswa";

include './layout/header.php';



// menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC")

?>

<!-- main -->
<div class="container mt-5">
        <h1><i class="fas fa-users"></i> Data Mahasiswa</h1>
        <hr>

        <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

        <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

        <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Prodi</th>
                    <th class="text-center">jenis Kelamin</th>
                    <th class="text-center">Telepon</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach ($data_mahasiswa as $mahasiswa): ?>
                <tr class="">
                    <td class="text-center"> <?= $no++ ;?></td>
                    <td class="text-center"> <?= $mahasiswa['nama']; ?></td>
                    <td class="text-center"> <?= $mahasiswa['prodi']; ?></td>
                    <td class="text-center"> <?= $mahasiswa['jk']; ?></td>
                    <td class="text-center"> <?= $mahasiswa['telepon']; ?></td>
                    <td width="25%" class="text-center">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!-- footer -->
<?php 
include "./layout/footer.php";
?>