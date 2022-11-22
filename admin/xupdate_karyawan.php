<?php 
include "koneksi.php";
$nomor_induk = $_POST['nomor_induk'];
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$no_tlp = $_POST['no_tlp'];
$nama_divisi = $_POST['nama_divisi'];

//kode upload
$lokasi_file = $_FILES['foto']['tmp_name'];
$foto = $_FILES['foto']['nama'];
$tipe_file = $_FILES['foto']['type'];
$ukuran_file = $_FILES['foto']['size'];

//kode untuk mengganti spasi dan karakter pada nama file
//serta karakter non alphabet menjadi garis bawah
$nama_baru = preg_replace("/\s+/", "_", $foto);
$direktori = "foto/$nama_baru";
$max_file_size = 500000; //500kb
$formatgambar = array("image/jpg", "image/jpeg", "image/gif", "image/png");

//jika foto tidak diupdate
if(empty($foto))    {
    $sql = "UPDATE tbl_karyawan SET nama = '$nama',
            tempat_tanggal = '$ttl',
            jenis_kelamin = '$jenis_kelamin',
            agama = '$agama',
            alamat = '$alamat',
            no_tlp = '$no_tlp',
            nama_divisi = '$nama_divisi' WHERE nomor_induk = '$nomor_induk'"
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
}

//jika foto di update
else {
    //cek apakah format file adalah format gambar
    if (!in_array($tipe_file, $formatgambar)) {
        echo "<script>
                alert('Mohon gunakan format foto JPG, JPEG, PNG, dan GIF');
                history.go(-1);
                </script>";
    }
    //cek apakah ukuran file diatas 500kb
    elseif($ukuran_file > $max_file_size) {
        echo "
                <script>
                alert('Maksimal Ukuran Foto 500 KB'}:
                history.go(-1);
                </script>";
    }
    else{
        //code untuk mengkopi file ke folder foto
        move_uploaded_file($lokasi_file, $direktori);
        $sql = "UPDATE tbl_karyawan SET nama = '$nama',
                tempat_tanggal = '$ttl',
                jenis_kelamin = '$jenis_kelamin',
                agama = '$agama',
                alamat = '$alamat',
                no_tlp = '$no_tlp',
                nama_divisi = $nama_divisi',
                foto = '$nama_baru' WHERE nomor_induk = '$nomor_induk'";
                //masukan nama file kedalam tabel foto di database mysql
                $result = mysqli_query($con, $sql) or die(mysqli_error());
    }
}
//cek jika query berhasil
if($result) {
    header('Location: ?mod=data_karyawan');
    exit;
}
?>