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


$title = "Daftar Pegawai";

include './layout/header.php';


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="crud-modal.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
                        <table class="table table-bordered table-striped mt-3" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Telepon</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="live_data">
                               
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

<script>
    $('document').ready(function() {
        setInterval(()=>{
            getPegawai();
        },2000);
    });

    function getPegawai() {
        $.ajax({
            url : "realtime-pegawai.php",
            type : "GET",
            success : function (response) {
                $('#live_data').html(response)
            }
        })
    }
</script>

  <?php include './layout/footer.php';?>
