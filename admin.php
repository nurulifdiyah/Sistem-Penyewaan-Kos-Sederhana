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
                <h2>Daftar Pemesanan</h2>
                <!-- ... (Bagian tabel dan konten lainnya) ... -->

            

     
                <table class="table table-striped">
                <thead>
    <tr>
        <th>ID Pemesanan</th>
        <th>ID Kamar</th>
        <th>ID Customer</th>
        <th>Tanggal</th>
        <th>Isi Kamar</th>
        <th>Harga</th>
        <th>Aksi</th> <!-- Kolom Aksi -->
    </tr>
</thead>
<tbody>
    <?php 
    include 'db.php';
    $no = 1;
    $dataPemesanan = mysqli_query($koneksi, "SELECT * FROM pemesanan");
    while ($pemesanan = mysqli_fetch_array($dataPemesanan)) {
    ?>
        <tr>
            <td><?php echo $pemesanan['id_pemesanan']; ?></td>
            <td><?php echo $pemesanan['id_kamar']; ?></td>
            <td><?php echo $pemesanan['id_customer']; ?></td>
            <td><?php echo $pemesanan['tanggal']; ?></td>
            <td><?php echo $pemesanan['isi_kamar']; ?></td>
            <td><?php echo $pemesanan['harga']; ?></td>
            <td>
                <!-- Tombol Konfirmasi -->
               
             <button class="btn btn-success" onclick="openAddModal(<?php echo $pemesanan['id_pemesanan']; ?>)">Konfirmasi</button>
             <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Konfirmasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeAddModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="proses_addKonfirmasi.php" method="post">
                                <div class="mb-3">
                                    <label for="id_pemesanan" class="form-label">ID Pemesanan</label>
                                    <input type="text" class="form-control" id="id_pemesanan" placeholder="Masukkan ID Customer">
                                </div>
                                <div class="mb-3">
                                    <label for="id_jenis" class="form-label">Jenis pembayarn</label>
                                    <input type="text" class="form-control" id="id_jenis">
                                </div>
                                <div class="mb-3">
                                    <label for="id_no" class="form-label">No Rekening atau E-money</label>
                                    <input type="text" class="form-control" id="id_no">
                                </div>
                                </form>     
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary" onclick="addKonfirmasi()">Ya, Konfirmasi Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
            </td>
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


    <script>
    function openAddModal() {
        // Clear input values before showing the modal
        $('#id_pemesanan').val('');
        $('#id_jenis').val('');
        $('#id_no').val('');
       

        // Open the modal
        $('#addModal').modal('show');
    }

    function closeAddModal() {
        // Close the modal
        $('#addModal').modal('hide');
    }

    function addKonfirmasi() {
    // Get input values from the form
    let id_pemesanan = $('#id_pemesanan').val();
    let id_jenis = $('#id_jenis').val();
    let id_no = $('#id_no').val();
    // Perform any additional validation if needed

    // Show a loading message or spinner
    $('#loadingMessage').text('Sedang memproses, harap tunggu...');
    $('#loadingSpinner').show(); // Assuming you have a loading spinner element

    // Process adding data to the database using AJAX
    $.ajax({
        type: 'POST',
        url: 'proses_addKonfirmasi.php',
        data: {
            id_pemesanan: id_pemesanan,
            id_jenis: id_jenis,
            id_no: id_no,
        },
        success: function(response) {
            console.log(response); // Log the response from the server
            if (response.trim() === 'Success') {
            window.location.href = 'admin.php';
        }
            // Setelah berhasil menambahkan, tutup modal, perbarui data kamar, dan sembunyikan pesan/loading spinner
            closeAddModal();
            fetchKamar(); // Assuming you have a function to update room data
            $('#loadingSpinner').hide();
            $('#loadingMessage').text('Terima Kasih Sudah Percaya dengan kos kami, tunggu validasi dari tim kami yaa'); // Clear the loading message

            // Tampilkan pesan alert
            $('#successAlert').show();
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', xhr.responseText);

            // Handle errors as needed

            // Hide the message/loading spinner
            $('#loadingSpinner').hide();
            $('#loadingMessage').text('Terjadi kesalahan saat mengirim data ke server'); // Clear the loading message
        },
        complete: function() {
            // This function will be called regardless of success or error
            console.log('AJAX request completed.');
        }
    });
}
    
</script>

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