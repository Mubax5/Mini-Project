<?php
// Membaca data dari file karyawan.txt
$users = [];
$file = fopen("database/data-user.txt", mode: "r");
while (($line = fgets($file)) !== false) {
    $data = explode(":", string: trim($line)); // Pisahkan username dan password
    if (count($data) == 2) {
        $users[$data[0]] = $data[1]; // Simpan dalam array [username => password]
    }
}   

fclose($file);

// Proses login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username']; 
    $password = $_POST['password'];

    // Validasi login
    if (isset($users[$username]) && $users[$username] === $password) {
        header("Location: homepagebarang/homepage.php");
        exit(); 
    } else {
        echo "Login gagal. Username atau password salah.";
        echo "<p><a href='index.php'><i>Kembali ke login page</i></p>";
    }
}
?>
