<?php 
include 'koneksi.php';

$id_antrean = isset($_GET['id']) ? $_GET['id'] : 0;

$query_data = "SELECT * FROM antrean_service WHERE id = '$id_antrean'";
$hasil = mysqli_query($koneksi, $query_data);
$data_lama = mysqli_fetch_assoc($hasil);

if (!$data_lama) {
    die("Data tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Harga service</title>
     <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2 style="color: #007BFF; text-align: center">Pengecekan Selesai: Input Biaya service</h2>

    <div class="container">
        <div class="kotak-form">
            <form action="proses.php" method="POST">

            <input type="hidden" name="id" value="<?= $data_lama['id'] ?>">
            
            <label>Pelanggan & kendaraan:</label>
            <input type="text" value="<?= $data_lama['nama_pelanggan']?> - <?= $data_lama['jenis_kendaraan']?> (<?= $data_lama['plat_nomor'] ?>)" readonly style="background-color: #eee;">

            <label>Keluhan / Request Service:</label>
            <textarea readonly style="background-color: #eee;"><?= $data_lama['jenis_service']?> </textarea>

            <label> Status Pelanggan:</label>
            <input type="text" value="<?= $data_lama['status_member']?>" readonly style="background-color: #eee;">

            <hr style="border: 1px dashed #ccc; margin: 20px 0;">

            <label style="color: green; font-size: 16px;"> Masukkan Total Estimasi Harga (Rp):</label>

            <input type="number" 
            name="harga_baru" 
            required placeholder="contoh: 150000" style="width:100%; padding:10px; border-radius:5px; border:1px solid #ccc;">

            <button type="submit" name="btn_simpan_harga" style="background-color: green, transform 0.3s linear;">Simpan Harga</button>

            <a href="dashboard.php" 
            style="display:block; 
        
            text-align:center;
            margin-top:10px; 
            color: red; 
            font-size: 13px;
            text-decoration: none;
            font-family: inherit;
            ">
            <b>Batal & kembali</b></a>
            </form>
        </div>
    </div>
    
</body>
</html>
