	<!-- link untuk menggunakan fontawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<h3 class="text-center">Data Karyawan</h3>
	<br>
	<table class="table table-hover table-bordered ">
	<thead>
		<tr>
			<th style="text-align: center;">No</th>
			<th style="text-align: center;">Nama</th>
			<th style="text-align: center;">TTL</th>
			<th style="text-align: center;">Jenis Kelamin</th>
			<th style="text-align: center;">Agama</th>
			<th style="text-align: center;">Alamat</th>
			<th style="text-align: center;">Telepon</th>
			<th style="text-align: center;">Divisi</th>
			<th style="text-align: center;">Foto</th>
			<th style="width: 11%; text-align: center;">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
		include"koneksi.php";

		$query = "SELECT * FROM tbl_karyawan";
		$sql	 = mysqli_query($con, $query);
		$no 	 = 1;
		while($data = mysqli_fetch_array($sql)){
			$nomor_induk 	= $data['nomor_induk'];
			$nama			= $data['nama'];
			$ttl			= $data['tempat_tanggal'];
			$jenis_kelamin	= $data['jenis_kelamin'];
			$agama 			= $data['agama'];
			$alamat 		= $data['alamat'];
			$no_tlp			= $data['no_tlp'];
			$nama_divisi	= $data['nama_divisi'];
			$foto 			= $data['foto'];
	?>
		<tr align="center">
			<td><?php echo $no; ?></td>
	 		<td><?php echo $nama; ?></td>
	 		<td><?php echo $ttl; ?></td>
	 		<td><?php echo $jenis_kelamin; ?></td>
	 		<td><?php echo $agama; ?></td>
	 		<td><?php echo $alamat; ?></td>
	 		<td><?php echo $no_tlp; ?></td>
	 		<td><?php echo $nama_divisi; ?></td>
	 		<td>
	 			<center>
	 				<img src='foto/<?php echo $foto; ?>' width='60'>
	 			</center>
	 		</td>
			<td>
	 			<!-- button edit dengan modal -->
	 			<button class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $nomor_induk; ?>">
	 				<!-- icon edit -->
	 				<i class="far fa-edit"></i>
	 			</button>
				<div id="<?php echo $nomor_induk; ?>" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h3>Form Edit Biodata</h3>
								<button class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal Body -->
							<div class="modal-body" style="text-align: left;">
								<?php
									$b = $nomor_induk;
									$a = mysqli_query($con, "select*from tbl_karyawan where nomor_induk='$b'");
									$c = mysqli_fetch_array($a);

								?>
								<form action="?mod=update_karyawan" method="post" enctype="multipart/form-data">
						            <input type="hidden" value="<?php echo $b; ?>" name="nomor_induk">
		                            <div class="form-group">
		                            	<label>Nama</label>
		                                <input value="<?php echo $c['nama']; ?>" type="text" placeholder="Masukan nama lengkap Anda" name="nama" class="form-control">
		                            </div>
		                            <div class="form-group">
		                            	<label>Tempat, Tanggal Lahir</label>
		                                <input value="<?php echo $c['tempat_tanggal']; ?>" type="text" placeholder="12 Oktober 2018" name="ttl" class="form-control">
		                            </div>
		                            <div class="form-group">
		                            	<label>Jenis Kelamin</label> <br>
		                                <input type="radio" value="Laki-laki" name="jenis_kelamin" <?php if($c['jenis_kelamin']=="Laki-laki") echo "checked"; ?>  > Laki - laki
		                                <input type="radio" value="Perempuan" name="jenis_kelamin" <?php if($c['jenis_kelamin']=="Perempuan") echo "checked"; ?>  > Perempuan
		                            </div>
		                            <div class="form-group">
		                            	<label>Agama</label>
		                                <input value="<?php echo $c['agama']; ?>" type="text" placeholder="Masukan agama Anda" name="agama" class="form-control">
		                            </div>
		                            <div class="form-group">
		                            	<label>No Telp</label>
		                                <input value="<?php echo $c['no_tlp']; ?> "type="text" placeholder="Masukan nomor telepon Anda" class="form-control" name="no_tlp">
		                            </div>   					                        
		                            <div class="form-group">
		                            	<label>Alamat</label>
		                                <textarea class="form-control" rows="5" name="alamat"><?php echo $c['alamat']; ?></textarea>
		                            </div>						                        
		                            <div class="form-group">
		                            	<label>Divisi</label>
		                                <select name="nama_divisi" class="form-control">
		                                    <option value="HRD" <?php if($c['nama_divisi']=="HRD") echo "selected"; ?> >HRD</option>
		                                    <option value="Administrasi dan Keuangan" <?php if($c['nama_divisi']=="Administrasi dan Keuangan") echo "selected"; ?> >Administrasi dan Keuangan</option>
		                                    <option value="Marketing" <?php if($c['nama_divisi']=="Marketing") echo "selected"; ?> >Marketing</option>
		                                    <option value="Produksi" <?php if($c['nama_divisi']=="Produksi") echo "selected"; ?> >Produksi</option>
		                                </select>
		                            </div>						              
		                            <div class="form-group">
		                            	<label>Upload Photo</label>
		                                <input type="file" name="foto" class="form-control">
		                                <input type="hidden" name="foto_tmp" value="<?php echo $foto; ?>" class="form-control">
		                            </div>
		                            <div class="form-group">
		                            	<label>Photo</label> <br>
		                                    <img src="foto/<?php echo $c['foto']; ?>" width="100" height="100">
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
					<!-- end modal -->
				</div>
	 			<!-- end button edit -->
	 			<a href='?mod=hapus_karyawan&nomor_induk=<?php echo $nomor_induk; ?>'
					 onclick="return confirm('Data akan dihapus ?')" class="btn btn-primary">
					<!-- icon hapus -->
					<i class="far fa-trash-alt"></i>
				</a>
	 		</td>
		</tr>
	<?php
		$no++;
		}
	?>
	</tbody>
  </table>


