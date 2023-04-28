<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
	
	$data=mysqli_fetch_array(mysqli_query($connect, "SELECT img_bayar FROM pembayaran WHERE token_bayar = '$_GET[tid]'"));
  	if ($data['img_bayar']!=''){
    	mysqli_query($connect, "DELETE FROM pembayaran WHERE token_bayar = '$_GET[tid]'");
     	unlink("../img_payment/$data[img_bayar]");
     	unlink("../img_payment/small_$data[img_bayar]");
	}
  	else{
    	mysqli_query($connect, "DELETE FROM pembayaran WHERE token_bayar = '$_GET[tid]'");
  	}
	
	echo "<script>alert('Data pembayaran sudah terhapus.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=vwPay'>";
?>