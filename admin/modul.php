<?php
$mod = $_GET['mod'];

if($mod == '')
{
	include "beranda.php";
}
else
{
	include "$mod.php";
}
?>