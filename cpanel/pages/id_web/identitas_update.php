
<?php
	include "../conf/koneksi.php";
	include "../conf/library.php";
	include "../conf/fungsi_thumb.php";
	include "../lib/inc.session.php";
	
		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags($data,ENT_QUOTES));
			return $filter_sql;
		}

		$nm_web = antiinjection($_POST['nama_web']);
		$nm_pt = antiinjection($_POST['nama_pt']);
		$alamat = antiinjection($_POST['alamat']);
		$kodepos = antiinjection($_POST['kodepos']);
		$tlp = antiinjection($_POST['tlp']);
		$rekening = antiinjection($_POST['rekening']);
		$email = antiinjection($_POST['email']);
		$url = antiinjection($_POST['url']);
		$fb = antiinjection($_POST['fb']);
		$twitter = antiinjection($_POST['twitter']);
		$instagram = antiinjection($_POST['instagram']);
		$deskripsi = antiinjection($_POST['deskripsi']);
		$keyword = antiinjection($_POST['keyword']);
		/*--------------------------------------------------------------------------------------*/
		
		/*---------- validasi untuk email -------------*/
		$kar1 = strstr($email, "@");
		$kar2 = strstr($email, ".");
		/*---------------------------------------------*/
	
		
					
			if (trim($kodepos)=="" or ! is_numeric(trim($kodepos))) {
				echo "<script>alert('Kode pos hanya dapat di isi oleh angka.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=id'>";
				exit;
			}
			else
			if (!$kar1 or !$kar2) {
				echo "<script>alert('Format email yang Anda masukkan salah.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=id'>";
				exit;
			}
			
				mysqli_query($connect, "UPDATE identitas_web SET nm_website = '$nm_web',
				                       nama_pt = '$nm_pt',
								       alamat_pt = '$alamat',
									   kode_pos = '$kodepos',
									   tlp_pt = '$tlp',
                                       email_pt = '$email',
									   url = '$url',
									   facebook = '$fb',
									   twitter = '$twitter',
                                       instagram = '$instagram',
									   rekening_pt = '$rekening',
									   meta_deskripsi = '$deskripsi',
									   meta_keyword = '$keyword'
							     WHERE id_identitas = '$_POST[tid]'");
								 
				echo "<script>alert('Identitas website sudah di update.');</script>";
				echo "<meta http-equiv='refresh' content='0;url=?page=id'>";
			
?>