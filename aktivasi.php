<?php
	include "conf/koneksi.php";
	
	$kode = $_GET['code'];
	
	$sql = mysqli_query($connect, "SELECT * FROM peserta WHERE kode_aktivasi = '$kode' AND status_aktivasi = 'N'");
	$nums = mysqli_num_rows($sql);
	
	if($nums > 0){
		$r = mysqli_fetch_array($sql);
		mysqli_query($connect, "UPDATE peserta SET status_aktivasi = 'Y' WHERE kode_aktivasi = '$r[kode_aktivasi]'");
		
		echo "<script>alert('Akun anda telah aktif. Silahkan login untuk cetak bukti pendaftaran seminar/workshop.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=sign-in.html'>";
	}
?>