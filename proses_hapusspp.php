<?php
include 'koneksi.php';
$id = $_GET["id"];

// Jalankan query DELETE untuk menghapus data terkait di tabel siswa
$query_siswa = "DELETE FROM siswa WHERE id_spp='$id'";
$hasil_query_siswa = mysqli_query($koneksi, $query_siswa);

// Periksa query, apakah ada kesalahan
if (!$hasil_query_siswa) {
    die ("Gagal menghapus data terkait di tabel siswa: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
} 

// Jalankan query DELETE untuk menghapus data di tabel spp
$query_spp = "DELETE FROM spp WHERE id_spp='$id'";
$hasil_query_spp = mysqli_query($koneksi, $query_spp);

// Periksa query, apakah ada kesalahan
if (!$hasil_query_spp) {
    die ("Gagal menghapus data di tabel spp: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='spp.php';</script>";
}
?>
