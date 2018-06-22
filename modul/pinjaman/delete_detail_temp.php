<?php
include "../../inc/inc.koneksi.php";
$table		="pinjaman_detail_temp";
$no			=$_POST[no];
$cicilan	=$_POST[i];
$angsuran	=$_POST[angsuran];
$bunga		=$_POST[t_bunga];

$delete = "Delete From $table where id_pinjam = '$no'";
mysqli_query($konek, $delete);
?>