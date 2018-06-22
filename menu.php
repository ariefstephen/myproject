<ul class="sf-menu">
<li><a href="?module=home">Home</a></li>	
<?php
session_start();
if($_SESSION[isadmin] == 'Y'){
?>
<li>
<a href="#">Data</a>
<ul>
<li><a href="?module=jenis">Jenis Simpanan</a></li>
<li><a href="?module=anggota">Anggota</a></li>
<li><a href="?module=users">Users</a></li>
</ul>
</li>
<?php
}
?>
<li>
<a href="#">Transaksi</a>
<ul>
<li><a href="?module=simpanan">Simpanan</a></li>
<li><a href="?module=pinjaman">Pinjaman</a></li>
<li><a href="?module=bayar">Angsuran</a></li>
</ul>
</li>
<li>
<a href="#">Laporan</a>
<ul>
<?php
session_start();
if($_SESSION[isadmin] == 'Y'){
?>
<li><a href="?module=lap-anggota">Anggota</a></li>
<?php
}
?>
<li><a href="?module=lap-simpanan">Simpanan</a></li>
<li><a href="?module=lap-pinjaman">Pinjaman</a></li>
</ul>
</li>
<li><a href="logout.php">Keluar</a></li>
</ul>