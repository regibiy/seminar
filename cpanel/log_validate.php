<?php
include ('../conf/koneksi.php');

//------ANTI XSS & SQL INJECTION-------//
function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}

$uname = antiinjection($_POST['user']);
$pass = antiinjection(MD5($_POST['pswd']));
//------ANTI XSS & SQL INJECTION-------//

$sql=mysqli_query($connect, "select * from pengguna where usernm='$uname' and passwd='$pass'");

$r=mysqli_fetch_array($sql);
if ($r['usernm']==$uname and $r['passwd']==$pass)

{
  session_start();
  $_SESSION['username']=$r['usernm'];
  $_SESSION['passwd']=$r['passwd'];

  echo "<script>alert('Anda berhasil login, silahkan masuk.');
  window.location = 'media.php?page=dashboard'</script>";
}
else
{
  echo "<script>alert('Maaf! Login gagal. Anda tidak berhak mengakses halaman administrator.');
  window.location = 'index.php?page=auth'</script>";
}
?>

