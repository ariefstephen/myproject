<script type="text/javascript">
$(function() {
	$("#theTable.satu tr:even").addClass("stripe1");
	$("#theTable.satu tr:odd").addClass("stripe2");

	$("#theTable.satu tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function deleteRow(ID) {
	var id	= ID;
	var cari = $("#nomor").val();
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/simpanan/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data1").load("modul/simpanan/tampil_data1.php?cari="+cari);
			}
		});
	}
}
</script>
<?php


ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
include '../../inc/inc.koneksi.php';
include '../../inc/fungsi_tanggal.php';
//require_once 'Paginator.class.php';

//$limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
//$page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
//$links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
$cari	= $_GET['cari'];
$where	= " WHERE id_pinjam='$cari'";
echo "<table id='theTable' class='satu' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th>Cicilan Ke</th>
			<th>Angsuran</th>
			<th>Bunga</th>
			<th>Total</th>
		</tr>";
	$sql	= "SELECT *
				FROM pinjaman_detail_temp
				$where
				ORDER BY id_pinjam,cicilan";
	$query	= mysqli_query($konek, $sql);
	/*$Paginator  = new Paginator( $konek, $sql );
    $results    = $Paginator->getData( $page, $limit );*/
	$no=1;
	while($rows=mysqli_fetch_array($query)){
		$jumlah = $rows[angsuran]+ $rows[bunga];
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[cicilan]</td>
				<td align='right'>".number_format($rows[angsuran])."</td>
				<td align='right'>".number_format($rows[bunga])."</td>
				<td align='right'>".number_format($jumlah)."</td>
			</tr>";
	$no++;
	$gtotal = $gtotal+$jumlah;
	}
echo "<tr>
		<td colspan='4' align='center'>Total</td>
		<td align='right'><b>".number_format($gtotal)."</b></td>
	</table>";
?>