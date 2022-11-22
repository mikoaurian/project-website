<?php
error_reporting(0);
    //status upload
      /* status 0: Sukses
    * status 1: file yang diupload kosong
    * status 2: file bukan file gambar
    * status 3: ukuran file terlalu besar
    * status 4: Gagal menyimpan ke database
    */
    include "koneksi.php";

    $nama     = $_POST['txt_nama'];
    $ttl         = $_POST['txt_ttl'];
    $jk         = $_POST['opt_jk'];
    $agama     = $_POST['txt_agama'];
    $telp         = $_POST['txt_no_tlp'];
    $alamat     = $_POST['txt_alamat'];
    $divisi         = $_POST['cmb_divisi'];

    //kode upload
    $nama_foto = $_FILES['txt_foto']['name'];
    $lokasi_foto = $_FILES['txt_foto']['tmp_name'];
    $ukuran_foto = $_FILES['txt_foto']['size'];
    $tipe_foto = $_FILES['txt_foto']['type'];

    //kode untuk mengganti spasi dan karakter pada nama file
  // serta karakter non alphabet menjadi garis bawah

  $nama_baru = preg_replace("/\s+/", "_", $nama_foto);
  $direktori = "foto/$nama_baru";

  $MAX_FILE_SIZE = 100000; //100kb
  $formatgambar = array("image/jpg", "image/jpeg","image/gif", "image/png");

  //cek apakah file kosong ?
  if(empty($nama) OR empty($ttl) OR empty($jk) OR empty($agama) OR empty($telp)
         OR empty($alamat) OR empty($divisi) OR empty($nama_foto))
  {
    echo "<h4 style='color: red;'>Mohon Lengkapi Data</h4>";
  }
    //cek apakah format file adalah format gambar
  elseif(!in_array($tipe_foto, $formatgambar))
  {
    echo "<h4 style='color: red;'>Format File yang diperbolehkan hanya JPEG, JPG, PNG dan GIF</h4>";
  }
  //cek apakah ukuran file diatas 100kb
  elseif($ukuran_foto > $MAX_FILE_SIZE)
  {
    echo "<h4 style='color: red;'>Maksimum Ukuran Foto 100 KB</h4>";
  }
  else
  {
        // upload file
    move_uploaded_file($lokasi_foto, $direktori);

    $sql = "INSERT INTO tbl_karyawan
            (nomor_induk, nama, tempat_tanggal, jenis_kelamin, agama, alamat, no_tlp, kode_divisi, foto)
        VALUES('', '$nama', '$ttl', '$jk', '$agama', '$alamat', '$telp', '$divisi', '$nama_foto')";

    //masukan nama file kedalam tabel foto di database mysqli
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));

    //cek jika query berhasil
    if($result) {
      echo "<h4 style='color: #6495ED;'>Data Berhasil Disimpan</h4><br>";
      echo "<a href='?mod=data_karyawan' class='btn btn-primary'>
              Lihat Data
            </a>
        ";
    }
    else
    {
      echo "<h4 style='color: red;'>Data gagal disimpan</h4>";
    }

  }
?>

