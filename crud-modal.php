<?php 
    $title = "Daftar Akun";
    include './layout/header.php';

    $data_akun = select("SELECT * FROM akun ");
    
?>
    <div class="container mt-5">
        <h1>Data Akun</h1>
        <hr>

        <button type="button" href="#" class="btn btn-primary mb-1" data-bs-toggle= "modal" data-bs-target="#modalTambah" >Tambah</button>

        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1?>
                <?php foreach ($data_akun as $akun) : ?>
                    <td><?= $no++ ;?></td>
                    <td><?= $akun['nama'] ;?></td>
                    <td><?= $akun['username'] ;?></td>
                    <td><?= $akun['email'] ;?></td>
                    <td><?= $akun['password'] ;?></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary mb-1">Ubah</button>
                        <button type="button" class="btn btn-danger mb-1">Hapus</button>
                    </td>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>

    <!-- Modal tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="mb-3">

            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php include './layout/footer.php';?>
