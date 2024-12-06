<?php
$message = "";
$users = [];
$file_path = "database/karyawan.txt";

if (!file_exists($file_path)) {
    file_put_contents($file_path, ""); // Buat file kosong jika belum ada
}
$file = fopen($file_path, "r");
while (($line = fgets($file)) !== false) {
    $data = explode(":", trim($line));
    if (count($data) == 2) {
        $users[$data[0]] = $data[1];
    }
}
fclose($file);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'add_account') {
        $new_username = trim($_POST['username']);
        $new_password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if (empty($new_username) || empty($new_password) || empty($confirm_password)) {
            $message = "Semua field wajib diisi!";
        } elseif ($new_password !== $confirm_password) {
            $message = "Password dan Confirm Password tidak cocok!";
        } elseif (isset($users[$new_username])) {
            $message = "Username sudah ada!";
        } else {
            $file = fopen($file_path, "a");
            fwrite($file, $new_username . ":" . $new_password . "\n");
            fclose($file);
            $message = "Akun baru berhasil ditambahkan untuk $new_username!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup Result</title>
</head>
<body>
    <div class="message">
        <?php if (!empty($message)) echo htmlspecialchars($message); ?>
    </div>
    <a href="index.php">Kembali ke halaman login</a>
</body>
</html>
