<?php 
session_start();
require_once 'config/koneksi.php';

if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$page = @$_GET['p'];
$aksi = @$_GET['aksi'];

?>
<!-- <pre>
<?php var_dump($_SESSION['login']);  ?>
</pre> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php
            if($page == 'skripsi') {
                if($aksi == 'tambah') {
                    echo "Tambah Skripsi";
                } else if($aksi == 'ubah') {
                    echo "Ubah Skripsi";
                } else {
                    echo "Halaman Skripsi";
                }
                
            } else if($page == 'anggota') {
                if($aksi == 'tambah') {
                    echo "Tambah Anggota";
                } else if($aksi == 'ubah') {
                    echo "Ubah Anggota";
                } else {
                    echo "Halaman Anggota";
                }
            } else if($page == 'transaksi') {
                if($aksi == 'tambah') {
                    echo "Tambah Transaksi";
                } else {
                    echo "Halaman Transaksi";
                }
            } else {
                echo "Dashboard";
            }

            ?>
        </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/fontawesomeall.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Perpustakaan</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="?p=anggota">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                Data Anggota
                            </a>
                            <a class="nav-link" href="?p=skripsi">
                                <div class="sb-nav-link-icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                                Data Skripsi
                            </a>
                            <a class="nav-link" href="?p=transaksi">
                                <div class="sb-nav-link-icon"><i class="fa fa-handshake" aria-hidden="true"></i></div>
                                Transaksi
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <marquee behavior="scroll" class="btn btn-dark">Selamat Datang <b><?= $_SESSION['login']['nama']; ?></b> Aplikasi Peminjaman Skripsi</marquee>
                    <div class="container-fluid">   
                    <?php 

                    if($page == 'skripsi') {
                        if($aksi == '') {
                            require_once 'page/skripsi/skripsi.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/skripsi/tambah.php';
                        } else if($aksi == 'ubah') {
                            require_once 'page/skripsi/ubah.php';
                        } else if($aksi == 'hapus') {
                            require_once 'page/skripsi/hapus.php';
                        }
                    } else if($page == 'anggota') {
                        if($aksi == '') {
                            require_once 'page/anggota/anggota.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/anggota/tambah.php';
                        } else if($aksi == 'ubah') {
                            require_once 'page/anggota/ubah.php';
                        } else if($aksi == 'hapus') {
                            require_once 'page/anggota/hapus.php';
                        }
                    } else if($page == 'transaksi') {
                        if($aksi == '') {
                            require_once 'page/transaksi/transaksi.php';
                        } else if($aksi == 'tambah') {
                            require_once 'page/transaksi/tambah.php';
                        } else if($aksi == 'kembali') {
                            require_once 'page/transaksi/kembali.php';
                        } else if($aksi == 'perpanjang') {
                            require_once 'page/transaksi/perpanjang.php';
                        }
                    } else { ?>
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">dashboard</li>
                        </ol>
                        <o1 class="breadcrumb mb-4">    
                            <l1 class="card-body">Judul1</l1>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul2</l2>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul3</l2>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul4</l2>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul5</l2>
                            <img src="cover.png" width="150" height="200">
                        </o1>
                        </ol>
                        <o1 class="breadcrumb mb-4">    
                            <l1 class="card-body">Judul6</l1>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul7</l2>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul8</l2>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul9</l2>
                            <img src="cover.png" width="150" height="200">
                            <l2 class="card-body">Judul10</l2>
                            <img src="cover.png" width="150" height="200">
                        </o1>
                        
                    <?php
                    }
                    ?>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
