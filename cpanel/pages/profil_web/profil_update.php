<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../lib/inc.session.php";
	
	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = stripslashes(strip_tags($data,ENT_QUOTES));
  		return $filter_sql;
	}

	$isiprofil   = antiinjection($_POST['profil']);
	//------ANTI XSS & SQL INJECTION-------//
	
	$aktif_profil = $_POST['aktif'];
	
		mysqli_query($connect, "UPDATE profil_web SET isi_profil = '$isiprofil',
	                                        aktif_profil = '$aktif_profil',
											md_dt_profil = '$tgl_sekarang',
											md_tm_profil = '$jam_sekarang',
											md_username_profil = '$_SESSION[username]'
                                      WHERE id_profil = '$_POST[tid]'");
	
		echo "<script>alert('Profil website sudah di update.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=pf'>";
	
?>