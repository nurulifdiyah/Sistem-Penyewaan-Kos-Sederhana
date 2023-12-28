<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>KOST BU SUNARLIK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/logo.png">
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
                                    <a class="page-scroll" href="penyewa.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="pembayaran.php">Pembayaran</a>
                                </li>
                                </ul>   
                            
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

    </header>
    <!-- ========================= header end ========================= -->
<!-- ========================= content start ========================= -->
<section class="content pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Daftar Kamar</h2>
                <!-- ... (Bagian tabel dan konten lainnya) ... -->

            <button class="btn btn-primary mb-3" onclick="openAddModal()">Pesan Kamar</button>
            <!-- Add Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Pesan Kamar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeAddModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">

                            <!-- Formulir untuk pesan kamar -->
                            <form action="proses_PesanKamar.php" method="post">
                                <div class="mb-3">
                                    <label for="id_kamar" class="form-label">ID Kamar</label>
                                    <input type="text" class="form-control" id="id_kamar" placeholder="Masukkan ID Kamar">
                                </div>
                                <div class="mb-3">
                                    <label for="id_customer" class="form-label">ID Customer</label>
                                    <input type="text" class="form-control" id="id_customer" placeholder="Masukkan ID Customer">
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="datetime-local" class="form-control" id="tanggal">
                                </div>
                                <div class="mb-3">
                                <label for="isi_kamar" class="form-label">Isi Kamar</label>
                                <select class="form-select" id="isi_kamar" onchange="updateHarga()">
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="harga" placeholder="Masukkan Harga" readonly>
                                </div>

                                <script>
                                    function updateHarga() {
                                        var isiKamar = document.getElementById("isi_kamar").value;
                                        var hargaInput = document.getElementById("harga");

                                        // Set harga otomatis berdasarkan pilihan isi_kamar
                                        if (isiKamar === "single") {
                                            hargaInput.value = "500.000";
                                        } else if (isiKamar === "double") {
                                            hargaInput.value = "1.000.000";
                                        }
                                    }

                                    // Panggil updateHarga() untuk menginisialisasi harga
                                    updateHarga();
                                </script>

                                <div id="loadingMessage"></div>
                                <div id="loadingSpinner" style="display: none;">Loading...</div>
                                <div class="alert alert-success" id="successAlert" role="alert" style="display: none;">
                                    Pemesanan berhasil! Terima kasih sudah menggunakan layanan kami.
                                    </div>

                            </form>
                        </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeAddModal()">Batal</button>
                            <button type="button" class="btn btn-primary" onclick="addPemesanan()">Pesan</button>
                        </div>
                    </div>
                </div>
            </div>

     
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Kamar</th>
                            <th>Kasur</th>
                            <th>Lemari</th>
                            <th>Meja Belajar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    include 'db.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from kamar");
                    while($d = mysqli_fetch_array($data)){                        
                        ?>
                 <tr>
                     <td><?php echo $d['id_kamar']; ?></td>
                     <td><?php echo $d['kasur']; ?></td>
                     <td><?php echo $d['lemari']; ?></td>
                     <td><?php echo $d['meja_belajar']; ?></td>
                     <td><?php echo $d['status']; ?></td>
                     
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
<!-- ========================= content end ========================= -->

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
        $('#id_kamar').val('');
        $('#id_customer').val('');
        $('#tanggal').val('');
        $('#isi_kamar').val('');
        $('#harga').val('');

        // Open the modal
        $('#addModal').modal('show');
    }

    function closeAddModal() {
        // Close the modal
        $('#addModal').modal('hide');
    }

    function addPemesanan() {
    // Get input values from the form
    let id_kamar = $('#id_kamar').val();
    let id_customer = $('#id_customer').val();
    let tanggal = $('#tanggal').val();
    let isi_kamar = $('#isi_kamar').val();
    let harga = $('#harga').val();

    // Perform any additional validation if needed

    // Show a loading message or spinner
    $('#loadingMessage').text('Sedang memproses, harap tunggu...');
    $('#loadingSpinner').show(); // Assuming you have a loading spinner element

    // Process adding data to the database using AJAX
    $.ajax({
        type: 'POST',
        url: 'proses_PesanKamar.php',
        data: {
            id_kamar: id_kamar,
            id_customer: id_customer,
            tanggal: tanggal,
            isi_kamar: isi_kamar,
            harga: harga
        },
        success: function(response) {
            console.log(response); // Log the response from the server

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