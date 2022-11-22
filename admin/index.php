<?php
error_reporting(0);
session_start();
if (empty($_SESSION['admin'])) {
  header('location: login_form.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Administrator</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <link rel="stylesheet" type="text/css" href="styles/menu.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

</head>
<body>
    <!-- navbar -->
    <div class="container" style="max-width: 100%; background-color: #6495ED;">
        <div class="row" style="height: 50px; box-sizing: border-box;">
            <div class="col-sm-2 header-kiri">Admin</div>
            <div class="col-sm-10 header-kanan">Halaman Administrator</div>
        </div>
    </div>
    <!-- content -->
    <div class="container" style="max-width: 100%;">
        <div class="row">
            <div class="col-sm-2 menu-kiri">
                <!-- menu vertical -->
                <br>
                <ul class="mainmenu">
                    <li><a href="?mod=beranda">Beranda</a></li>
                    <li><a href="#">Karyawan</a>
                      <ul class="submenu">
                        <li><a href="?mod=form_input_karyawan">Input Karyawan</a></li>
                        <li><a href="?mod=data_karyawan">Data karyawan</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Artikel</a>
                      <ul class="submenu">
                        <li><a href="?mod=input_artikel">Input Artikel</a></li>
                        <li><a href="?mod=data_artikel">Data Artikel</a></li>
                      </ul>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- content kanan -->
            <div class="col-sm-10 konten-kanan">
                <div class="container">
<br>
                    <?php
                        include "modul.php";
                    ?>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/popper.min.js"></script>
</body>
</html>
