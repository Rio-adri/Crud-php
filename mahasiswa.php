<!-- header -->
<?php
include './layout/header.php';

$title = "Daftar Mahasiswa";

// menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa ORDER BY id_mahasiswa DESC")

?>

<!-- main -->
<div class="container mt-5">
        <h1>Data Mahasiswa</h1>
        <hr>

        <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1">Tambah</a>

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
                    <td width="15%" class="text-center">
                        <a href="" class="btn btn-secondary btn-sm">Detail</a>
                        <a href="" class="btn btn-warning btn-sm">Ubah</a>
                        <a href="" class="btn btn-danger btn-sm">Hapus</a>
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