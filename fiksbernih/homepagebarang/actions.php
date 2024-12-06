<?php
include 'data-barang.php';

// Ambil data dari file
$data = loadData();

// Fungsi untuk membuat data baru
if (isset($_POST['action']) && $_POST['action'] === 'create') {
    $id = count($data) + 1;
    $data[] = [
        'id' => $id,
        'nama' => $_POST['nama'],
        'jumlah-barang' => $_POST['jumlah-barang'],
        'nama-barang' => $_POST['nama-barang']
    ];
    saveData($data);
    header('Location: homepage.php');
    exit;
}

// Fungsi untuk menghapus data
if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $data = array_filter($data, fn($item) => $item['id'] != $id);
    saveData($data);
    header('Location: homepage.php');
    exit;
}

// Fungsi untuk memperbarui data
if (isset($_POST['action']) && $_POST['action'] === 'update') {
    foreach ($data as &$item) {
        if ($item['id'] == $_POST['id']) {
            $item['nama'] = $_POST['nama'];
            $item['jumlah-barang'] = $_POST['jumlah-barang'];
            $item['nama-barang'] = $_POST['nama-barang'];
            break;
        }
    }
    saveData($data);
    header('Location: homepage.php');
    exit;
}
?>
