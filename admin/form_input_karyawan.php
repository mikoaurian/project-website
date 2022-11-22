    <form enctype="multipart/form-data" action="insert_karyawan.php" method="post" id="formInput">
        <fieldset>
            <legend><h3>Form Input Karyawan</h3></legend>
            <table>
                <tr>
                    <td valign="top">Nama</td>
                    <td valign="top" width="20px" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <input type="text" name="txt_nama" class="form-control" placeholder="Masukkan nama Anda">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Tempat, Tanggal lahir</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <input type="text" placeholder="Jakarta , 25 September 2018" name="txt_ttl" class="form-control">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Jenis Kelamin</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <input type="radio" value="Laki-laki" name="opt_jk"> Laki - laki
                        <input type="radio" value="Perempuan" name="opt_jk"> Perempuan
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Agama</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <input type="text" placeholder="Masukan agama Anda" name="txt_agama" class="form-control">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Telepon</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <input type="text" placeholder="Masukan nomor telepon Anda" name="txt_no_tlp" class="form-control">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Alamat</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <textarea rows="5" name="txt_alamat" class="form-control"></textarea>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Divisi</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <select name="cmb_divisi" class="form-control">
                          <?php
                          include "koneksi.php";
                          $sql = "SELECT * FROM divisi";
                          $list = mysqli_query($con, $sql);
                          while ($data = mysqli_fetch_array($list)) 
                          {
                            $kode_divisi = $data['kode_divisi'];
                            $desk_divisi = $data['desk_divisi'];
                            //echo "<option value= '$data[kode_divisi]' selected>$data[desk_divisi]</option>";
                          
                            ?>

                          <option value="<?php echo $kode_divisi; ?>">
                          <?php echo $desk_divisi; ?>
                          </option>
                          <?php                            
                          }
                          ?>
                        </select>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top">Foto</td>
                    <td valign="top" align="center">:</td>
                    <td>
                      <div class="form-group">
                        <input type="file" name="txt_foto" class="form-control">
                      </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    <br>
    <div id="hasil"></div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#formInput").submit(function(e){
          e.preventDefault();
          $.ajax({
            type : "POST",
            url : "insert_karyawan.php",
            data : new FormData(this),
            contentType : false,
            cache : false,
            processData : false,
            success : function(berhasil){
              $("#hasil").html(berhasil);
            }
          });
        });
      });
    </script>

