<?php 

// fungsi menampilkan data
function select ($query) {
    // pangggil dtbs
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// fungsi menambahkan data barang
function create_barang ($post) {
    global $db;

    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    // query tambat data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah','$harga', CURRENT_TIMESTAMP())";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi mengubah data barang
function update_barang($post) {
    global $db;

    $id_barang = $post['id_barang'];
    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

    $query = "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menghapus barang
function delete_barang($id_barang) {
    global $db;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// fungsi menambahkan data mahasiswa 
function create_mahasiswa ($post) {
    global $db;

    $nama = $post['nama'];
    $prodi = $post['prodi'];
    $jenis_kelamin = $post['jk'];
    $telepon = $post['telepon'];
    $email = $post['email'];
    $foto = upload_file();

    // check upload file
    if(!$foto) {
        return false;
    }

    // query tambat data
    $query = "INSERT INTO mahasiswa VALUES(null, '$nama', '$prodi','$jenis_kelamin', '$telepon', '$email', '$foto')";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi untuk mengupload file
function upload_file() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg','jpeg','png'];

    $extensiFile = explode('.',$namaFile);
    $extensiFile = strtolower(end($extensiFile));

    // check format ekstensi file
    if(!in_array($extensiFile,$extensifileValid)) {
        // pesan gagal
        echo "<script> 
                alert('Ekstensi file tidak valid');
                document.location.href = 'tambah-mahasiswa.php'
            </script>";
        die();
    }

    // check ukuran file 2mb
    if($ukuranFile> 2048000) {
        // pesan gagal
        echo "<script> 
                alert('Ukuran file terlalu besar');
                document.location.href = 'tambah-mahasiswa.php'
            </script>";
        die();
    }
    
    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiFile;

    // pindahkan ke folder lokal
    move_uploaded_file($tmpName,'assets/img/'. $namaFileBaru);

    return $namaFileBaru;


}


?>