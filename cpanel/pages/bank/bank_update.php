<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../conf/fungsi_seo.php";
	include "../lib/inc.session.php";
	
	$bank_seo = seo_title($_POST['nama_bank']);
	
	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  		return $filter_sql;
	}

	$nm_bank   = antiinjection($_POST['nama_bank']);
	$norek   = antiinjection($_POST['norek']);
	$nm_pemilik   = antiinjection($_POST['nm_pemilik']);
	$kantor_cab   = antiinjection($_POST['kantor_cab']);
	//------ANTI XSS & SQL INJECTION-------//
	
	$aktif_bn = $_POST['aktif'];
	
		mysqli_query($connect, "UPDATE bank SET nm_bank = '$nm_bank',
		                                    bank_seo = '$bank_seo',
											no_rek = '$norek',
											pemilik_rek = '$nm_pemilik',
											kantor_cabang = '$kantor_cab',
											aktif_bank = '$aktif_bn',
											md_dt_bank = '$tgl_sekarang',
											md_tm_bank = '$jam_sekarang',
											md_username_bank = '$_SESSION[username]'
                                      WHERE token_bank = '$_POST[tid]'");
	
		echo "<script>alert('Data bank sudah di update.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwBn'>";
	
?>