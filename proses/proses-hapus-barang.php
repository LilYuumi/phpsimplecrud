<?php
include('../config/db-config.php');

$id_barang = $_GET['id_barang'];

$query = "DELETE FROM barang WHERE id_barang='$id_barang'";

if (mysqli_query($conn, $query)) {
    header("Location: ../data-list.php?status=deletesuccess");
} else {
    header("Location: ../data-list.php?status=failed");
}
?>
