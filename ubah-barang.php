<?php
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
        </script>";
    exit;
}

$title = "Ubah Barang";
include './layout/header.php';

// mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM barang WHERE id_barang = $id_barang")[0];

// cek apakah tombol tambah ditekan
if (isset($_POST['ubah'])) {
    if (update_barang($_POST) > 0) {
        echo "<script> 
                alert('Data barang berhasil diubah');
                document.location.href = 'index.php';
             </script>";
    } else {
        echo "<script> 
                alert('Data barang gagal diubah');
                document.location.href = 'index.php';
            </script>";
    }
}

?>
    <div class="container mt-5">
        <h1><i class="fas fa-edit"></i> Ubah Barang</h1>
        <hr> 
        <!-- form -->
         <form action="" method="post">
            <input type="hidden" name="id_barang" value = "<?=$barang['id_barang'];?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang..." value="<?=$barang['nama']?>" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang..." value="<?=$barang['jumlah']?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Barang..." value="<?=$barang['harga']?>" required>
            </div>
            <input type="hidden" name="barcode" value = "<?=$barang['barcode'];?>">

            
            <button type="submit " name="ubah" class="btn btn-primary " style="float : right;"><i class="fas fa-edit"></i> Ubah</button>
         </form>
        
    </div>

<?php include './layout/footer.php' ?>
    