<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "config/database.php";

// Ambil halaman dari URL
$page = $_GET['page'] ?? 'dashboard';

// Jika halaman bukan login dan belum login → redirect
if (!isset($_SESSION['username']) && $page !== "login") {
    header("Location: index.php?page=login");
    exit;
}

// Jika bukan halaman login → tampilkan header
if ($page !== "login") {
    include "views/header.php";
}

// Routing utama
switch ($page) {

    case "login":
        include "modules/auth/login.php";
        include "views/footer.php";
        exit;

    case "logout":
        include "modules/auth/logout.php";
        exit;

    case "dashboard":
        include "views/dashboard.php";
        break;

    // BARANG MODULE
    case "barang/list":
        include "modules/barang/list.php";
        break;

    case "barang/add":
        include "modules/barang/add.php";
        break;

    case "barang/delete":
        include "modules/barang/delete.php";
        break;

case "barang/edit":
        include "modules/barang/edit.php";
        break;

    default:
        echo "<h2>404 - Halaman tidak ditemukan</h2>";
}

// Footer selalu tampil kecuali halaman login
if ($page !== "login") { 
    include "views/footer.php";
}