
<?php
// Fungsi untuk menampilkan pesan error
function tampilkan_error($error) {
    echo '<div class="error">' . $error . '</div>';
}

// Fungsi untuk menampilkan pesan sukses
function tampilkan_sukses($sukses) {
    echo '<div class="sukses">' . $sukses . '</div>';
}

// Fungsi untuk memproses login
function proses_login($username, $password) {
    // Simpan data pengguna dalam array
    $pengguna = array(
        'admin' => 'password123',
        'user' => 'password456'
    );

    // Cek apakah username dan password benar
    if (isset($pengguna[$username]) && $pengguna[$username] == $password) {
        // Jika benar, tampilkan pesan sukses
        tampilkan_sukses('Login berhasil!');
        // Simpan data pengguna dalam session
        $_SESSION['username'] = $username;
        // Redirect ke halaman dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Jika salah, tampilkan pesan error
        tampilkan_error('Username atau password salah!');
    }
}

// Fungsi untuk memproses registrasi
function proses_registrasi($username, $password, $konfirmasi_password) {
    // Simpan data pengguna dalam array
    $pengguna = array(
        'admin' => 'password123',
        'user' => 'password456'
    );

    // Cek apakah username sudah digunakan
    if (isset($pengguna[$username])) {
        // Jika sudah digunakan, tampilkan pesan error
        tampilkan_error('Username sudah digunakan!');
    } elseif ($password != $konfirmasi_password) {
        // Jika password tidak cocok, tampilkan pesan error
        tampilkan_error('Password tidak cocok!');
    } else {
        // Jika semua data benar, tambahkan pengguna baru
        $pengguna[$username] = $password;
        // Tampilkan pesan sukses
        tampilkan_sukses('Registrasi berhasil!');
        // Redirect ke halaman login
        header('Location: login.php');
        exit;
    }
}

// Cek apakah tombol login ditekan
if (isset($_POST['login'])) {
    // Proses login
    proses_login($_POST['username'], $_POST['password']);
}

// Cek apakah tombol registrasi ditekan
if (isset($_POST['registrasi'])) {
    // Proses registrasi
    proses_registrasi($_POST['username'], $_POST['password'], $_POST['konfirmasi_password']);
}
?>

<!-- Halaman login -->
<form action="" method="post">
    <h2>Login</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="login" value="Login">
</form>

<!-- Halaman registrasi -->
<form action="" method="post">
    <h2>Registrasi</h2>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="konfirmasi_password">Konfirmasi Password:</label>
    <input type="password" id="konfirmasi_password" name="konfirmasi_password"><br><br>
    <input type="submit" name="registrasi" value="Registrasi">
</form>