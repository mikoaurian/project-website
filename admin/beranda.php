<?php
error_reporting(0);
session_start();
if (empty($_SESSION['admin'])) {
	header('location: login_form.php');
}
?>
<h2>Selamat Datang Di Halaman Administrator</h2>
<p>
	Silahkan lakukan perubahan pada data yang diperlukan
</p>