<?php 
    // membatasi halaman login
    if(!isset($_SESSION['login'])) {
        echo "<script>
                document.location.href = 'login.php'
            </script>";
        exit;
    }

    $title = "Daftar Akun";
    include './layout/header.php';

    $data_akun = select("SELECT * FROM akun ");

    // jika tombol tambah ditekan, jalankan script berikut
    if (isset($_POST['tambah'])) {
        if (create_akun($_POST) > 0) {
            echo "<script> 
                    alert('Data akun berhasil ditambahkan');
                    document.location.href = 'crud-modal.php';
                </script>";
        } else {
            echo "<script> 
                    alert('Data akun gagal ditambahkan');
                    document.location.href = 'crud-modal.php';
                </script>";
        }
    }

    // UBAH
    if (isset($_POST['ubah'])) {
        if (update_akun($_POST) > 0) {
            echo "<script> 
                    alert('Data akun berhasil diubah');
                    document.location.href = 'crud-modal.php';
                 </script>";
        } else {
            echo "<script> 
                    alert('Data akun gagal diubah');
                    document.location.href = 'crud-modal.php';
                </script>";
        }
    }
?>
    <div class="container mt-5">
        <h1><i class="fas fa-list"></i> Data Akun</h1>
        <hr>

        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fas fa-plus-circle"></i> Tambah</button>

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
                <?php $no = 1; ?>
                <?php foreach ($data_akun as $akun) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $akun['nama']; ?></td>
                    <td><?= $akun['username']; ?></td>
                    <td><?= $akun['email']; ?></td>
                    <td>Password Ter-enkripsi</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $akun['id_akun']; ?>"><i class="fas fa-edit"></i> Ubah</button>
                        <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $akun['id_akun']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah -->
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
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <option value="">--Pilih Level--</option>
                                <option value="1">Admin</option>
                                <option value="2">Operator</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="tambah" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus -->
    <?php foreach ($data_akun as $akun) : ?>
        <div class="modal fade" id="modalHapus<?= $akun['id_akun']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Yakin ingin menghapus data akun <?= $akun['username']; ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="hapus-akun.php?id_akun=<?= $akun['id_akun']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Modal Ubah -->
    <?php foreach ($data_akun as $akun ) : ?>
    <div class="modal fade" id="modalUbah<?= $akun['id_akun']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name = "id_akun" value = "<?= $akun['id_akun'];?>">

                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" value = "<?= $akun['nama'] ;?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value = "<?= $akun['username'] ;?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value = "<?= $akun['email'] ;?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password <small>(Masukkan Password Baru)</small></label>
                            <input type="password" id="password" name="password" class="form-control"  required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                
                                <option value="">--Pilih Level--</option>
                                <option value="1" <?= $akun['level'] == 1 ? "selected": null ;?>>Admin</option>
                                <option value="2" <?= $akun['level'] == 2 ? "selected": null ;?>>Operator</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" name="ubah" class="btn btn-primary"><i class="fas fa-edit"></i> Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>


<?php include './layout/footer.php'; ?>
