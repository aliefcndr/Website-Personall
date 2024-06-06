<?php
include 'koneksi.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    
    // Hapus data terkait di tabel pembayaran
    $query_pembayaran = "DELETE FROM pembayaran WHERE nisn IN (SELECT nisn FROM siswa WHERE id_kelas='$id')";
    $hasil_query_pembayaran = mysqli_query($koneksi, $query_pembayaran);

    // Periksa query, apakah ada kesalahan
    if (!$hasil_query_pembayaran) {
        die("Gagal menghapus data terkait di tabel pembayaran: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    // Hapus data terkait di tabel siswa
    $query_siswa = "DELETE FROM siswa WHERE id_kelas='$id'";
    $hasil_query_siswa = mysqli_query($koneksi, $query_siswa);

    // Periksa query, apakah ada kesalahan
    if (!$hasil_query_siswa) {
        die("Gagal menghapus data terkait di tabel siswa: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }

    // Hapus data di tabel kelas
    $query_kelas = "DELETE FROM kelas WHERE id_kelas='$id'";
    $hasil_query_kelas = mysqli_query($koneksi, $query_kelas);

    // Periksa query, apakah ada kesalahan
    if (!$hasil_query_kelas) {
        die("Gagal menghapus data di tabel kelas: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil dihapus.');window.location='kelas.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');window.location='kelas.php';</script>";
}
?>
