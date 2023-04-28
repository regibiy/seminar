<?php
include "../conf/koneksi.php";
include "../lib/inc.session.php";

mysqli_query($connect, "DELETE FROM bank WHERE token_bank = '$_GET[tid]'");

echo "<script>alert('Data bank sudah terhapus.');</script>";
echo "<meta http-equiv='refresh' content='0;url=?page=vwBn'>";
?>