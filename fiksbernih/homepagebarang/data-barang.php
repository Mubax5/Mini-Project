<?php
// Array data awal
$data = [
    ['id' => 1, 'nama-barang' => 'Samsu reptil', 'jumlah-barang' => '12'],
    ['id' => 2, 'nama-barang' => 'Gudang Gula isi 16', 'jumlah-barang' => '15'],
    ['id' => 3, 'nama-barang' => 'gula gula ', 'jumlah-barang' => '15']
];

// Fungsi untuk menyimpan data ke file
function saveData($data) {
    file_put_contents('data.json', json_encode($data));
}

// Fungsi untuk membaca data dari file
function loadData() {
    if (file_exists('data.json')) {
        return json_decode(file_get_contents('data.json'), true);
    }
    return [];
}

// Saat pertama kali dijalankan, buat file data
if (!file_exists('data.json')) {
    saveData($data);
}
?>