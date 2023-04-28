<?php
if(empty($_SESSION['email_pst'])) {
	echo "<script>alert('Akses ditolak! Silahkan login dengan username dan password Anda untuk dapat mengakses halaman ini.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=beranda'>";
	exit;
}
?>