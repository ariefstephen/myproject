<?php
include "inc/inc.koneksi.php";
session_start();
$mod = $_GET['module'];
if ($mod=='home'){
	echo "<h2>Selamat Datang</h2>";
	echo "Hai, <b>$_SESSION[namauser] </b> Selamat datang  di Sistem Informasi Koperasi";	
}
elseif ($mod=='jenis'){
    include "modul/jenis/jenis.php";
}
elseif ($mod=='anggota'){
    include "modul/anggota/anggota.php";
}
//buatlah form user berdasarkan form anggota
elseif ($mod=='simpanan'){
    include "modul/simpanan/simpanan.php";
}
//buatlah form pengambilan berdasarkan form simpanan
elseif ($mod=='pinjaman'){
	
	if($_SESSION[isadmin] == 'Y'){
		include "modul/pinjaman/pinjaman.php";
	} else
		include "modul/pinjaman/pinjaman_anggota.php";
}
elseif ($mod=='bayar'){
    include "modul/bayar/bayar.php";
}
elseif ($mod=='users'){
    include "modul/user/user.php";
}
elseif ($mod=='bunga'){
	if($_SESSION[isadmin] == 'Y'){
		include "modul/bunga/bunga.php";
	}
}
else{
  echo "<b>MODUL BELUM ADA ATAU BELUM LENGKAP SILAHKAN BUAT SENDIRI</b>";
}
?>