<style type="text/css">
  a:hover{
    text-decoration: none;

  }
  a:hover table{
    background-color: #fff;
    border-radius: 5px;

  }
</style>
<?php
  include "koneksi.php";
  $nama = $_POST['nama'];
  //$nama = $_GET['test'];

  $sql = "SELECT * FROM tbl_karyawan WHERE nama LIKE '%$nama%'";
  $query = mysqli_query($con,$sql);
  $jumlah = mysqli_num_rows($query);

  if ($jumlah > 0) 
  {
    while ($data = mysqli_fetch_array($query)) 
    {
      $nm = $data['nama'];
      $foto = $data['foto'];
      $jk = $data['jenis_kelamin'];
      $alamat = $data['alamat'];
      $id = $data['nomor_induk'];
      echo "
        <a href='?mod=detail_karyawan&id=$id'>
          <table width='100%'>
            <tr>
              <td colspan='3'>
                <h5 style='color: #6459ED; margin-left:10px;'>$nm</h5>
                <br>
              </td>
            </tr>
            <tr>
              <td rowspan='2' width='80' align='center'>
                <img src='foto/$foto' width='60'>
              </td>
              <td>$jk</td>
            </tr>
            <tr>
              <td>$alamat</td>
            </tr>
          </table>
        </a>
        <br>
      ";
    }
  }
  else 
  {
    echo"<h4>Data Tidak Ditemukan</h4>";
  }
 ?>
