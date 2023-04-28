
<?php
	include "conf/koneksi.php";
	include "conf/library.php";
	include "conf/fungsi_thumb.php";
	//include "lib/inc.session.pst.php";

	/*--------------- script cegah upload file shell.php via *.jpg -------------*/
	if(isset($_FILES['fupload'])){
		$errors = array();
	/*--------------------------------------------------------------------------*/
	
		$lokasi_file = $_FILES['fupload']['tmp_name'];
		$tipe_file = $_FILES['fupload']['type'];
		$nama_file = $_FILES['fupload']['name'];
		
		/*--------------- script cegah upload file shell.php via *.jpg --------------
		setiap file gambar atau foto memiliki size.
		deklarasi var untuk size gambar/foto.
		----------------------------------------------------------------------------*/
		$file_size      = $_FILES['fupload']['size'];
		/*--------------------------------------------------------------------------*/
	
		$acak           = rand(1,999999);
		$nama_file_unik = $acak.$nama_file;
		
		/*--------------- script cegah upload file shell.php via *.jpg --------------
		explode tipe file dari sebuah file name utuh.
		biasanya file shell.php direname menjadi shell.php.jpg.
		file shell.php.jpg tsb akan di bypass dgn berbagai macam cara untuk
		dapat masuk sebagai file shell.php.
		ekstensi *.php ini akan di filter dgn perintah dibawah ini sehingga
		tidak dapat masuk.
		----------------------------------------------------------------------------*/
		$arr = explode('.',$nama_file);
		$file_ext=strtolower(end($arr));
		/*--------------------------------------------------------------------------*/
	
		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

		$no_reg = antiinjection($_POST['no_reg']);
		$id_smnr = antiinjection($_POST['id_smnr']);
		$banktujuan = antiinjection($_POST['bank_tujuan']);
		$banktrf = antiinjection($_POST['bank_trf']);
		$jmltrf = antiinjection($_POST['jml_trf']);
		$pemilikrek = antiinjection($_POST['pemilik_rek']);
		$infotambahan = antiinjection($_POST['info_tambahan']);
		/*--------------------------------------------------------------------------------------*/	

		/*------------------------------NOMOR OTOMATIS---------------------------------------*/
		// baca current date
		$today = date("ym");

		// baca pembayaran dari id peserta
		$noreg = $no_reg;

		// cari id_pembayaran yang berawalan tanggal hari ini
		$query = "SELECT max(id_pembayaran) AS last FROM pembayaran WHERE id_pembayaran LIKE '$today%'";
		$hasil = mysqli_query($connect, $query);
		$data  = mysqli_fetch_array($hasil);
		$lastPay = $data['last'];

		// baca nomor urut pembayaran dari id pembayaran terakhir
		$lastKdUrut = substr($lastPay, 5, 4);

		// nomor urut pembayaran ditambah 1
		$nextKdUrut = $lastKdUrut + 1;

		// membuat format nomor urut pembayaran berikutnya
		$nextKd = $today.sprintf('%04s', $nextKdUrut);
		/*----------------------------------NOMOR OTOMATIS-----------------------------------------*/

		$token_pay = sha1($nextKd);
	
		//apabila ada gambar yang di upload
		if (!empty($lokasi_file)){
		
			/*------------------ script cegah upload file shell.php via *.jpg ------------------
			mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
			-----------------------------------------------------------------------------------*/
			$expensions = array("jpeg","jpg","pjpeg","png","gif");
			if(in_array($file_ext,$expensions)== false){
				echo "<script>window.alert('Upload file bukti transfer gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
					</script>";
				echo "<meta http-equiv='refresh' content='0;url=confirm-payment.html'>";
			}
			/*----------------------------------------------------------------------------------*/
					
			$cek_bayar = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pembayaran, peserta, seminar
										   WHERE pembayaran.id_peserta = peserta.id_peserta
										   AND pembayaran.id_seminar = seminar.id_seminar
										   AND pembayaran.id_peserta = '$no_reg'
										   AND pembayaran.id_seminar = '$id_smnr' "));

			if($cek_bayar > 0){
				echo" <script>alert('Nomor registrasi dengan judul seminar tersebut sudah melakukan pembayaran.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=beranda'>";
			}
			else
			if (trim($jmltrf)=="" or ! is_numeric(trim($jmltrf))) {
				echo "<script>alert('Jumlah transfer hanya dapat di isi oleh angka.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=confirm-payment.html'>";
				exit;
			}
			
			else {
			
				/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
				if(empty($errors)==true){
				/*----------------------------------------------------------------------------------*/
		
					UploadStruk($nama_file_unik);
					mysqli_query($connect, "INSERT INTO pembayaran (id_pembayaran,
										  id_peserta,
		                                  id_seminar,
                                          id_bank,
										  bank_transfer,
										  jml_transfer,
										  nm_pemilik_rek,
										  informasi_tambahan,
										  tgl_transfer,
										  jam_transfer,
										  img_bayar,
										  token_bayar)
                                 VALUES('$nextKd',
										'$no_reg',
								        '$id_smnr',
										'$banktujuan',
										'$banktrf',
										'$jmltrf',
										'$pemilikrek',
										'$infotambahan',
										'$tgl_sekarang',
										'$jam_sekarang',
										'$nama_file_unik',
										'$token_pay')");	
										
					echo "<script>alert('Data pembayaran sudah tersimpan.');</script>";
					echo "<meta http-equiv='refresh' content='0;url=view-reg.html'>";
				}
			}
		}
	}
?>