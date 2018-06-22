<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "koperasi_pds";
 
$konek = mysqli_connect($server, $username, $password, $database);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>