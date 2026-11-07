<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Bengkel</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2 class="main-title">Formulir Pendaftaran Service </h2>
    <div class="container">
<div class="kotak-form">
        <form action="proses.php" method="POST">
            
                <label for="">Nama Pelanggan</label>
                <input type="text" name="nama_pelanggan" required > 
            
                <label for="">Plat Nomor</label>
                <input type="text" name="plat_nomor" required placeholder="Plat nomor">
            
                <label for="">Jenis Motor</label>
                <input type="text" name="jenis_kendaraan" required placeholder="Jenis Kendaraan">
                
                <label for="" >Tanggal Booking:</label>
                <input type="date" name="tanggal_booking" required placeholder="Tanggal Booking">
            
                <label for="">Deskripsi Service</label>
                <textarea name="jenis_service" required placeholder="Keluhan..."></textarea>
                
            
                <label style= "margin-top:15px;">
                    <input type="checkbox" name="is_member" value="Ya"> Saya Punya Kartu Member 
                </label>
            
            <button type="submit" name="btn_daftar">Daftar Antrean </button>
        </form>
    </div>
    </div>
</body>
</html>
