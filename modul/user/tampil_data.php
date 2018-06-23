<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");
	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function editRow(ID){
	var id = ID;
	var pilih = confirm('Data yang akan mengubah  = '+id+ '?');
	if (pilih==true) {
	$.ajax({
		type	: "POST",
		url		: "modul/anggota/cari.php",
		data	: "id="+id,
		dataType : "json",				  
		success	: function(data){
			$("#nomor").val(ID);
			$("#identitas").val(data.id);
			$("#anggota").val(data.nama);
			$("#jk").val(data.jk);
			$("#tempat").val(data.tempat);
			$("#tgl").val(data.tgl);
			$("#alamat").val(data.alamat);
			$("#hp").val(data.hp);
			
			$("#nomor").attr("disabled",true);
			$('#form_input').dialog('open');
			return false;
		}
	});
	}
}
function deleteRow(ID) {
	var id	= ID;
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/anggota/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data").load("modul/anggota/tampil_data.php");
			}
		});
	}
}
</script>
<?php


include '../../inc/inc.koneksi.php';
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
$cari	= $_GET['cari'];

$where	= " WHERE a.user_id LIKE '%$cari%' OR a.no_anggota LIKE '%$cari%' OR b.namaanggota LIKE '%$cari%' AND a.is_delete = 'N'";

echo "<table id='theTable' width='100%'>
		<tr>
			<th width='5%'>No</th>
			<th width='15%'>No.Anggota</th>
			<th width='20%'>Nama</th>
			<th width='15%'>Username</th>
			<th width='10%'>Level</th>			
			<th width='15%'>Aksi</th>
		</tr>";
	$sql	= "SELECT a.user_id, b.noanggota, b.namaanggota, a.is_admin, a.is_aktif
				FROM users as a
				JOIN anggota as b
				ON a.no_anggota=b.noanggota 
				$where
				ORDER BY b.noanggota";
	$query	= mysqli_query($konek, $sql);
	
	$no=1;
	while($rows=mysqli_fetch_array($query)){
				$level = 'Admin';
				if ($rows[is_admin] == 'N'){
					$level = 'User';
				}
				$isAktif = 'Aktifkan';
				if ($rows[is_aktif] == 'Y'){
					$isAktif = 'Non-Aktifkan';
				}
		echo "<tr>
				<td align='center'>$no</td>
				<td align='center'>$rows[noanggota]</td>
				<td align='center'>$rows[namaanggota]</td>
				<td align='center'>$rows[user_id]</td>
				<td align='center'>$level</td>
				<td align='center'>
				<a href='javascript:editRow(\"{$rows[noanggota]}\")'>Edit</a>
				<a href='javascript:aktifRow(\"{$rows[noanggota]}\")'>$isAktif</a>
				<a href='javascript:deleteRow(\"{$rows[noanggota]}\")'>Hapus</a>				
				</td>
			</tr>";
	$no++;
	}
echo "</table>";
?>