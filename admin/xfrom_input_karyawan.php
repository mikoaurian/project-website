<select name="cmb_divisi" class=form-control'>
<?php
include "koneksi.php";
$sql = "SELECT * FROM divisi";
$list = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($list)){
    $kode_divisi = $data['kode_divisi'];
    $desk_divisi = $data['desk_divisi'];
?>
<option value="<?= $kode_divisi ; ?>">
<?= $desk_divisi; ?>
</option>
<?php } ?>
</select>