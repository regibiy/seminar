
<?php
	include "conf/koneksi.php";
	include "conf/library.php";
	
	//------ANTI XSS & SQL INJECTION-------//
  	function antiinjection($data){
  		$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  		return $filter_sql;
	}

	$seminar = antiinjection($_POST['seminar']);
	$jns_id = antiinjection($_POST['jns_id']);
	$no_id = antiinjection($_POST['no_id']);
	$nm_peserta = antiinjection($_POST['nm_peserta']);
	$kelamin = isset($_POST['kelamin']) ? $_POST['kelamin']: '' ;
	$pendidikan = antiinjection($_POST['pendidikan']);
	$usia = antiinjection($_POST['usia']);
	$alamat = antiinjection($_POST['alamat']);
	$kota_kab = antiinjection($_POST['kota_kab']);
	$kodepos = antiinjection($_POST['kodepos']);
	$no_hp = antiinjection($_POST['no_hp']);
	$email = antiinjection($_POST['email']);
	//------ANTI XSS & SQL INJECTION-------//
	
	/*----------------- set password peserta -----------------*/
	$password_baru = substr(md5(uniqid(rand(),1)),3,10);
	/*--------------------------------------------------------*/
	
	/*---------------------- Fungsi Acak Kode ---------------------*/
	function randomcode ($len="10"){
		global $pass;
		global $lchar;
		$code = NULL;
		
		for ($i=0;$i<$len;$i++){
			$char = chr(rand(48,122));
			while(!ereg("[a-zA-Z0-9]", $char)){
				if($char == $lchar) { continue; }
				$char = chr(rand(48,90));
			}
			$pass .= $char;
			$lchar = $char;
		}
		return $pass;
	}
	/*-------------------------------------------------------------*/
	
	/*------------------------ Kirim notifikasi aktivasi ke email peserta ----------------------*/
	$kode_aktivasi = randomcode();
	$password_baru = substr(md5(uniqid(rand(),1)),3,10);
	$tujuan = $email;
	$subjek = "Kode Aktivasi dan Password Login Seminar/Workshop IT Kutuonline";
	$link = "http://localhost/seminar/aktivasi.php?code=$kode_aktivasi"; /*-- jika sudah hosting, ubah dengan link URL website --*/
	$pesan = "Klik link tautan berikut $link untuk aktivasi akun seminar Anda. Password anda adalah $password_baru. Silahkan login menggunakan email anda dan password tersebut.";
	$from = "doni@localhost"; /*-- jika sudah hosting, ubah dengan email pengirim --*/
	
	$send_email = mail($tujuan,$subjek,$pesan,$from);
	
	/*-----------------------------------------------------------------------------------------*/
	
	/*---------- validasi untuk email -------------*/
	//$kar1 = strstr($email, "@");
	//$kar2 = strstr($email, ".");
	/*---------------------------------------------*/
	
	/*------------------------------NOMOR OTOMATIS---------------------------------------*/
	// baca current date
	$today = date("Ym");

	// baca peserta dari nama peserta
	$noid = $no_id;

	// cari id_peserta yang berawalan tanggal hari ini
	$query = "SELECT max(id_peserta) AS last FROM peserta WHERE id_peserta LIKE '$today%'";
	$hasil = mysqli_query($connect, $query);
	$data  = mysqli_fetch_array($hasil);
	$lastCard = $data['last'];

	// baca nomor urut peserta dari id peserta terakhir
	$lastKdUrut = substr($lastCard, 8, 4);

	// nomor urut peserta ditambah 1
	$nextKdUrut = $lastKdUrut + 1;

	// membuat format nomor urut peserta berikutnya
	$nextKd = $today.sprintf('%04s', $nextKdUrut);
	/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/

    $token_pst = sha1($nextKd);
	
	$cek_peserta = mysqli_num_rows(mysqli_query($connect, "SELECT nama_peserta, no_kartuid FROM peserta
										   WHERE nama_peserta = '$nm_peserta'
										   OR no_kartuid = $no_id"));

	if($cek_peserta > 0){
		echo" <script>alert('Nama peserta atau no kartu identitas sudah terdaftar.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=beranda'>";
	}
	else
	if (trim($no_id)=="" or ! is_numeric(trim($no_id))) {
		echo "<script>alert('Nomor identitas hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
		exit;
	}
	else
	if (trim($kodepos)=="" or ! is_numeric(trim($kodepos))) {
		echo "<script>alert('Kode pos hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
		exit;
	}
	else
	/*
	if (!$kar1 or !$kar2) {
		echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
		exit;
	}
	else
	*/
	if (trim($no_hp)=="" or ! is_numeric(trim($no_hp))) {
		echo "<script>alert('No HP peserta hanya dapat di isi oleh angka.');</script>";
		echo "<meta http-equiv='refresh' content='0;url=registrasi.html'>";
		exit;
	}
	
	else{
		mysqli_query($connect, "INSERT INTO peserta (id_peserta,
										  id_seminar,
		                                  id_kartu,
										  id_pendidikan,
                                          no_kartuid,
										  nama_peserta,
										  range_usia,
										  jns_kelamin,
										  alamat_peserta,
										  kota_kab_peserta,
										  kode_pos,
										  no_hp,
										  email_peserta,
										  tgl_daftar,
										  jam_daftar,
										  kode_aktivasi,
										  password,
										  token_peserta)
                                 VALUES('$nextKd',
										'$seminar',
								        '$jns_id',
										'$pendidikan',
										'$no_id',
										'$nm_peserta',
										'$usia',
										'$kelamin',
										'$alamat',
										'$kota_kab',
										'$kodepos',
										'$no_hp',
										'$email',
										'$tgl_sekarang',
										'$jam_sekarang',
										'$kode_aktivasi',
										'$password_baru',
										'$token_pst')");
										
		if($send_email){
			echo "<script>alert('Data peserta sudah tersimpan. Kode aktivasi dan password sudah terkirim ke email Anda. Silahkan lakukan pembayaran seminar/workshop terlebih dahulu, lalu konfirmasikan pembayaran Anda via halaman website.');</script>";
		}	
		echo "<meta http-equiv='refresh' content='0;url=beranda'>";
	}
?>