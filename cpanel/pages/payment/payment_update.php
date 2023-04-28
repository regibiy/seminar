<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../lib/inc.session.php";
	
		mysqli_query($connect, "UPDATE pembayaran SET status_bayar = '$_POST[status_byr]'
					WHERE token_bayar = '$_POST[tid]'");
	
		echo "<script>alert('Data pembayaran sudah di update.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwPay'>";
?>