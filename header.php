<!DOCTYPE html>
<html>
<head>
    <title>Modular App</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<body>

<nav>
    <div class="nav-container">
        <a href="index.php?page=dashboard">Dashboard</a>
        <a href="index.php?page=barang/list">Data Barang</a>
        <a href="index.php?page=barang/add">Tambah Barang</a>

        <?php if (isset($_SESSION['username'])): ?>
            <a href="index.php?page=logout" style="color:white; background-color:#dc3545;">Logout</a>
        <?php else: ?>
            <a href="index.php?page=login">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="content">
<hr>

