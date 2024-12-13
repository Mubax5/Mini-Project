<!-- Proses Register -->

<?php
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $filename = 'database/data-user.txt';

    $new_data = "\n$user:$pass";

    if (file_exists($filename)) {
        // Menambahkan data baru ke file
        file_put_contents($filename, $new_data, FILE_APPEND);

        // Redirect ke dashboard setelah data ditambahkan
        header('Location: home.html');
        exit;
    } else {
        echo "File tidak ditemukan!";
    }
?>