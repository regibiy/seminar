<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	
	mysqli_query($connect, "DELETE FROM kartu_identitas WHERE token_kartuid = '$_GET[tid]' ");
	
	echo "<script>alert('Kartu identitas sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwCard'>";
?>