<?php
include 'daftar-barang.php';

// Ambil data dari file
$data = loadData();

// Fungsi untuk membuat data baru
if (isset($_POST['action']) && $_POST['action'] === 'create') {
    $id = count($data) + 1;
    $data[] = [
        'id' => $id,
        'nama' => $_POST['nama'],
        'nama-barang' => $_POST['nama-barang'],
        'jumlah-barang' => $_POST['jumlah-barang']
    ];
    saveData($data);
    header('Location: dashboard.php');
    exit;
}

// Fungsi untuk menghapus data
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $data = array_filter($data, fn($item) => $item['id'] != $id);
    saveData($data);
    header('Location: dashboard.php');
    exit;
}

// Fungsi untuk memperbarui data
if (isset($_POST['action']) && $_POST['action'] === 'update') {
    foreach ($data as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['nama'] = $_POST['nama'];
            $item['nama-barang'] = $_POST['nama-barang'];
            $item['jumlah-barang'] = $_POST['jumlah-barang'];
            break;
        }
    }
    saveData($data);
    header('Location: dashboard.php');
    exit;
}
?>
