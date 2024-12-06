<?php
include 'data.php';

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
    <title>Dashboard Input Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        form {
            display: inline;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            color: #4CAF50;
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
    <h1>STOCK BARANG</h1>

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
                        <!-- Form Edit -->
                        <form method="POST" action="actions.php" style="display:inline;">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <input type="text" name="nama-barang" value="<?= htmlspecialchars($item['nama-barang']) ?>" required>
                            <input type="text" name="jumlah-barang" value="<?= htmlspecialchars($item['jumlah-barang']) ?>" required>
                            <button type="submit">Edit</button>
                        </form>

                        <!-- Tombol Hapus -->
                        <a href="actions.php?action=delete&id=<?= $item['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p>
        Ada barang baru? <a href="formtambahdata.php">Tambah Data</a>
    </p>
    <footer style="text-align: center; margin-top: 20px;">
        <p>
            Kepo sama programer kita? <a href="profilpengembang.html">Liat disini!</a>
        </p>
        <p>&copy;2024 AlproIjo</p>
    </footer>
    <hr>
</body>
</html>
