<h3>Cari Daftar Karyawan</h3>
<br>
<form id="form_cari">
  <div class="form-group">
    <div class="input-group mb-2">
      <input type="text" class="form-control" placeholder="Username" id="txt_cari">
      <div class="input-group-prepend">
        <div class="input-group-text">
          <i class="fas fa-search"></i>
        </div>
      </div>
    </div>
  </div>
</form>
<br>
<div class="hasil_cari"></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#txt_cari").keyup(function(e){
      e.preventDefault();
      var nama = $("#txt_cari").val();
      $.ajax({
        type: "GET",
        url: "proses_cari.php",
        data: "nama="+nama,
        success: function(berhasil) {
          $("#hasil_cari").html(berhasil);
        }
      });
    });
  });
</script>
