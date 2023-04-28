<?php
ob_start();
error_reporting(0);

include "../../../conf/koneksi.php";

//memilih nama tabel yang akan di export
$select = "SELECT pembayaran.id_pembayaran, pembayaran.tgl_transfer, pembayaran.jam_transfer,
           seminar.nm_seminar, peserta.id_peserta, peserta.nama_peserta, 
           bank.nm_bank, pembayaran.bank_transfer, pembayaran.jml_transfer,
		   pembayaran.nm_pemilik_rek, pembayaran.informasi_tambahan, pembayaran.status_bayar
		   FROM peserta, seminar, pembayaran, bank
           WHERE peserta.id_seminar = seminar.id_seminar 
		   AND pembayaran.id_peserta = peserta.id_peserta
		   AND pembayaran.id_seminar = seminar.id_seminar
		   AND pembayaran.id_bank = bank.id_bank
		   ORDER BY peserta.id_peserta";

$export = mysqli_query($connect, $select);
$fields = mysqli_num_fields($export);
for ($i = 0; $i < $fields; $i++) {
$header .= mysqli_field_name($export, $i) . "\t";
}
while($row = mysqli_fetch_row($export)) {
$line = '';
foreach($row as $value) { 
if ((!isset($value)) OR ($value == "")) {
$value = "\t";
} else {
$value = str_replace('"', '""', $value);
$value = '"' . $value . '"' . "\t";
}
$line .= $value;
}
$data .= trim($line)."\n";
}
$data = str_replace("\r","",$data);
if ($data == "") {
$data = "n(0) Records Found!\n"; 
} 
header("Content-type: application/x-msdownload");
//Penamaan file hasil export data
header("Content-Disposition: attachment; filename=Data_Pembayaran_SeminarWorkshop.xls");
header("Pragma: no-cache");
header("Expires: 0");
print "$header\n$data";

?>
