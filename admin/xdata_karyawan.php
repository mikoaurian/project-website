<h3> class="text-center">Data Karyawan</h3>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Divisi</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        include "koneksi.php";
        $query = "SELECT * FROM tbl_karyawan";
        $sql = mysqli_query($con, $query);
        $no = 1 ;
        while ($data = mysqli_fetch_array($sql)) {
            $nomor_induk = $data ['nomor_induk'];
            $nama = $data ['nama'];
            $ttl = $data ['tempat_tanggal'];
            $agama = $data ['agama'];
            $alamat = $data ['alamat'];
            $no_tlp = $data ['no_tlp'];
            $nama_divisi = $data ['nama_divisi'];
            $foto = $data ['foto'];
        }
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $no_induk; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $ttl; ?></td>
            <td><?php echo $jenis_kelamin; ?></td>
            <td><?php echo $agama; ?></td>
            <td><?php echo $alamat; ?></td>
            <td><?php echo $no_tlp; ?></td>
            <td><?php echo $nama_divisi; ?></td>
            <td>
                <center>
                    <img src='foto/<?php echo $foto ; ?>' width='60'>
                </center>
            </td>
            <td>
                <a href='?mod=form_edit_karyawan&nomor_induk=<?php echo $nomor_induk; ?>'></a>
                <a href='?mod=hapus_karyawan&nomor_induk=<?php echo $nomor_induk ; ?>' onclick="return 
                confirm('Data akan dihapus ?')">Hapus</a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>