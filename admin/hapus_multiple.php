<?php
  include 'koneksi.php';
  $pilihan = $_POST['data'];
  $jumlah_dipilih = count($pilihan);
  for($x=0; $x < $jumlah_dipilih; $x++){
    mysqli_query($con, "DELETE FROM tbl_karyawan WHERE nomor_induk = '$pilihan[$x]'");
  }
  header("location: ?mod=data_karyawan");
 ?>
