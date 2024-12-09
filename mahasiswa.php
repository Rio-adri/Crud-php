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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Tabel Data Mahasiswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <a href="tambah-mahasiswa" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i> Tambah</a>

                        <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"><i class="fas fa-file-excel"></i> Download Excel</a>

                        <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"><i class="fas fa-file-pdf"></i> Download PDF</a>

                        <table class="table table-bordered table-striped mt-3" id="serverside">
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
                                
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include './layout/footer.php';?>
