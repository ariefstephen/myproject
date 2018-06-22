<script language="javascript" src="modul/bunga/ajax.js"></script>
<style type="text/css">
button {
	margin: 2px; 
	position: relative; 
	padding: 4px 8px 4px 4px; 
	cursor: pointer;   
	list-style: none;
}
button span.ui-icon {
	float: left; 
	margin: 0 4px;
}
#simpan{
	margin-top:30px;
}
#info_anggota{
	position:absolute;
	padding:5px 5px 5px 5px;
	background-color:#FFF;
	width:450px;
	border:3px solid #5c9fe9;
	-moz-border-radius: 5px 5px 5px 5px; 
	-webkit-border-radius: 5px 5px 5px 5px; 
	border-radius: 5px 5px 5px 5px; 
	-moz-box-shadow:0px 0px 20px #aaa;
    -webkit-box-shadow:0px 0px 20px #aaa;
    box-shadow:0px 0px 20spx #aaa;
	z-index:200px;
	float:right;
	left:350px;
}
</style>
<?php
$table	= 'bunga';
$text	= "SELECT *	FROM $table";
$sql 	= mysqli_query($konek, $text);
$row	= mysqli_num_rows($sql);
if ($row>0){
	$r=mysqli_fetch_array($sql);
	echo "<div id='dalam_content'>
	<h2>SUKU BUNGA PINJAMAN</h2>
	<div id='tabs'>
		<ul>
			<li><a href='#tabs-1'>Bunga</a></li>
		</ul>

		<div id='tabs-1'>
		<div id='info_anggota'>
			<table>
				<tr>
					<td>Suku bunga saat ini</td>
					<td>: $r[jumlah]%</td>
				</tr>
			</table>
		</div>
		<table width='100%'>
			<tr>
				<td width='10%'>Suku bunga</td>
				<td width='2%'>:</td>
				<td><input type='text' name='jml' id='jml' size='15' class='input'></td>
				</tr>
				<tr>
				<td colspan='3' align='center'>
				<button class='ui-state-default ui-corner-all' id='simpan'>
				<span class='ui-icon ui-icon-disk'></span>Simpan
				</button>
				</td>
			</tr>
		</table>
		</div>

	</div>
	</div>";
}
?>