<?php
include "inc/inc.koneksi.php";
function anti_injection($data){
  $filter = mysqli_real_escape_string($konek,stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$username	= $_POST[username];
$pass		= md5($_POST[password]);
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
?>
<script>
	window.location.href='index.php';
</script>
<?php
}else{
	$login	=mysqli_query($konek, "SELECT * FROM users WHERE user_id='$username' AND password='$pass'");
	$ketemu	=mysqli_num_rows($login);
	if ($ketemu > 0){
		$row					= mysqli_fetch_array($login);
		session_start();
		$_SESSION[namauser]     = $row[user_id];
		$_SESSION[passuser]     = $row[password];
		$_SESSION[isadmin]      = $row[is_admin];
		$_SESSION[noanggota]    = $row[no_anggota];
		header('location:media.php?module=home');
	}
	else{
	?>
    <script>
	alert('Maaf, Username atau password salah.');
	
	</script>
    <?php
	}
}
?>
