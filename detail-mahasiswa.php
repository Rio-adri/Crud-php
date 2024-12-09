<!-- header -->
<?php
session_start();
// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login'
        </script>";
    exit;
}

$title = "Detail Mahasiswa";

include './layout/header.php';


// mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

// menampilkan data mahasiswa
$mahasiswa = select("SELECT * FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Barang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
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
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h1><i class="fas fa-user"></i> Detail <?= $mahasiswa['nama'];?></h1>
                        <table class="table table-bordered table-striped mt-3">
                            <tr>
                                <td>Nama</td>
                                <td> : <?= $mahasiswa['nama']?></td>
                            </tr>

                            <tr>
                                <td>Prodi</td>
                                <td> : <?= $mahasiswa['prodi']?></td>
                            </tr>

                            <tr>
                                <td>Jenis Kelamin</td>
                                <td> : <?= $mahasiswa['jk']?></td>
                            </tr>

                            <tr>
                                <td>Telepon</td>
                                <td> : <?= $mahasiswa['telepon']?></td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td> : <?= $mahasiswa['alamat']?></td>
                            </tr>


                            <tr>
                                <td>Email</td>
                                <td> : <?= $mahasiswa['email']?></td>
                            </tr>

                            <tr>
                                <td>Foto</td>
                                <td><a href="./assets/img/<?= $mahasiswa['foto'];?>"> <img width="20%" src="./assets/img/<?= $mahasiswa['foto'];?>" alt=""></a></td>
                            </tr>

                        </table>
                        <a href="mahasiswa.php" class="btn btn-secondary btn-sm mt-2" style="float: right;">Kembali</a>
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
