<?php
require_once __DIR__ . "/../../config/DatabaseNew.php";

$db = new Database();
$result = $db->query("SELECT * FROM data_barang");
?>
<h2>Data Barang</h2>

<a href="index.php?page=barang/add">+ Tambah Barang</a>

<table border="1" width="100%" style="margin-top:20px;">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id_barang'] ?></td>
    <td><?= $row['nama'] ?></td>
    <td><?= $row['kategori'] ?></td>
    <td><?= $row['harga_beli'] ?></td>
    <td><?= $row['harga_jual'] ?></td>
    <td><?= $row['stok'] ?></td>
    <td>
        <a href="index.php?page=barang/edit&id=<?= $row['id_barang'] ?>">Edit</a> |
        <a href="index.php?page=barang/delete&id=<?= $row['id_barang'] ?>">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
