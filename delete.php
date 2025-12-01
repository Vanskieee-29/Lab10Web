<?php
require_once __DIR__ . "/../../config/DatabaseNew.php";

$db = new Database();
$id = $_GET['id'] ?? null;

if ($id) {
    $id = (int)$id;

    $delete = $db->delete("data_barang", "id_barang = $id");

    header("Location: index.php?page=barang/list");
    exit;
}

header("Location: index.php?page=barang/list");
exit;
