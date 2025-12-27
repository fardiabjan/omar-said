<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pelanggan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], select {
            margin-bottom: 15px;
            padding: 8px;
            font-size: 14px;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Input Data Pelanggan</h1>
    </header>
    <section>
        <form action="input_pelanggan.php" method="POST">

            <label>Nama Pelanggan</label>
            <input type="text" name="nama" required>
            
            <label>No Hp</label>
            <input type="text" name="hp" required>
            
            <label>Alamat</label>
            <input type="text" name="alamat" required>
            
            <label>Jenis Kelamin</label>
            <select name="jk">
                <option>-</option>
                <option value="laki-laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
            </select>
            
            <label>Kode Pangkalan</label>
            <input type="text" name="kdpangkalan" required>
            
            <button type="submit" name="proses">Simpan</button>
            <button type="button" onclick="location.href='index.php';">Kembali</button>
        </form>
    </section>
</body>
</html>

<?php
// Menghubungkan ke database
include "koneksi.php";

// Proses simpan data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $kdpangkalan = $_POST['kdpangkalan'];

    // Mencegah SQL injection
    $nama = mysqli_real_escape_string($konek, $nama);
    $hp = mysqli_real_escape_string($konek, $hp);
    $alamat = mysqli_real_escape_string($konek, $alamat);
    $jk = mysqli_real_escape_string($konek, $jk);
    $kdpangkalan = mysqli_real_escape_string($konek, $kdpangkalan);

    // Query untuk memasukkan data ke tabel
    $sql = "INSERT INTO pelanggan (nmpelanggan, nohp, alamat, jk, kdpangkalan)
            VALUES ('$nama', '$hp', '$alamat', '$jk', '$kdpangkalan')";

    if (mysqli_query($konek, $sql)) {
        // Data berhasil disimpan, redirect to pelanggan.php
        header("Location: input_pelanggan.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    } 
}

// Menutup koneksi database
mysqli_close($konek);
?>
