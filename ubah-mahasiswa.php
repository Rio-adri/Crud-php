<?php
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login.php'
        </script>";
    exit;
}

$title = "Ubah Mahasiswa";
include './layout/header.php';

// cek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (update_mahasiswa($_POST) > 0) {
        echo "<script> 
                alert('Data Mahasiswa berhasil diubah');
                document.location.href = 'mahasiswa.php';
             </script>";
    } else {
        echo "<script> 
                alert('Data Mahasiswa gagal diubah');
                document.location.href = 'mahasiswa.php';
            </script>";
    }
}

// mengambil data id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$mahasiswa =  select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>
    <div class="container mt-5">
        <h1><i class="fas fa-edit"></i> Ubah Data Mahasiswa</h1>
        <hr> 
        <!-- form -->
         <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name = "id_mahasiswa" value="<?= $mahasiswa['id_mahasiswa'] ;?>">
            <input type="hidden" name = "fotoLama" value="<?= $mahasiswa['foto'] ;?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']?>" placeholder="Nama Mahasiswa..." required >
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="prodi" class="form-label">Prodi Mahasiswa</label>
                    <select name="prodi" id="prodi" class="form-control" >
                        <?php $prodi = $mahasiswa['prodi'];?>
                        <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ; ?> >Teknik Informatika</option>
                        <option value="Teknik Mesin" <?= $prodi == 'Teknik Mesin' ? 'selected' : null ; ?>>Teknik Mesin</option>
                        <option value="Teknik Komputer" <?= $prodi == 'Teknik Komputer' ? 'selected' : null ; ?>>Teknik Komputer</option>
                        <option value="Manajemen Informatika" <?= $prodi == 'Manajemen Informatika' ? 'selected' : null ; ?>>Manajemen Informatika</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" >
                        <?php $jk = $mahasiswa['jk'];?>
                        <option value="Laki-laki" <?= $jk == 'Laki-laki' ? 'selected' : null ; ?>>Laki-laki</option>
                        <option value="Perempuan" <?= $jk == 'Perempuan' ? 'selected' : null ; ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon Mahasiswa</label>
                <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $mahasiswa['telepon']?>" placeholder="Telepon..." required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']?>" placeholder="Email..." required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Mahasiswa</label>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Mahasiswa..." onchange= "previewImg()" >

                <img src="./assets/img/ <?php $mahasiswa['foto'];?>" alt="" class="img-thumbnail img-preview mt-2" width="100px">
            </div>
            
            <button type="submit " name="tambah" class="btn btn-primary " style="float : right;"><i class="fas fa-edit"></i> Ubah</button>
         </form>
        
    </div>

<script>
    function previewImg() {
        const foto = document.querySelector("#foto");
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);
        fileFoto.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include './layout/footer.php' ?>
    