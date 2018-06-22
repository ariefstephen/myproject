<?php
include "../../inc/inc.koneksi.php";
$table		="jenis_simpan";
$id		=$_POST[id];
$jenis	=$_POST[jenis];
$jml	=$_POST[jml];

$sql = mysqli_query($konek, "SELECT *
				   FROM $table 
				   WHERE id_jenis= '$id'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$input	= "UPDATE $table SET jenis_simpanan	='$jenis',
								jumlah			='$jml'
					WHERE id_jenis= '$id'";
	mysqli_query($konek, $input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table (id_jenis,jenis_simpanan,jumlah)
				VALUES('$id','$jenis','$jml')";
	mysqli_query($konek, $input);
	echo "<b>Data sukses disimpan</b>";
}	
?>