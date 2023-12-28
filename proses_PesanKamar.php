<?php
// koneksi database
include 'db.php';

// menangkap data yang di kirim dari form
$id_kamar = $_POST['id_kamar'];
$id_customer = $_POST['id_customer'];
$tanggal = $_POST['tanggal'];
$isi_kamar = $_POST['isi_kamar'];
$harga = $_POST['harga'];

// prepare and bind
$stmt = $koneksi->prepare("INSERT INTO pemesanan (id_kamar, id_customer, tanggal, isi_kamar, harga) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $id_kamar, $id_customer, $tanggal, $isi_kamar, $harga);


// ...
// menjalankan query
$result = $stmt->execute();

// memeriksa apakah query berhasil
if ($result) {
    header("location:kamar.php?pesan=berhasil");
} else {
    // tangani kesalahan, mungkin menampilkannya atau menampilkan pesan kesalahan kepada pengguna
    echo "Error: " . $stmt->error;
}
// ...

// close the statement and connection
$stmt->close();
$koneksi->close();
?>
