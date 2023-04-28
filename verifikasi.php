<?php
include ('conf/koneksi.php');

//------ANTI XSS & SQL INJECTION-------//
function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}

$email = antiinjection($_POST['email']);
$pass = antiinjection($_POST['pswd']);
//------ANTI XSS & SQL INJECTION-------//

$sql=mysqli_query($connect, "select * from peserta where email_peserta = '$email' and password = '$pass' and status_aktivasi = 'Y'");

$r=mysqli_fetch_array($sql);
if ($r['email_peserta']==$email and $r['password']==$pass and $r['status_aktivasi']=='Y' )
{
	session_start();
	$_SESSION['email_pst']=$r['email_peserta'];
	$_SESSION['passwd']=$r['password'];

	echo "<script>alert('Login berhasil, silahkan cetak bukti pendaftaran seminar/workshop Anda.');window.location = 'confirm-payment.html'</script>";	
}
else
{
  echo "<script>alert('Maaf! Login gagal. Anda tidak berhak mengakses halaman ini.');window.location = 'beranda'</script>";
}
?>

