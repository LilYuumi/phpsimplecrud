<?php
// Manggil class Database
require_once(__DIR__ . "/db-config.php");


class MasterData {

    private $db; // Objek koneksi database

    // Konstruktor otomatis jalan saat class diinisialisasi
    public function __construct() {
        // Buat koneksi database
        $this->db = new Database();
    }

    // Nampilin semua barang
    public function getAllBarang() {
        $query = "SELECT * FROM barang ORDER BY id DESC";
        $result = $this->db->conn->query($query);
        return $result;
    }

    // NAmbah barang baru
    public function addBarang($nama, $kategori, $stok, $harga) {
        $nama = $this->db->conn->real_escape_string($nama);
        $kategori = $this->db->conn->real_escape_string($kategori);
        $stok = intval($stok);
        $harga = floatval($harga);

        $query = "INSERT INTO barang (nama, kategori, stok, harga) 
                  VALUES ('$nama', '$kategori', '$stok', '$harga')";
        return $this->db->conn->query($query);
    }

    // Ambnil data barang dari ID
    public function getBarangById($id) {
        $id = intval($id);
        $query = "SELECT * FROM barang WHERE id = '$id'";
        $result = $this->db->conn->query($query);
        return $result->fetch_assoc();
    }

    // Update barang
    public function updateBarang($id, $nama, $kategori, $stok, $harga) {
        $id = intval($id);
        $nama = $this->db->conn->real_escape_string($nama);
        $kategori = $this->db->conn->real_escape_string($kategori);
        $stok = intval($stok);
        $harga = floatval($harga);

        $query = "UPDATE barang 
                  SET nama='$nama', kategori='$kategori', stok='$stok', harga='$harga' 
                  WHERE id='$id'";
        return $this->db->conn->query($query);
    }

    // Hapus barang
    public function deleteBarang($id) {
        $id = intval($id);
        $query = "DELETE FROM barang WHERE id = '$id'";
        return $this->db->conn->query($query);
    }
}
?>
