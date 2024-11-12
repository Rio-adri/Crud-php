<?php 
    session_start();
    // membatasi halaman sebelum login
    if(!isset($_SESSION['login'])) {
        echo "<script>
                document.location.href = 'login.php'
            </script>";
        exit;
    }

    // membatasi halaman sesuai login
    if($_SESSION['level'] != 1 && $_SESSION['level'] != 2) {
        echo "<script>
                alert('anda tidak punya hak akses');
                document.location.href = 'crud-modal.php'
            </script>";
        exit;
    }



    $title = "Daftar Barang";
    include './layout/header.php';
    
    $data_barang = select("SELECT * FROM barang ORDER BY id_barang DESC");
?>
    <div class="container mt-5">
        <h1><i class="fas fa-list"></i> Data Barang</h1>
        <hr>

        <a href="tambah-barang.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                <?php foreach ($data_barang as $barang): ?>
                <tr>
                    <td> <?= $no++ ;?></td>
                    <td> <?= $barang['nama']; ?></td>
                    <td> <?= $barang['jumlah']; ?></td>
                    <td>Rp<?= number_format($barang['harga'],0,',','.'); ?></td>
                    <td> <?= date('d/m/Y | H:i:s', strtotime($barang['tanggal'])); ?></td>
                    <td width="20%" class="text-center">
                        <a href="ubah-barang.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                        <a href="hapus-barang.php?id_barang= <?= $barang['id_barang'];?>" class="btn btn-danger" onclick="return confirm('Yakin data barang akan dihapus?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php include './layout/footer.php';?>