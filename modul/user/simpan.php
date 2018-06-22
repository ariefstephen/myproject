<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="anggota";
$no		=$_POST[no];
$id		=$_POST[id];
$nama	=$_POST[nama];
$jk		=$_POST[jk];
$tempat	=$_POST[tempat];
$tgl	=jin_date_sql($_POST[tgl]);
$alamat	=$_POST[alamat];
$hp		=$_POST[hp];
$pwd	=md5('koperasi');
$sql = mysqli_query($konek, "SELECT *
				   FROM $table 
				   WHERE noanggota= '$no'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$input	= "UPDATE $table SET noidentitas	='$id',
								namaanggota		='$nama',
								jk				='$jk',
								tempat_lahir	='$tempat',
								tgl_lahir		='$tgl',
								alamat			='$alamat',
								hp				='$hp'
					WHERE noanggota= '$no'";
	mysqli_query($konek, $input);								
	echo "<b>Data Sukses diubah</b>";
}else{
	$input = "INSERT INTO $table (noanggota,noidentitas,namaanggota,jk,tempat_lahir,tgl_lahir,alamat,hp,pwd)
				VALUES('$no','$id','$nama','$jk','$tempat','$tgl','$alamat','$hp','$pwd')";
	mysqli_query($konek, $input);
	echo "<b>Data sukses disimpan</b>";
}	
?>