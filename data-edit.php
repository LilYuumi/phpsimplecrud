<?php
include 'config/db-config.php';
include 'template/header.php';

// Ambil ID barang dari URL
if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];
    $query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location: data-list.php");
    exit;
}
?>
<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

<div class="app-wrapper">
    <?php include 'template/navbar.php'; ?>
    <?php include 'template/sidebar.php'; ?>

    <main class="app-main">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Edit Data Barang</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Barang</h3>
                            </div>

                            <form action="proses/update-barang.php" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="id_barang" value="<?= $data['id_barang']; ?>">

                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" value="<?= htmlspecialchars($data['nama_barang']); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" name="kategori" class="form-control" value="<?= htmlspecialchars($data['kategori']); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" name="stok" class="form-control" value="<?= $data['stok']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="harga" class="form-control" value="<?= $data['harga']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <input type="text" name="supplier" class="form-control" value="<?= htmlspecialchars($data['supplier']); ?>" required>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Perbarui</button>
                                    <a href="data-list.php" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'template/footer.php'; ?>
</div>

<?php include 'template/script.php'; ?>
</body>
</html>
