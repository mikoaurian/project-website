
	<h3 class="text-center">Data Karyawan</h3>
	<table class="table table-hover table-bordered ">
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
	include"koneksi.php";
	$kode_divisi 	= $_GET['kode_divisi'];

	//startpagination
	$sqlcount 	= "SELECT COUNT(nomor_induk) FROM tbl_karyawan WHERE kode_divisi = '$kode_divisi' ";
	$rscount 	= mysqli_fetch_array(mysqli_query($con, $sqlcount));
	$banyakdata   = $rscount[0];
	// jika page ada nilai maka tampilkan page, jika tidak maka tampilkan page1
	$page		= isset($_GET['page']) ? $_GET['page'] : 1;
	$limit		= 5;
	$mulai_dari 	= $limit * ($page -1);
	//endpagination

	$query	     	= "SELECT * FROM tbl_karyawan, divisi WHERE
						tbl_karyawan.kode_divisi = divisi.kode_divisi AND
						tbl_karyawan.kode_divisi = '$kode_divisi' ORDER BY
						tbl_karyawan.nomor_induk DESC LIMIT $mulai_dari, $limit";
	$sql		= mysqli_query($con, $query);
	$no 		= ($page * $limit)-4 ;
	while($data = mysqli_fetch_array($sql)){
		$nomor_induk 	= $data['nomor_induk'];
		$nama			= $data['nama'];
		$ttl			= $data['tempat_tanggal'];
		$jenis_kelamin	= $data['jenis_kelamin'];
		$agama 		= $data['agama'];
		$alamat 		= $data['alamat'];
		$no_tlp		= $data['no_tlp'];
		$desk_divisi		= $data['desk_divisi'];
		$foto 			= $data['foto'];
	?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $nomor_induk; ?></td>
	 		<td><?php echo $nama; ?></td>
	 		<td><?php echo $ttl; ?></td>
	 		<td><?php echo $jenis_kelamin; ?></td>
	 		<td><?php echo $agama; ?></td>
	 		<td><?php echo $alamat; ?></td>
	 		<td><?php echo $no_tlp; ?></td>
	 		<td><?php echo $desk_divisi; ?></td>
	 		<td>
	 			<center>
	 				<img src='foto/<?php echo $foto; ?>' width='100' height='100'>
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
									$a = mysqli_query($con, "SELECT * FROM tbl_karyawan WHERE nomor_induk='$b'");
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
		                                	<?php
		                                	$sql_div 	= "SELECT * FROM divisi";
		                                	$query_div 	= mysqli_query($con, $sql_div);
		                                	while($data_div = mysqli_fetch_array($query_div))
		                                	{
		                                		$desk_divisi = $data_div['desk_divisi'];
		                                		$kode_divisi = $data_div['kode_divisi'];
		                                	?>
		                                    <option value="<?php echo $kode_divisi; ?>" <?php if($c['kode_divisi']==$kode_divisi) echo "selected"; ?> >
		                                    	<?php echo $desk_divisi;?>
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

	<?php
		// membuat pagination
		$banyakhalaman = ceil($banyakdata / $limit);  // ceil=membulatkan ke atas
		echo 'Halaman : ';
		for($i=1; $i <=$banyakhalaman; $i++)
		{
			if($page != $i)
			{
				echo '[<a href="?mod=data_karyawan&page='.$i.'">' .$i. '</a>]';
			}
			else
			{
				echo "[$i]";
			}
		}

	?>
	<br><br>
  <h5>Lihat Berdasarkan Divisi</h5>
  <ol>
  	<?php
  	$sql_filter     = "SELECT * FROM divisi";
	$query_filter = mysqli_query($con, $sql_filter);
	while($data_filter = mysqli_fetch_array($query_filter))
	{
  	?>
  	<li>
  		<a href="?mod=lihat_divisi&kode_divisi=<?php echo $data_filter['kode_divisi']; ?>">
  			<?php echo $data_filter['desk_divisi']; ?>
  		</a>
  	</li>
  	<?php } ?>
  	<li><a href="?mod=data_karyawan">Semua Data</a></li>
  </ol>


