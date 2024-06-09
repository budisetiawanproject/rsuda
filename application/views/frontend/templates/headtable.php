<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JDIH KOTA BITUNG</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('./assets/img/logo.png'); ?>">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url(); ?>assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    
        <script type="text/javascript" src="<?= base_url(); ?>assets/js/loader.js"></script>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url(); ?>assets/frontend/css/style.css" rel="stylesheet">
</head>
<?php $page = $this->uri->segment(1);
?>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a style="color: white;" class="nav-link small"><?= $hari; ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">

            <div class="col-lg-6">
                <a href="https://jdih.bitungkota.go.id/"><img class="img-fluid" src="<?= base_url(); ?>assets/frontend/img/bg.png" alt=""></a>
            </div>

            <div class="col-lg-6 text-center text-lg-right">
                <a href="https://jdih.bitungkota.go.id/" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">JDIH<span class="text-secondary font-weight-normal">KOTA BITUNG</span></h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="https://jdih.bitungkota.go.id/" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">JDIH<span class="text-white font-weight-normal">KOTABITUNG</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-fixed navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="<?= base_url('index'); ?>" class="nav-item nav-link <?php if ($page == 'index' || $page == '') {
                                                                                        echo 'active';
                                                                                    } else {
                                                                                    } ?>">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle <?php if ($page == 'visimisi' || $page == 'struktur') {
                                                                        echo 'active';
                                                                    } else {
                                                                    } ?>" data-toggle="dropdown">Tentang Kami</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="<?= base_url('visimisi'); ?>" class="dropdown-item">Visi & Misi</a>
                            <a href="<?= base_url('struktur'); ?>" class="dropdown-item">Struktur Organisasi</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Produk Hukum</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="<?= base_url('produkhukum/daftar/' . $this->secure->encrypt_url('PERDA')); ?>" class="dropdown-item">PERATURAN DAERAH (<?= $perda['jumlah']; ?>)</a>
                            <a href="<?= base_url('produkhukum/daftar/' . $this->secure->encrypt_url('PERWA')); ?>" class="dropdown-item">PERATURAN WALIKOTA (<?= $perwa['jumlah']; ?>)</a>
                            <a href="<?= base_url('produkhukum/daftar/' . $this->secure->encrypt_url('SK WALIKOTA')); ?>" class="dropdown-item">KEPUTUSAN WALIKOTA (<?= $sk['jumlah']; ?>)</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link">Bantuan Hukum</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Informasi</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Berita</a>
                            <a href="#" class="dropdown-item">Wisata</a>
                        </div>
                    </div>
                    <a href="<?= base_url('auth'); ?>" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->