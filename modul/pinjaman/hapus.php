<?php
include "../../inc/inc.koneksi.php";
$tableH	= 'pinjaman_header';
$tableD	= 'pinjaman_detail';
$id		= $_POST['id'];
$sql = mysqli_query($konek, "SELECT * FROM $tableH WHERE id_pinjam= '$id'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $tableD WHERE id_pinjam= '$id'";
	mysqli_query($konek, $input);
	$input = "DELETE FROM $tableH WHERE id_pinjam= '$id'";
	mysqli_query($konek, $input);
}
?>