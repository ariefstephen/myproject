<?php


include "../../inc/inc.koneksi.php";
include "../../inc/fungsi_tanggal.php";
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
$table	= 'bunga';
$text	= "SELECT *	FROM $table";
$sql 	= mysqli_query($konek, $text);
$row	= mysqli_num_rows($sql);
if ($row>0){
	$r=mysqli_fetch_array($sql);
	echo "<table>
		<tr>
			<td>Suku bunga saat ini</td>
			<td>: $r[jumlah]</td>
		</tr>
	</table>";
}
?>