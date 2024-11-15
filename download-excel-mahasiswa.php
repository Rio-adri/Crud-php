<?php

session_start();

// membatasi halaman login
if(!isset($_SESSION['login'])) {
    echo "<script>
            document.location.href = 'login'
        </script>";
    exit;
}

 // membatasi halaman sesuai login
 if($_SESSION['level'] != 1 && $_SESSION['level'] != 3) {
    echo "<script>
            alert('anda tidak punya hak akses');
            document.location.href = 'crud-modal'
        </script>";
    exit;
}

require './config/app.php';

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('B2', 'No')->getColumnDimension('B')->setAutoSize(true);
$activeWorksheet->setCellValue('C2', 'Nama')->getColumnDimension('C')->setAutoSize(true);
$activeWorksheet->setCellValue('D2', 'Program Studi')->getColumnDimension('D')->setAutoSize(true);
$activeWorksheet->setCellValue('E2', 'Jenis Kelamin')->getColumnDimension('E')->setAutoSize(true);
$activeWorksheet->setCellValue('F2', 'Telepon')->getColumnDimension('F')->setAutoSize(true);
$activeWorksheet->setCellValue('G2', 'Email')->getColumnDimension('G')->setAutoSize(true);
$activeWorksheet->setCellValue('H2', 'Foto')->getColumnDimension('H')->setAutoSize(true);


$data_mahasiswa = select("SELECT * FROM mahasiswa");

$no = 1;
$start = 3;

foreach ($data_mahasiswa as $mahasiswa) {
    $activeWorksheet->setCellValue('B'.$start, $no++)->getColumnDimension('B')->setAutoSize(true);
    $activeWorksheet->setCellValue('C'.$start, $mahasiswa['nama'])->getColumnDimension('C')->setAutoSize(true);
    $activeWorksheet->setCellValue('D'.$start, $mahasiswa['prodi'])->getColumnDimension('D')->setAutoSize(true);
    $activeWorksheet->setCellValue('E'.$start, $mahasiswa['jk'])->getColumnDimension('E')->setAutoSize(true);
    $activeWorksheet->setCellValue('F'.$start, $mahasiswa['telepon'])->getColumnDimension('F')->setAutoSize(true);
    $activeWorksheet->setCellValue('G'.$start, $mahasiswa['email'])->getColumnDimension('G')->setAutoSize(true);
    $activeWorksheet->setCellValue('H'.$start, 'http://localhost/project-crud-php/assets/img/'.$mahasiswa['foto'])->getColumnDimension('H')->setAutoSize(true);

    $start++;
};

// border tabel
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FFFF0000'],
        ],
    ],
];

$endBorder= $start -1;

$activeWorksheet->getStyle('B2:H'.$endBorder)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer->save('Data Mahasiswa.xlsx');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="Data Mahasiswa.xlsx"');
readfile('Data Mahasiswa.xlsx');
unlink('Data Mahasiswa.xlsx');
exit;