<?php
include "../../inc/inc.koneksi.php";
$table	= 'simpanan';
$id		= $_POST['id'];
$sql 	= mysqli_query($konek, "SELECT * FROM $table WHERE id_simpanan= '$id'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$input = "DELETE FROM $table WHERE id_simpanan= '$id'";
	mysqli_query($konek, $input);
}
?>