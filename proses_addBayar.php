<?php
include 'db.php';

$id_pembayaran = $_POST['id_pembayaran'];
$id_jenis = $_POST['id_jenis'];
$id_no = $_POST['id_no'];

$stmt = $koneksi->prepare("INSERT INTO laporan_pemesanan (id_pembayaran, jenis_pembayaran, no_rekeningno_emoney) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $id_pembayaran, $id_jenis, $id_no);

$insert_result = $stmt->execute();

// Check if insertion was successful
if ($insert_result) {
    // Delete data from 'pembayaran' table
    $stmt_delete = $koneksi->prepare("DELETE FROM pembayaran WHERE id_pembayaran = ?");
    $stmt_delete->bind_param("s", $id_pembayaran);

    $delete_result = $stmt_delete->execute();

    if ($delete_result) {
        echo "Success";
    } else {
        echo "Error deleting from pembayaran: " . $stmt_delete->error;
    }
} else {
    echo "Error inserting into pembayaran: " . $stmt->error;
}

// Close the statements and connection
$stmt->close();
$stmt_delete->close();
$koneksi->close();
?>
