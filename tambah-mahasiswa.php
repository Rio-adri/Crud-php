<?php
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login'
        </script>";
    exit;
}

$title = "Tambah Mahasiswa";
include './layout/header.php';

// cek apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script> 
                alert('Data Mahasiswa berhasil ditambahkan');
                document.location.href = 'mahasiswa';
             </script>";
    } else {
        echo "<script> 
                alert('Data Mahasiswa gagal ditambahkan');
                document.location.href = 'mahasiswa';
            </script>";
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-plus-circle"></i> Tambah Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Data Mahasiswa</a></li>
              <li class="breadcrumb-item active">Tambah Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                        <label for="alamat" class="form-label">Alamat Mahasiswa</label>
                        <textarea name="alamat" id="textarea"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Mahasiswa</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Mahasiswa</label>
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Mahasiswa..." onchange = "previewImg()" required>

                        <img src="" alt="" class="img-thumbnail img-preview mt-2" width="100px">
                    </div>
                    
                    <button type="submit " name="tambah" class="btn btn-primary " style="margin-bottom : 10px;" ><i class="fas fa-plus-circle"></i> Tambah</button>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    // preview img
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
    