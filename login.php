<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . "/../../config/DatabaseNew.php";

// Buat objek database OOP
$db = new Database();
$conn = $db->getConnection(); // mengambil koneksi mysqli dari class

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Query cek admin
    $sql = "SELECT username, password FROM admin WHERE username='$username' LIMIT 1";
    $result = $db->query($sql);

    if ($result && $result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // VERIFIKASI PASSWORD (plain text versi lama)
        if ($password === $user['password']) {

            $_SESSION['username'] = $user['username'];

            header("Location: /lab9_php_modular1/project/index.php?page=dashboard");
exit;
            exit;
        } else {
            $error = "Username atau password salah!";
        }

    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/style.css">
</head>
<body>
<div style="width:300px;margin:100px auto;padding:20px;border:1px solid #ccc;">
    <h2>Login Admin</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?= $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
