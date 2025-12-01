<?php
?>

<main> <h2>Selamat datang, <?php echo $_SESSION['username'] ?? 'Tamu'; ?>!</h2>
    <p>Ini adalah halaman dashboard kamu.</p>
    
    <a href="index.php?page=logout" style="color:red;">Logout</a>
</main>