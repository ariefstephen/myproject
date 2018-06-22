<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";

$table	= 'pinjaman_header';
$id	= $_POST['cari'];
$text	= "SELECT *
			FROM $table WHERE id_pinjam= '$id'";
$sql 	= mysqli_query($konek, $text);
$row	= mysqli_num_rows($sql);
if ($row>0){
while ($r=mysqli_fetch_array($sql)){	
	
	$data['nomor']	= $r[noanggota];
	$data['tgl']	= jin_date_str($r[tgl]);
	$data['lama']	= $r[lama];
	$data['jml']	= $r[jumlah];
	$data['bunga']	= $r[bunga];
	
	echo json_encode($data);
}
}else{
	$data['nomor']	= '';
	$data['tgl']	= '';
	$data['lama']	= '';
	$data['jml']	= '';
	$data['bunga']	= '';

	echo json_encode($data);
	
}

?>