<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="bunga";
$jml		=$_POST[jml];
$userid		= $_SESSION[namauser];
$input = "UPDATE $table set jumlah = '$jml'";
mysqli_query($konek, $input);
echo "<b>Data sukses disimpan</b>";
?>