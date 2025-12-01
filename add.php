<?php
require_once __DIR__ . "/../../config/DatabaseNew.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = [
        'nama'       => $_POST['nama'],
        'kategori'   => $_POST['kategori'],
        'harga_jual' => $_POST['harga_jual'],
        'harga_beli' => $_POST['harga_beli'],
        'stok'       => $_POST['stok']
    ];

    $insert = $db->insert("data_barang", $data);

    if ($insert) {
        header("Location: index.php?page=barang/list");
        exit;
    } else {
        echo "<p style='color:red;'>Gagal menyimpan data!</p>";
    }
}
?>

<h2>Tambah Barang</h2>

<form method="post">
    Nama: <input name="nama" type="text" required><br><br>
    Kategori: <input name="kategori" type="text"><br><br>
    Harga Jual: <input name="harga_jual" type="number" min="0" required><br><br>
    Harga Beli: <input name="harga_beli" type="number" min="0" required><br><br>
    Stok: <input name="stok" type="number" min="0" required><br><br>

    <button type="submit">Simpan</button>
</form>
