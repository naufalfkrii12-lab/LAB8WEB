<?php
include("koneksi.php");

// Mengambil seluruh data barang
$sql = "SELECT * FROM data_barang ORDER BY id_barang ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="style.css" rel="stylesheet" type="text/css">

    <title>Data Barang</title>
</head>

<body>

<div class="container">

    <h1>Data Barang</h1>

    <div class="main">

        <a href="tambah.php">+ Tambah Barang</a>

        <table>

            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php if (mysqli_num_rows($result) > 0): ?>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>

                <tr>

                    <td>
                        <?php if (!empty($row['gambar'])): ?>
                            <img
                                src="gambar/<?= htmlspecialchars(basename($row['gambar']), ENT_QUOTES, 'UTF-8'); ?>"
                                alt="<?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                            Tidak ada gambar
                        <?php endif; ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['nama']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['kategori']); ?>
                    </td>

                    <td>
                        Rp <?= number_format($row['harga_beli'], 0, ',', '.'); ?>
                    </td>

                    <td>
                        Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['stok']); ?>
                    </td>

                    <td>

                        <a href="ubah.php?id=<?= (int)$row['id_barang']; ?>">
                            Ubah
                        </a>

                        <a
                            href="hapus.php?id=<?= (int)$row['id_barang']; ?>"
                            onclick="return confirm('Apakah kamu yakin ingin menghapus barang ini?');">
                            Hapus
                        </a>

                    </td>

                </tr>

                <?php endwhile; ?>

            <?php else: ?>

                <tr>
                    <td colspan="7">Belum ada data barang.</td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
