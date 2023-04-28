<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../lib/inc.session.php";
	include "../conf/fungsi_thumb.php";
	
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
	
		//------ANTI XSS & SQL INJECTION-------//
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

		$isicaradaftar   = antiinjection($_POST['caradaftar']);
		//------ANTI XSS & SQL INJECTION-------//
	
		$aktif_caradaftar = $_POST['aktif'];
	
		/*------------------ script cegah upload file shell.php via *.jpg ------------------
		mendefinisikan tipe file kedalam array dr gambar atau foto yg akan di upload.
		-----------------------------------------------------------------------------------*/
		$expensions = array("jpeg","jpg","pjpeg","png","gif");
		/*----------------------------------------------------------------------------------*/
		if(in_array($file_ext,$expensions)== false){
			echo "<script>window.alert('Upload gambar cara daftar gagal, pastikan file yang di upload bertipe *.JPG, *.PNG, *.GIF');
				</script>";
			echo "<meta http-equiv='refresh' content='0;url=?page=crReg'>";
		}
				
		else {
			$data_gbr = mysqli_query($connect, "SELECT img_caradaftar FROM cara_daftar WHERE id_caradaftar = '$_POST[tid]'");
			$r    	= mysqli_fetch_array($data_gbr);
			@unlink('img_caradaftar/'.$r['img_caradaftar']);
			@unlink('img_caradaftar/'.'small_'.$r['img_caradaftar']);
				
			/*------------------ script cegah upload file shell.php via *.jpg ------------------*/
			if(empty($errors)==true){
			/*----------------------------------------------------------------------------------*/
	
				UploadCaraDaftar($nama_file_unik);
				mysqli_query($connect, "UPDATE cara_daftar SET isi_caradaftar = '$isicaradaftar',
											img_caradaftar = '$nama_file_unik',
	                                        aktif_caradaftar = '$aktif_caradaftar',
											md_dt_caradaftar = '$tgl_sekarang',
											md_tm_caradaftar = '$jam_sekarang',
											md_username_caradaftar = '$_SESSION[username]'
                                      WHERE id_caradaftar = '$_POST[tid]'");
	
				echo "<script>alert('Informasi cara pendaftaran sudah di update.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=crReg'>";
			}
		}
	}
?>