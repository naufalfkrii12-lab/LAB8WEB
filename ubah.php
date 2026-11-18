<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $id          = (int) $_POST['id'];
    $nama        = $_POST['nama'];
    $kategori    = $_POST['kategori'];
    $harga_jual  = $_POST['harga_jual'];
    $harga_beli  = $_POST['harga_beli'];
    $stok        = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar      = null;

    if ($file_gambar['error'] == 0) {
        $filename    = str_replace(' ', '_', basename($file_gambar['name']));
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    if (!empty($gambar)) {
        $sql  = "UPDATE data_barang SET nama=?, kategori=?, harga_jual=?, harga_beli=?, stok=?, gambar=?
                 WHERE id_barang=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssddisi",
            $nama, $kategori, $harga_jual, $harga_beli, $stok, $gambar, $id);
    } else {
        $sql  = "UPDATE data_barang SET nama=?, kategori=?, harga_jual=?, harga_beli=?, stok=?
                 WHERE id_barang=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssddii",
            $nama, $kategori, $harga_jual, $harga_beli, $stok, $id);
    }
    mysqli_stmt_execute($stmt);

    header('location: index.php');
    exit;
}

// ambil data lama untuk ditampilkan di form
$id     = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$sql    = "SELECT * FROM data_barang WHERE id_barang = $id";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_assoc($result);
if (!$data) die('Error: Data tidak ditemukan');

function is_select($var, $val) {
    if ($var == $val) return 'selected="selected"';
    return '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Ubah Barang</title>
</head>
<body>
<div class="container">
    <h1>Ubah Barang</h1>
    <div class="main">
        <form method="post" action="ubah.php" enctype="multipart/form-data">
            <div class="input">
                <label>Nama Barang</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" />
            </div>
            <div class="input">
                <label>Kategori</label>
                <select name="kategori">
                    <option <?= is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
                    <option <?= is_select('Elektronik', $data['kategori']); ?> value="Elektronik">Elektronik</option>
                    <option <?= is_select('Hand Phone', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
                </select>
            </div>
            <div class="input">
                <label>Harga Jual</label>
                <input type="text" name="harga_jual" value="<?= $data['harga_jual']; ?>" />
            </div>
            <div class="input">
                <label>Harga Beli</label>
                <input type="text" name="harga_beli" value="<?= $data['harga_beli']; ?>" />
            </div>
            <div class="input">
                <label>Stok</label>
                <input type="text" name="stok" value="<?= $data['stok']; ?>" />
            </div>
            <div class="input">
                <label>File Gambar</label>
                <input type="file" name="file_gambar" />
            </div>
            <div class="submit">
                <input type="hidden" name="id" value="<?= $data['id_barang']; ?>" />
                <input type="submit" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</div>
</body>
</html>