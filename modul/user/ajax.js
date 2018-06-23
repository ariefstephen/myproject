// JavaScript Document
$(document).ready(function(){
	$(function(){
		$('button').hover(
			function() { $(this).addClass('ui-state-hover'); }, 
			function() { $(this).removeClass('ui-state-hover'); }
		);
	});
	$("#nomor").keyup(function(e){
		var isi = $(e.target).val();
		$(e.target).val(isi.toUpperCase());
	});
	$("#hp").keypress(function (data)  { 
		if(data.which!=8 && data.which!=0 && (data.which<48 || data.which>57)){
	          alert('harus angka');
			  return false;
		}
	});
	$('#form_input').dialog({
		  autoOpen: false,
		  show: "blind",
		  hide: "blind",
		  width: 550,
		  modal	: true,
		  resizable:false,
		  buttons: {
			  "Simpan": function() { 
				  //$(this).dialog("close"); 
				  simpan();
			  }, 
			  "Batal": function() { 
				  $(this).dialog("close"); 
			  } 
		  }
	});
	$("#tgl").datepicker({
			dateFormat:"dd-mm-yy",
			changeYear : true,
			changeMonth:true,
    });
	$("#tampil_data").load('modul/user/tampil_data.php');
	$('#tambah').click(function(){										
		$(".input").val('');		
		$("#nomor").attr("disabled",false);
		$("#nomor").focus();
		$('#form_input').dialog('open');
		return false;
	});
	
	function simpan(){
		var no		 = $("#nomor").val();
		var username = $("#username").val();
		var password = $("#password").val();
		var isadmin	 = $("#isadmin").val();

		if(no.length==0){
			alert('Maaf, Nomor Anggota tidak boleh kosong');
			$("#nomor").focus();
			return false();
		}
		if(username.length==0){
			alert('Maaf, Username tidak boleh kosong');
			$("#username").focus();
			return false();
		}
		if(password.length==0){
			alert('Maaf, Password tidak boleh kosong');
			$("#password").focus();
			return false();
		}
		if(isadmin.length==0){
			alert('Maaf, Level tidak boleh kosong');
			$("#isadmin").focus();
			return false();
		}
		$.ajax({
			type	: "POST",
			url		: "modul/user/simpan.php",
			data	: "no="+no+
					"&username="+username+
					"&password="+password+
					"&isadmin="+isadmin,
			success	: function(data){
				$("#tampil_data").load('modul/user/tampil_data.php');
				$("#form_input").dialog("close"); 
			}
		});
	}
	$("#cari").click(function(){
		var cari = $("#txt_cari").val();
		cariData(cari);
	});
	
	function cariData(e){
		var cari = e;
		$.ajax({
			type	: "GET",
			url		: "modul/user/tampil_data.php",
			data	: "cari="+cari,
			success	: function(data){
				$("#tampil_data").html(data);
			}
		});
	}
});