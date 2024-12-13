<?php
include 'daftar-barang.php';

// Ambil data dari file
$data = loadData();

$search = isset($_GET['search']) ? $_GET['search'] : '';
$filteredData = array_filter($data, function($item) use ($search) {
    return stripos($item['nama-barang'], $search) !== false;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: antiquewhite;
            margin: 0;
            padding: 20px;
        }

        .Title{
            background-color: #8371fd;
            padding: 2rem;
            margin: 1rem;
            border-radius: 30px;
        }

        .Title h1 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }

        table {
            background-color: #f4f4f4;
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
        }
        tbody {
            border-radius: 30px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #8371fd;
            color: white;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        form {
            display: inline;
        }

        button {
            background-color: #8371fd;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #5c4ebc;
        }

        a {
            color: #5c4ebc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
        }

        .search-form {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }

        .search-form input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
        }

        .search-form button {
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>
<body>
    <div class="Title">
        <h1>DASHBOARD DATA BARANG</h1>
    </div>

    <!-- Form Pencarian -->
    <form method="GET" class="search-form">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Cari barang...">
        <button type="submit">Cari</button>
    </form>

    <!-- Tabel Data -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Edit barang</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filteredData as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= htmlspecialchars($item['nama-barang']) ?></td>
                    <td><?= htmlspecialchars($item['jumlah-barang']) ?></td>
                    <td>
                        <form method="POST" action="sistem.php" style="display:inline;">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <input type="text" name="nama-barang" value="<?= htmlspecialchars($item['nama-barang']) ?>" required>
                            <input type="text" name="jumlah-barang" value="<?= htmlspecialchars($item['jumlah-barang']) ?>" required>
                            <button type="submit">Edit</button>
                        </form>
                        <a href="sistem.php?action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Apakah anda benar-benar ingin menghapus barang ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        Masukan Barang Baru? <a href="tambah-barang.php">Tambah Barang</a>
    </p>
    <footer style="text-align: center; margin-top: 20px;">
    <hr>
</body>
</html>
