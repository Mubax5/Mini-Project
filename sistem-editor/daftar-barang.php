<?php
// Array data awal
$data = [

];

// Fungsi untuk menyimpan data ke file
function saveData($data) {
    file_put_contents('daftar-barang.txt', json_encode($data));
}

// Fungsi untuk membaca data dari file
function loadData() {
    if (file_exists('daftar-barang.txt')) {
        return json_decode(file_get_contents('daftar-barang.txt'), true);
    }
    return [];
}

// Membuat file data
if (!file_exists('daftar-barang.txt')) {
    saveData($data);
}
?>
