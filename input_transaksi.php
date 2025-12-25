<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi</title>
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
        <h1>Input Data Transaksi</h1>
    </header>
    <section>
        <form action="input_transaksi.php" method="POST">

            <label>No. Transaski</label>
            <input type="text" name="no_transaksi" required>
            
            <label>Tanggal</label>
            <input type="date" name="tanggal" required>
            
            <label>Nama Pelanggan</label>
            <input type="text" name="nmpelanggan" required>
            
            <label>Jumlah</label>
            <input type="text" name="jumlah">
            
            <label>Harga Satuan</label>
            <input type="text" name="hrgsatuan" required>

            <label>Total</label>
            <input type="text" name="total" required>

            <label>Jumlah Bayar</label>
            <input type="text" name="jmlhbayar" required>

            <label>Kembalian</label>
            <input type="text" name="kembalian" required>
            
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
    $no_transaksi = $_POST['no_transaksi'];
    $tanggal = $_POST['tanggal'];
    $nmpelanggan = $_POST['nmpelanggan'];
    $jumlah = $_POST['jumlah'];
    $hrgsatuan = $_POST['hrgsatuan'];
    $total = $_POST['total'];
    $jmlhbayar = $_POST['jmlhbayar'];
    $kembalian = $_POST['kembalian'];

    // Mencegah SQL injection
    $no_transaksi = $konek->mysqli_real_escape_string($no_transaksi);
    $tanggal = $konek ->mysqli_real_escape_string($tanggal);
    $nmpelanggan = $konek ->mysqli_real_escape_string($nmpelanggan);
    $jumlah = $konek ->mysqli_real_escape_string($jumlah);
    $hrgsatuan = $konek ->mysqli_real_escape_string($hrgsatuan);
    $total = $konek ->mysqli_real_escape_string($total);
    $jmlhbayar = $konek ->mysqli_real_escape_string($jmlhbayar);
    $kembalian = $konek ->mysqli_real_escape_string($kembalian);

    // Query untuk memasukkan data ke tabel
    $sql = "INSERT INTO tbltransaksi (no_transaksi, tanggal, nmpelanggan, jumlah, hrgsatuan, total, jmlhbayar, kembalian)
            VALUES ('$no_transaksi', '$tanggal', '$nmpelanggan', '$jumlah', '$hrgsatuan', '$total', 'jmlhbayar', '$kembalian')";

    if (mysqli_query($konek, $sql)) {
        // Data berhasil disimpan, redirect to pelanggan.php
        header("Location: input_transaksi.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($konek);
    }
}

// Menutup koneksi database
mysqli_close($konek);
?>
