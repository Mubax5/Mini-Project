<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

input[type="text"], input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

input[type="text"]:focus, input[type="number"]:focus {
    border-color: #4CAF50;
    outline: none;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
    width: 100%;
    margin-top: 10px; /* Menambahkan margin atas untuk memberikan ruang di atas tombol */
    margin-bottom: 20px; /* Menambahkan margin bawah untuk memberikan ruang di bawah tombol */
}
button:hover {
    background-color: #45a049;
}

p {
    text-align: center;
    margin-top: 20px;
}
.btn-kembali {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 5px; 
}

.btn-kembali:hover {
    background-color: #0056b3; 
}
</style>
<body>
    <!-- Form Tambah Data -->
    <form method="POST" action="actions.php">
        <input type="hidden" name="action" value="create">
        <input type="text" name="nama-barang" placeholder="Nama Barang" required>
        <input type="jumlah-barang" name="jumlah-barang"placeholder="Jumlah Barang" required>       
        <button type="submit">Tambah</button>
        <button type="button" class="btn-kembali" onclick="window.location.href='homepage.php'">Kembali</button>
    </form>
    <footer style="text-align: center; margin-top: 20px;">
    <p>&copy; 2024 AlproIjo</p>
</footer>
</body>
</html>
       