<?php
function jmlBayar($no) {
	$sql	= "SELECT sum(angsuran+bunga) as total 
				FROM pinjaman_detail
				WHERE id_pinjam='$no'";
	$data	= mysqli_fetch_array(mysqli_query($konek, $sql));
	$row		= mysqli_num_rows(mysqli_query($konek, $sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function sisa($no) {
	$sql	= "SELECT sum(jumlah_bayar) as total 
				FROM pinjaman_detail
				WHERE id_pinjam='$no'";
	$data	= mysqli_fetch_array(mysqli_query($konek, $sql));
	$row		= mysqli_num_rows(mysqli_query($konek, $sql));
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
?>