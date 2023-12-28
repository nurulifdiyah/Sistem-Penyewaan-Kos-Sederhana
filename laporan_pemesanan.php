<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:login.php");
} 

?>




<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KOST BU SUNARLIK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap-5.0.0-beta1.min.css">
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/glightbox.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- ========================= header start ========================= -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="page-scroll" href="laporan_pemesanan.php">Laporan Pemesanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="admin.php">Konfirmasi Pemesanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="logout.php">Logout</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

    </header>
    <section class="content pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Daftar Laporan Pemesanan</h2>
                <!-- ... (Bagian tabel dan konten lainnya) ... -->

            

     
                <table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>ID Laporan Pemesanan</th>
            <th>ID Pembayaran</th>
            <th>Jenis Pembayaran</th>
            <th>No Rekening / No eMoney</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include 'db.php';
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM laporan_pemesanan");
        while($d = mysqli_fetch_array($data)){                        
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['id_laporan_pemesanan']; ?></td>
                <td><?php echo $d['id_pembayaran']; ?></td>
                <td><?php echo $d['jenis_pembayaran']; ?></td>
                <td><?php echo $d['no_rekeningno_emoney']; ?></td>
            </tr>
        <?php 
        }
        ?>
    </tbody>
</table>

            </div>
        </div>
    </div>
</section>




     <!-- ========================= footer start ========================= -->
     <footer class="footer pt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="footer-widget mb-60 wow fadeInLeft" data-wow-delay=".2s">
                        <p class="mb-30 footer-desc">Kos kami adalah salah satu Kos Nyaman dan Terjangkau! Temukan rumah kedua Anda di tempat kami. Fasilitas lengkap, lokasi strategis, dan harga terbaik!</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget mb-60 wow fadeInUp" data-wow-delay=".6s">
                        <h4>Fasilitas</h4>
                        <ul class="footer-links">
                            <li>
                                <a href="javascript:void(0)">Free Wifi</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Free Furniture</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Kamar Luas</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget mb-60 wow fadeInRight" data-wow-delay=".8s">
                        <h4>Contact</h4>
                        <ul class="footer-contact">
                            <li>
                                <p>WA : +6282131927145</p>
                            </li>
                            <li>
                                <p>Email : kosbusunarlik@gmail.com</p>
                            </li>
                            <li>
                                <p>Ig : @kosbusunarlik</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- <div class="copyright-area">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-social-links">
                            <ul class="d-flex">
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram-filled"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </footer>
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-arrow-up"></i>
    </a>


    

    <!-- ========================= JS here ========================= -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle-5.0.0-beta1.min.js"></script>
    <script src="assets/js/contact-form.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/imagesloaded.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>