<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	
	mysqli_query($connect, "DELETE FROM seminar WHERE token_seminar = '$_GET[tid]' ");
	
	echo "<script>alert('Data seminar sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwSmnr'>";
?>