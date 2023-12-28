<?php
include 'db.php';

$id_pemesanan = $_POST['id_pemesanan'];
$id_jenis = $_POST['id_jenis'];
$id_no = $_POST['id_no'];

$stmt = $koneksi->prepare("INSERT INTO pembayaran (id_pemesanan, jenis_pembayaran, no_rekeningno_emoney) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id_pemesanan, $id_jenis, $id_no);

$insert_result = $stmt->execute();

// Check if insertion was successful
if ($insert_result) {
    // Delete data from 'pemesanan' table
    $stmt_delete = $koneksi->prepare("DELETE FROM pemesanan WHERE id_pemesanan = ?");
    $stmt_delete->bind_param("s", $id_pemesanan);

    $delete_result = $stmt_delete->execute();

    if ($delete_result) {
        echo "Success";
    } else {
        echo "Error deleting from pemesanan: " . $stmt_delete->error;
    }
} else {
    echo "Error inserting into pembayaran: " . $stmt->error;
}

// Close the statements and connection
$stmt->close();
$stmt_delete->close();
$koneksi->close();
?>
