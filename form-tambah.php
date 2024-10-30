<?php

include './layout/header.php';

?>
    <div class="container mt-5">
        <h1>Tambah Barang</h1>
        <hr> 
        <!-- form -->
         <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang...">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang...">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Barang...">
            </div>
            
            <button type="submit " name="tambah" class="btn btn-primary " style="float : right;">Tambah</button>
         </form>
        
    </div>

<?php include './layout/footer.php' ?>
    