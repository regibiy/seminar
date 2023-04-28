<?php
	session_start();
	session_destroy();
	unset($_SESSION['email_pst']);
	
	echo "<script>alert('Anda kembali ke halaman utama.'); window.location = 'beranda'</script>";
	exit;
?>