<?php
include 'config/database.php';
 
//list kolom
if ($_GET['action'] == "table_data") {
 
    $columns = array(
        0 => 'id_mahasiswa',
        1 => 'nama',
        2 => 'prodi',
        3 => 'jk',
        4 => 'telepon',
        5 => 'id_mahasiswa'
    );
 
    $querycount = $db->query("SELECT count(id_mahasiswa) as jumlah FROM mahasiswa");
    $datacount = $querycount->fetch_array();
 
    $totalData = $datacount['jumlah'];
 
    $totalFiltered = $totalData;
 
    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order']['0']['column']];
    $dir = $_POST['order']['0']['dir'];
 
    if (empty($_POST['search']['value'])) {
        //jika tidak ada pencarian data, jalankan query ini
        $query = $db->query("SELECT id_mahasiswa,nama,prodi,jk,telepon FROM mahasiswa ORDER BY $order $dir LIMIT $limit OFFSET $start");
 
    } else {
        // jika ada pencarian data, jalankan query ini
        $search = $_POST['search']['value'];
        $query = $db->query("SELECT id_mahasiswa,nama,prodi,jk,telepon FROM mahasiswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%' OR prodi LIKE '%$search%' OR jk LIKE '%$search%' ORDER BY $order $dir LIMIT $limit OFFSET $start");
 
        $querycount = $db->query("SELECT count(id_mahasiswa) as jumlah FROM mahasiswa WHERE nama LIKE '%$search%' OR telepon LIKE '%$search%' OR prodi LIKE '%$search%' OR jk LIKE '%$search%'");
 
        $datacount = $querycount->fetch_array();
        $totalFiltered = $datacount['jumlah'];
    }
 
    $data = array();
    if (!empty($query)) {
        $no = $start + 1;
        while ($value = $query->fetch_array()) {
            $nestedData['no'] = $no;
            $nestedData['nama'] = $value['nama'];
            $nestedData['prodi'] = $value['prodi'];
            $nestedData['jk'] = $value['jk'];
            $nestedData['telepon'] = $value['telepon'];
            $nestedData['aksi'] = '<div width="25%" class="text-center">
                                        <a href="detail-mahasiswa?id_mahasiswa='.$value['id_mahasiswa'].'" class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="ubah-mahasiswa?id_mahasiswa='.$value['id_mahasiswa'].'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="hapus-mahasiswa?id_mahasiswa='.$value['id_mahasiswa'].'" class="btn btn-danger btn-sm" onclick="return confirm("Apakah anda yakin ingin menghapus data ini?")"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </div>
                                ';
            $data[] = $nestedData;
            $no++;
        }
    }
 
    $json_data = [
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
    ];
 
    echo json_encode($json_data);
}
?>