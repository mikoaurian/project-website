<?php
include  "koneksi.php";
$no = $_GET['nomor_induk'];

// menghapus file pada folder foto
$cek = "SELECT kol_foto FROM tbl_karyawan WHERE nomor_induk = '$no'";
$query_cek = mysqli_query($con,$cek);
$data = mysqli_fetch_array($query_cek);
$foto = $data['kol_foto'];

// hapus File
unlink("foto/".$foto);

// hapus data pada tabel tbl_karyawan
$query = "DELETE FROM tbl_karyawan WHERE nomor_induk = '$no'";
$hapus = mysqli_query($con, $query) or die(mysqli_error());

if($hapus)
{
	echo "<meta http-equiv='refresh' content='0; url=?mod=data_karyawan'>";

} 
else
{
	header("location: ?mod=data_karyawan");
}
?>