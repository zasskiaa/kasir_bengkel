<?php


include 'koneksi.php';

if(isset($_POST['btn_daftar'])) {
         $nama = $_POST ['nama_pelanggan'];
         $plat= $_POST ['plat_nomor'];
         $kendaraan= $_POST ['jenis_kendaraan'];
         $tanggal_format= $_POST ['tanggal_booking'];
         $service = $_POST ['jenis_service'];    
         $is_member = isset ($_POST['is_member']) ? "Member VIP": "Bukan Member";

               $estimasi_awal = 0;

               $query_insert = "INSERT INTO antrean_service (nama_pelanggan, plat_nomor, jenis_kendaraan, tanggal_booking, jenis_service, status_member,total_estimasi) Values
               ('$nama', '$plat', '$kendaraan', '$tanggal_format', '$service','$is_member', '$estimasi_awal')" ;


               if ($koneksi->query($query_insert)=== TRUE) {
               header('Location: dashboard.php'); 
               exit();
               }else {
      echo "Error:" . $query_insert . "<br>" . $koneksi->error;
}
}

if (isset($_POST['btn_simpan_harga'])) {

   $id = intval($_POST['id']);
   $harga_baru = intval($_POST['harga_baru']);


      $query_update =
   "UPDATE antrean_service
      SET total_estimasi = '$harga_baru'
      WHERE id='$id'";

      if ($koneksi->query($query_update) === TRUE) {

      header('Location: dashboard.php');
      exit();

   } else {

      echo "Error: " .
            $query_update .
            "<br>" .
            $koneksi->error;
   }
}

// hapus
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aksi']) && $_POST['aksi'] == 'hapus') {
   
$id = intval($_POST ['id']);
   $query_delete = "DELETE FROM antrean_service WHERE id='$id'";

   if ($koneksi->query($query_delete) === TRUE) {
               header('Location: dashboard.php');
               exit();
               }else {
               echo "Error:" . $query_delete . "<br>" . $koneksi->error;
               }
}
   
?>