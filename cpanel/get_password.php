<?php
//----------kirim password baru---------//
	include "../conf/koneksi.php";
	
	//------ANTI XSS & SQL INJECTION-------//
	function antiinjection($data){
		$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
		return $filter_sql;
	}

	$email = antiinjection($_POST['email']);
	//------ANTI XSS & SQL INJECTION-------//
	
	/*---------- validasi untuk email -------------*/
	//$kar1 = strstr($email, "@");
	//$kar2 = strstr($email, ".");
	/*---------------------------------------------*/

	// Cek email pengguna di database
	$cek_email = mysqli_num_rows(mysqli_query($connect, "SELECT email_pengguna FROM pengguna WHERE email_pengguna = '$email'"));

	// jika email tidak ditemukan
	if ($cek_email == ""){
    	echo"
        	<script>alert('Email tidak terdaftar didalam database, mohon ulangi lagi.');
            	window.location='javascript:history.go(-1)'
       		</script>
    	";
	}
	else
	/*
	if (!$kar1 or !$kar2) {
		echo "<script>alert('Format email yang Anda masukkan salah.');
				window.location='javascript:history.go(-1)'
			</script>";
		exit;
	}
	else 
	*/
	{
		$password_baru = substr(md5(uniqid(rand(),1)),3,10);

    	// ganti password pengguna dengan password yang baru (reset password)
    	$query = mysqli_query($connect, "update pengguna set passwd = md5('$password_baru'), passwd_origin = '$password_baru' where email_pengguna = '$_POST[email]'");

    	// dapatkan email_pengguna dari database
    	$sql2 = mysqli_query($connect, "select email_pt from identitas_web where id_identitas = '1'");
    	$j2   = mysqli_fetch_array($sql2);

    	$subjek = "Password Baru";
    	$pesan = "Password baru anda adalah <b>$password_baru</b>";

    	// Kirim email dalam format HTML
   		$dari = "From: $j2[email_pt]\r\n";
    	$dari .= "Content-type: text/html\r\n";

    	// Kirim password ke email pengguna
    	mail($_POST['email'],$subjek,$pesan,$dari);

    	echo "
        	<script>alert('Password baru sudah terkirim ke alamat email Anda.');
            	window.location='index.php'
        	</script>
    	";
	}
?>