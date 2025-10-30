<?php
include('../config/db-config.php');

$nama_barang = $_POST['nama_barang'];
$kategori    = $_POST['kategori'];
$stok        = $_POST['stok'];
$harga       = $_POST['harga'];
$supplier    = $_POST['supplier'];

$query = "INSERT INTO barang (nama_barang, kategori, stok, harga, supplier) 
          VALUES ('$nama_barang', '$kategori', '$stok', '$harga', '$supplier')";

if (mysqli_query($conn, $query)) {
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    header("Location: ../data-input.php?status=failed");
}
?>
