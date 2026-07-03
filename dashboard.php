<?php

include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin kasir</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h2 class="main-title"> Dashboard Antrean & Monitoring kasir</h2>
    <div class="container">
        
        <div class="kotak-tabel" style="width: 800px;">
            <h3>Daftar Antrean</h3>
            <a href="form.php" style="color: #007BFF; text-decoration:none; font-weight:bold;"> +Tambah Antrean Baru</a>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>kendaraan</th>
                        <th>Plat Nomor</th>
                        <th>Jadwal</th>
                        <th>Jenis service</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor_urut = 1;
                    $query_select = "SELECT * FROM antrean_service ORDER BY id ASC";
                    $exec = $koneksi->query($query_select);
                    while($baris = $exec->fetch_assoc()) :
                    ?>

                    <tr>
                        <td><?= $nomor_urut++;?></td>
                        <td><?= $baris['nama_pelanggan'];?></td>
                        <td><?= $baris['jenis_kendaraan'];?></td>
                        <td><?= $baris['plat_nomor'];?></td>
                        <td><?= date("d-m-Y", strtotime($baris['tanggal_booking']));?></td>
                        <td><?= $baris['jenis_service'];?></td>
                        <td>

                            <?php  if($baris['status_member']== 'Member VIP') :?>
                                <span style="color:green; font-weight:bold;"><?= $baris['status_member'];?></span>
                            <?Php else : ?>
                                <span style="color:red;font-weight:bold"><?= $baris['status_member']; ?></span>

                            <?php endif ; ?>
                        </td>
                        <td>
                            <?php if($baris['total_estimasi']== 0 ):?>
                                <span class="text-warning">Menunggu</span>
                            <?php else : ?>
                                <span>Rp <?= number_format($baris['total_estimasi'],0,',','.');?></span>
                            <?php endif ; ?>
                        </td> 
                        <td class="kolom-aksi">
                            <form action="edit.php" method="GET" style="margin: 0,">
                               <input type="hidden" name="id" value="<?= $baris['id']; ?>">

                                <button type="submit" class="badge-btn btn-input-harga" style="border:none; cursor:pointer;">
                                    Input harga
                                </button>
                            </form>

                            <form action="proses.php" method="POST" style="margin:0;" onsubmit="return confirm('Yakin ingin membatalkan antrean ini?');">
                                <input type="hidden" name="aksi" value="hapus">

                                <input type="hidden" name="id" value="<?= $baris['id']; ?>">

                                <button type="submit" class="badge-btn btn-batal-antrean" style="border:none; cursor:pointer;"> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>