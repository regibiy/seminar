<?php
	$pg = isset($_GET['page']) ? $_GET['page'] : '' ; /*-- PHP 5 --*/
	switch ($pg) {
		/*-- main/index --*/
		case 'index' :
			if(!file_exists ("main.php"))die("File halaman utama tidak tersedia.");
			include ("main.php");
			break;
			
		/*-- profil/about --*/
		case 'about' :
			if(!file_exists ("profil.php"))die("File profil tidak tersedia.");
			include ("profil.php");
			break;
			
		/*-- contact --*/
		case 'contact' :
			if(!file_exists ("hub.php"))die("File kontak hubungi tidak tersedia.");
			include ("hub.php");
			break;
			
		/*-- registrasi --*/
		case 'reg' :
			if(!file_exists ("registrasi.php"))die("File registrasi peserta tidak tersedia.");
			include ("registrasi.php");
			break;
			
		/*-- aksi registrasi --*/
		case 'aksi-reg' :
			if(!file_exists ("aksi_registrasi.php"))die("File aksi registrasi peserta tidak tersedia.");
			include ("aksi_registrasi.php");
			break;
			
		/*-- sign in --*/
		case 'sign-in' :
			if(!file_exists ("sign_in.php"))die("File sign in tidak tersedia.");
			include ("sign_in.php");
			break;
			
		/*-- verifikasi login --*/
		case 'verifikasi' :
			if(!file_exists ("verifikasi.php"))die("File verifikasi login tidak tersedia.");
			include ("verifikasi.php");
			break;
			
		/*-- tampil data registrasi --*/
		case 'tampil-reg' :
			if(!file_exists ("tampil_registrasi.php"))die("File tampil registrasi tidak tersedia.");
			include ("tampil_registrasi.php");
			break;
			
		/*-- sign out --*/
		case 'sign-out' :
			if(!file_exists ("sign_out.php"))die("File sign out tidak tersedia.");
			include ("sign_out.php");
			break;
			
		/*-- konfirmasi bayar --*/
		case 'konfirmasi-byr' :
			if(!file_exists ("konfirmasi_byr.php"))die("File konfirmasi pembayaran tidak tersedia.");
			include ("konfirmasi_byr.php");
			break;
			
		/*-- aksi konfirmasi bayar --*/
		case 'aksi-konfirmasi' :
			if(!file_exists ("aksi_konfirmasi.php"))die("File aksi konfirmasi pembayaran tidak tersedia.");
			include ("aksi_konfirmasi.php");
			break;
			
		/*-- cetak bukti daftar --*/
		case 'cetakbukti' :
			if(!file_exists ("pdf_cetakbukti.php"))die("File cetak bukti pendaftaran tidak tersedia.");
			include ("pdf_cetakbukti.php");
			break;
			
		/*-- detail seminar --*/
		case 'detailsmnr' :
			if(!file_exists ("detail_seminar.php"))die("File detail seminar tidak tersedia.");
			include ("detail_seminar.php");
			break;
			
		/*-- cara daftar --*/
		case 'caradaftar' :
			if(!file_exists ("cara_reg.php"))die("File cara daftar tidak tersedia.");
			include ("cara_reg.php");
			break;
			
		/*------------------------------------------------------------------------------------------------*/
			
	}
?>