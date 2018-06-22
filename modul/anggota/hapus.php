<?php
include "../../inc/inc.koneksi.php";
$table	= 'anggota';
$id		= $_POST['id'];
$sql 	= mysqli_query($konek, "SELECT * FROM $table WHERE noanggota= '$id'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE noanggota= '$id'";
	mysqli_query($konek, $input);
}
?>