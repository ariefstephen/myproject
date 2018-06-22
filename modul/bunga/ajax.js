// JavaScript Document
$(document).ready(function(){
	$(function(){
		$('button').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
	});	
	$('#tabs').tabs();
	//$("#info_anggota").load('modul/bunga/cari_bunga.php');
	$("#simpan").click(function(){
		simpan();
		$("#jml").val("");
	})
	function simpan(){
		var jml		= $("#jml").val();
		
		var jawab = confirm("Anda yakin untuk merubah suku bunga?");
			if (jawab === true) {	
				if(jml.length==0){
					jml = 0;
				}
				var hapus = false;
				if (!hapus) {
					hapus = true;
					$.ajax({
						type	: "POST",
						url		: "modul/bunga/simpan.php",
						data	: "&jml="+jml,
						success	: function(data){
							$("#info_anggota").load('modul/bunga/cari_bunga.php');
						}
					});
					hapus = false;
				}
			} else {
				return false;
			}		
	}
	
	function cariBunga(){
		$.ajax({
			type	: "POST",
			url		: "modul/bunga/cari_bunga.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#info_anggota").html(data);
			}
		});
	}
	function cariSimpananAnggota(e){
		var cari = e;
		$.ajax({
			type	: "GET",
			url		: "modul/simpanan/tampil_data1.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data1").html(data);
			}
		});
	}		
});