<?php
require_once __DIR__ . "/../../config/DatabaseNew.php";
$db = new Database();

// 1. Ambil ID dari URL
$id_barang = $_GET['id'] ?? null;
if (!$id_barang) {
    header("Location: index.php?page=barang/list");
    exit;
}

// Escape ID
$id_barang = (int)$id_barang;

// ============================================
// A. PROSES UPDATE
// ============================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = [
        'nama'       => $_POST['nama'],
        'kategori'   => $_POST['kategori'],
        'harga_jual' => $_POST['harga_jual'],
        'harga_beli' => $_POST['harga_beli'],
        'stok'       => $_POST['stok']
    ];

    $update = $db->update("data_barang", $data, "id_barang = $id_barang");

    if ($update) {
        header("Location: index.php?page=barang/list");
        exit;
    } else {
        $error = "Gagal menyimpan perubahan!";
    }
}


// ============================================
// B. AMBIL DATA LAMA
// ============================================
$data_barang = $db->get("data_barang", "id_barang = $id_barang");

if (!$data_barang) {
    header("Location: index.php?page=barang/list");
    exit;
}
?>

<h2>Edit Barang: <?= $data_barang['nama']; ?></h2>

<?php if (!empty($error)): ?>
<p style="color:red;"><?= $error; ?></p>
<?php endif; ?>

<form method="post">
    Nama: <input name="nama" type="text" value="<?= $data_barang['nama']; ?>" required><br><br>
    Kategori: <input name="kategori" type="text" value="<?= $data_barang['kategori']; ?>"><br><br>
    Harga Jual: <input name="harga_jual" type="number" min="0" value="<?= $data_barang['harga_jual']; ?>" required><br><br>
    Harga Beli: <input name="harga_beli" type="number" min="0" value="<?= $data_barang['harga_beli']; ?>" required><br><br>
    Stok: <input name="stok" type="number" min="0" value="<?= $data_barang['stok']; ?>" required><br><br>

    <button type="submit">Update</button>
</form>
