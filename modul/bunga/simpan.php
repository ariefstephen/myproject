<?php
session_start();
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="bunga";
$jml		=$_POST[jml];
$userid		= $_SESSION[namauser];

$text	= "SELECT *	FROM $table";
$sql 	= mysqli_query($konek, $text);
$row	= mysqli_num_rows($sql);
if ($row>0){
	$input = "UPDATE $table set jumlah = '$jml'";
	mysqli_query($konek, $input);
	echo "<b>Data sukses disimpan</b>";
} else {
	$input = "INSERT INTO $table (jumlah) 
			  VALUES('$jml')";
	mysqli_query($konek, $input);
	echo "<b>Data sukses disimpan</b>";
}
?>