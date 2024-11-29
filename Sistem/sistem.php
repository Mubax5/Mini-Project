<?php
// Fungsi untuk validasi pengguna
function validasiPengguna($username, $password) {
  $file = fopen("pengguna.txt", "r");
  while (($line = fgets($file)) !== false) {
    list($user, $pass) = explode("|", $line);
    if ($user == $username && $pass == $password) {
      return true;
    }
  }
  fclose($file);
  return false;
}

// Fungsi untuk membuat database barang
function buatDatabaseBarang() {
  $file = fopen("barang.txt", "w");
  fclose($file);
}

// Fungsi untuk menambah data barang
function tambahDataBarang($namaBarang) {
  $file = fopen("barang.txt", "a");
  fwrite($file, $namaBarang . "\n");
  fclose($file);
}

// Fungsi untuk mengubah data barang
function ubahDataBarang($namaBarangLama, $namaBarangBaru) {
  $file = fopen("barang.txt", "r");
  $data = array();
  while (($line = fgets($file)) !== false) {
    if ($line == $namaBarangLama . "\n") {
      $data[] = $namaBarangBaru . "\n";
    } else {
      $data[] = $line;
    }
  }
  fclose($file);
  $file = fopen("barang.txt", "w");
  foreach ($data as $line) {
    fwrite($file, $line);
  }
  fclose($file);
}

// Fungsi untuk menghapus data barang
function hapusDataBarang($namaBarang) {
  $file = fopen("barang.txt", "r");
  $data = array();
  while (($line = fgets($file)) !== false) {
    if ($line != $namaBarang . "\n") {
      $data[] = $line;
    }
  }
  fclose($file);
  $file = fopen("barang.txt", "w");
  foreach ($data as $line) {
    fwrite($file, $line);
  }
  fclose($file);
}

// Fungsi untuk mencari data barang
function cariDataBarang($namaBarang) {
  $file = fopen("barang.txt", "r");
  while (($line = fgets($file)) !== false) {
    if ($line == $namaBarang . "\n") {
      return true;
    }
  }
  fclose($file);
  return false;
}

// Fungsi untuk menampilkan keseluruhan data barang
function tampilkanDataBarang() {
  $file = fopen("barang.txt", "r");
  while (($line = fgets($file)) !== false) {
    echo $line;
  }
  fclose($file);
}

// Form login
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (validasiPengguna($username, $password)) {
    header("Location: halaman_utama.php");
  } else {
    echo "Username atau password salah";
  }
}

// Halaman utama
if (isset($_GET['halaman'])) {
  if ($_GET['halaman'] == 'utama') {
    ?> 
    <h1>Halaman Utama</h1>
    <ul>
      <li><a href="?halaman=buat_database">Buat Database Barang</a></li>
      <li><a href="?halaman=tambah_barang">Tambah Data Barang</a></li>
      <li><a href="?halaman=ubah_barang">Ubah Data Barang</a></li>
      <li><a href="?halaman=hapus_barang">Hapus Data Barang</a></li>
      <li><a href="?halaman=cari_barang">Cari Data Barang</a></li>
      <li><a href="?halaman=tampilkan_barang">Tampilkan Data Barang</a></li>
    </ul>
    <?php
  } elseif ($_GET['halaman'] == 'buat_database') {
    buatDatabaseBarang();
    echo "Database barang berhasil dibuat";
  } elseif ($_GET['halaman'] == 'tambah_barang') {
    if (isset($_POST['tambah'])) {
      $namaBarang = $_POST['nama_barang'];
      tambahDataBarang($namaBarang);
      echo "Data barang berhasil ditambah";
    } else {
      ?>
      <form action="" method="post">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang">
        <input type="submit" name="tambah" value="Tambah">
      </form>
      <?php
    }
} elseif ($_GET['halaman'] == 'hapus_barang') {
    if (isset($_POST['hapus'])) {
      $namaBarang = $_POST['nama_barang'];
      hapusDataBarang($namaBarang);
      echo "Data barang berhasil dihapus";
    } else {
      ?>
      <form action="" method="post">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>
        
        <input type="submit" name="hapus" value="Hapus">
      </form>
      <?php
    }
  } elseif ($_GET['halaman'] == 'cari_barang') {
    if (isset($_POST['cari'])) {
      $namaBarang = $_POST['nama_barang'];
      if (cariDataBarang($namaBarang)) {
        echo "Data barang ditemukan: " . $namaBarang;
      } else {
        echo "Data barang tidak ditemukan";
      }
    } else {
      ?>
      <form action="" method="post">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" required>
        
        <input type="submit" name="cari" value="Cari">
      </form>
      <?php
    }
  } elseif ($_GET['halaman'] == 'tampilkan_barang') {
    echo "<h1>Data Barang</h1>";
    tampilkanDataBarang();
  }
}