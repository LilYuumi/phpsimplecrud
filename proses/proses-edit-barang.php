<?php
include('../config/db-config.php');

$id_barang   = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$kategori    = $_POST['kategori'];
$stok        = $_POST['stok'];
$harga       = $_POST['harga'];
$supplier    = $_POST['supplier'];

$query = "UPDATE barang 
          SET nama_barang='$nama_barang', kategori='$kategori', stok='$stok', harga='$harga', supplier='$supplier'
          WHERE id_barang='$id_barang'";

if (mysqli_query($conn, $query)) {
    header("Location: ../data-list.php?status=editsuccess");
} else {
    header("Location: ../data-edit.php?id=$id_barang&status=failed");
}
?>
