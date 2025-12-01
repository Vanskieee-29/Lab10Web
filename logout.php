<?php
// Hapus: session_start(); (Karena sudah dimulai di index.php)

session_destroy();

// Redirect kembali ke halaman login melalui router utama
header("Location: index.php?page=login");
exit;
?>