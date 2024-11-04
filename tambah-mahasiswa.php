<?php
$title = "Tambah Mahasiswa";
include './layout/header.php';

// cek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script> 
                alert('Data Mahasiswa berhasil ditambahkan');
                document.location.href = 'mahasiswa.php';
             </script>";
    } else {
        echo "<script> 
                alert('Data Mahasiswa gagal ditambahkan');
                document.location.href = 'mahasiswa.php';
            </script>";
    }
}

?>
    <div class="container mt-5">
        <h1>Tambah Mahasiswa</h1>
        <hr> 
        <!-- form -->
         <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa..." required>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="prodi" class="form-label">Prodi Mahasiswa</label>
                    <select name="prodi" id="prodi" class="form-control" required>
                        <option value="">--Pilih Prodi--</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon Mahasiswa</label>
                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Telepon..." required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Mahasiswa..." required>
            </div>
            
            <button type="submit " name="tambah" class="btn btn-primary " style="float : right;">Tambah</button>
         </form>
        
    </div>

<?php include './layout/footer.php' ?>
    