<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	
	mysqli_query($connect, "DELETE FROM peserta WHERE token_peserta = '$_GET[tid]' ");
	
	echo "<script>alert('Data peserta sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwPst'>";
?>