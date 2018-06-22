<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table	= 'pinjaman_header';
$text	= "SELECT max(id_pinjam) as noakhir
			FROM $table";
$sql 	= mysqli_query($konek, $text);
$row	= mysqli_num_rows($sql);
if ($row>0){
	$r=mysqli_fetch_array($sql);
	$noakhir	= (int) substr($r[noakhir], 2, 4);
	$noakhir++;
	$no = 'P'. sprintf("%04s",$noakhir);
	$data['no']		= $no;
	echo json_encode($data);
}else{
	$data['no']		= 'P0001';
	echo json_encode($data);
}
?>