<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_nkitventory");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi ke database berhasil!";
?>
