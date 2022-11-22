<?php
        include "koneksi.php";
        $nomor_induk = $_GET['id'];
        $query  = "SELECT * FROM tbl_karyawan WHERE nomor_induk = '$nomor_induk'";
        $sql    = mysqli_query($con, $query);
        $data = mysqli_fetch_array($sql);
        // memanggil kolom kolom table tbl_karyawan
            $nomor_induk     = $data['nomor_induk'];
            $nama            = $data['nama'];
            $ttl   	         = $data['tempat_tanggal'];
            $jk              = $data['jenis_kelamin'];
            $agama           = $data['agama'];
            $alamat          = $data['alamat'];
            $no_tlp          = $data['no_tlp'];
            $kode_divisi     = $data['kode_divisi'];
            $foto            = $data['foto'];
    ?>
            <fieldset>
                <legend><h3>Detail Karyawan</h3></legend>
                <table>
                    <tr>
                        <td valign="top">Nama</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <input value="<?php echo $nama; ?>" type="text" placeholder="Masukan nama lengkap Anda" name="nama" class="form-control" disabled>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Tempat, Tanggal lahir</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <input  value="<?php echo $ttl; ?>" type="text" placeholder="Jakarta , 30 Oktober 2018" name="ttl" class="form-control" disabled>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Jenis Kelamin</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <input type="radio" value="Laki-laki" name="jenis_kelamin" <?php if($jk=="Laki-laki") echo "checked"; ?> disabled> Laki - laki
                                <input type="radio" value="Perempuan" name="jenis_kelamin" <?php if($jk=="Perempuan") echo "checked"; ?> disabled> Perempuan
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Agama</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <input value="<?php echo $agama; ?>" type="text" placeholder="Masukan agama Anda" name="agama" class="form-control" disabled>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Telepon</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <input value="<?php echo $no_tlp; ?> "type="text" placeholder="Masukan nomor telepon Anda" class="form-control" name="no_tlp" disabled>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Alamat</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="alamat" disabled><?php echo $alamat; ?></textarea>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Divisi</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <select name="nama_divisi" class="form-control">
                                    <?php
                                    $sql_div = "SELECT * FROM divisi";
                                    $query_div = mysqli_query($con, $sql_div);
                                    while($data_div = mysqli_fetch_array($query_div))
                                    {
                                        $desk_divisi = $data_div['desk_divisi'];
                                        $kode_div = $data_div['kode_divisi'];
                                    ?>
                                    <option value="<?php echo $kode_divisi; ?>" <?php if($kode_divisi==$kode_div) echo "selected"; ?> >
                                        <?php echo $desk_divisi;?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td valign="top">Foto</td>
                        <td valign="top" width="20px" align="center">:</td>
                        <td>
                            <div class="form-group">
                                <input type="file" name="foto" disabled>
                                <input type="hidden" name="foto_tmp" value="<?php echo $foto; ?>" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                                <center>
                                    <img src="foto/<?php echo $foto; ?>" width="100" height="100">
                                </center>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                                <button class="btn btn-primary" data-target="#btn_edit" data-toggle="modal">Ubah</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <!-- start modal edit -->

            <div id="btn_edit" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h3>Form Edit Biodata</h3>
                                <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body" style="text-align: left;">
                                <form action="?mod=update_karyawan" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $nomor_induk; ?>" name="nomor_induk">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input value="<?php echo $nama; ?>" type="text" placeholder="Masukan nama lengkap Anda" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat, Tanggal Lahir</label>
                                        <input value="<?php echo $ttl ?>" type="text" placeholder="12 Oktober 2018" name="ttl" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label> <br>
                                        <input type="radio" value="Laki-laki" name="jenis_kelamin" <?php if($jk=="Laki-laki") echo "checked"; ?>  > Laki - laki
                                        <input type="radio" value="Perempuan" name="jenis_kelamin" <?php if($jk=="Perempuan") echo "checked"; ?>  > Perempuan
                                    </div>
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <input value="<?php echo $agama; ?>" type="text" placeholder="Masukan agama Anda" name="agama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input value="<?php echo $no_tlp; ?> "type="text" placeholder="Masukan nomor telepon Anda" class="form-control" name="no_tlp">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" rows="5" name="alamat"><?php echo $alamat; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select name="nama_divisi" class="form-control">
                                            <?php
                                            $sql_div = "SELECT * FROM divisi";
                                            $query_div = mysqli_query($con, $sql_div);
                                            while($data_div = mysqli_fetch_array($query_div))
                                            {
                                                $desk_div = $data_div['desk_divisi'];
                                                $kode_div = $data_div['kode_divisi'];
                                            ?>
                                            <option value="<?php echo $kode_divisi; ?>" <?php if($kode_divisi==$kode_div) echo "selected"; ?> >
                                                <?php echo $desk_div;?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Photo</label>
                                        <input type="file" name="foto" class="form-control">
                                        <input type="hidden" name="foto_tmp" value="<?php echo $foto; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label> <br>
                                            <img src="foto/<?php echo $foto; ?>" width="100" height="100">
                                    </div>
                                    <div class="form-group" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end modal body -->
                        </div>
                        <!-- end modal content -->
                    </div>

            <!-- end modal edit -->
        <br>
        <a href="?mod=form_cari_karyawan">&laquo; halaman sebelumnya</a>
        <br><br><br><br>
