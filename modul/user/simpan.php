<?php
include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
$table		="users";
$no			=$_POST[no];
$username	=$_POST[username];
$password	=md5($_POST[password]);
$isadmin	=$_POST[isadmin];

$sql = mysqli_query($konek, "SELECT *
				   FROM $table 
				   WHERE no_anggota= '$no'");
$row	= mysqli_num_rows($sql);
if ($row>0){
	$r=mysqli_fetch_array($sql);
	if ($r[no_anggota] == $no){
		echo "<script>alert('No. Anggota sudah memiliki user')</script>";
	} else {
		$input	= "UPDATE $table SET user_id		='$username',
									password		='$password',
									is_admin		='$isadmin',
									no_anggota		='$no',
									is_aktif		='Y',
									is_delete		='N'
						WHERE user_id= '$username' AND no_anggota = '$no'";
		mysqli_query($konek, $input);								
		echo "<b>Data Sukses diubah</b>";
	}
}else{
	$input = "INSERT INTO $table (user_id,password,is_admin,no_anggota,is_Aktif,is_delete)
				VALUES('$username','$password','$isadmin','$no','Y','N')";
	mysqli_query($konek, $input);
	echo "<b>Data sukses disimpan</b>";
}	
?>