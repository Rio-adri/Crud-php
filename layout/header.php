<?php

include './config/app.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
  </head>

  <body>
    <div>
        <nav class="navbar bg-dark navbar-expand-lg text-light" data-bs-theme = "dark">
            <div class="container">
                <a class="navbar-brand" href="#">CRUD PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <?php if ($_SESSION['level'] == 1 || $_SESSION['level']==2) : ?>
                      <li class="nav-item">
                        <a class="nav-link" href="barang.php">Barang</a>
                      </li>
                    <?php endif; ?>
                    
                    <?php if ($_SESSION['level'] == 1 || $_SESSION['level']==3) : ?>
                      <li class="nav-item">
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                      </li>
                    <?php endif; ?>
                    
                      <li class="nav-item">
                        <a class="nav-link" href="crud-modal.php">Akun</a>
                      </li>
                  </ul>
                </div>
                <a class="navbar-brand" href="#"><?= $_SESSION['nama'] ;?></a>
                <a class="btn btn-primary" href="logout.php">Keluar</a>
            </div>
        </nav>
    </div>
