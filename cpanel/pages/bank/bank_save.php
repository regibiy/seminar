
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
	
	/*------------------------------NOMOR OTOMATIS---------------------------------------*/
	// baca current date
	$today = date("ym");

	// baca bank dari nama bank
	$namabank = $nm_bank;

	// cari id_bank yang berawalan tanggal hari ini
	$query = "SELECT max(id_bank) AS last FROM bank WHERE id_bank LIKE '$today%'";
	$hasil = mysqli_query($connect, $query);
	$data  = mysqli_fetch_array($hasil);
	$lastBank = $data['last'];

	// baca nomor urut bank dari bank terakhir
	$lastKdUrut = substr($lastBank, 5, 4);

	// nomor urut bank ditambah 1
	$nextKdUrut = $lastKdUrut + 1;

	// membuat format nomor urut bank berikutnya
	$nextKd = $today.sprintf('%04s', $nextKdUrut);
	/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/

    $token_bn = sha1($nextKd);
	
	$cek_bank = mysqli_num_rows(mysqli_query($connect, "SELECT nm_bank FROM bank
										   WHERE nm_bank = '$nm_bank'"));

	if($cek_bank > 0){
		echo" <script>alert('Nama bank sudah digunakan. Silahkan gunakan nama bank yang lain.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=adBn'>";
	}

	else{
		mysqli_query($connect, "INSERT INTO bank (id_bank,
		                               nm_bank,
                                       bank_seo,
									   no_rek,
									   pemilik_rek,
									   kantor_cabang,
                                       cr_dt_bank,
									   cr_tm_bank,
									   cr_username_bank,
									   token_bank)
                                 VALUES('$nextKd',
								        '$nm_bank',
										'$bank_seo',
										'$norek',
										'$nm_pemilik',
                                        '$kantor_cab',
										'$tgl_sekarang',
										'$jam_sekarang',
										'$_SESSION[username]',
										'$token_bn')");
										
		echo "<script>alert('Data bank sudah tersimpan.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=?page=vwBn'>";
	}
?>