<?php
include ('class.ezpdf.php');

$pdf = new Cezpdf('Legal','landscape');

$pdf->ezSetCmMargins(3.5,2,2,2);
$pdf->selectFont('fonts/Helvetica.afm');

$all = $pdf->openObject();
//tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('logo.jpg',55,525,69);

$pdf->addText(50, 560, 14,' <b>Kutuonline - Seminar and Workshop of Information Technology</b>');
$pdf->addText(50, 540, 14,' <b>Data Pembayaran Peserta Seminar/Workshop</b>');

//Garis header
$pdf->line(10, 520, 1000, 520);

//Garis footer
$pdf->line(10, 50, 1000, 50);

$pdf->addText(10,34,10,' Dicetak tanggal : ' . date('d M Y'));

$pdf->closeObject();
//tampilkan object di semua halaman
$pdf->addObject($all, 'all');

include "../../../conf/koneksi.php";

$sql=mysqli_query($connect, "SELECT pembayaran.id_pembayaran, pembayaran.tgl_transfer, pembayaran.jam_transfer,
           seminar.nm_seminar, peserta.id_peserta, peserta.nama_peserta, 
           bank.nm_bank, pembayaran.bank_transfer, pembayaran.jml_transfer,
		   pembayaran.nm_pemilik_rek, pembayaran.informasi_tambahan, pembayaran.status_bayar
		   FROM peserta, seminar, pembayaran, bank
           WHERE peserta.id_seminar = seminar.id_seminar 
		   AND pembayaran.id_peserta = peserta.id_peserta
		   AND pembayaran.id_seminar = seminar.id_seminar
		   AND pembayaran.id_bank = bank.id_bank
		   ORDER BY peserta.id_peserta");
$i=1;
while ($r = mysqli_fetch_array($sql)) {
  $data[$i]=array('<b>No. </b>'=>$i,
  				  '<b>No. Pembayaran</b>'=>$r['id_pembayaran'],
                  '<b>Tgl. Transfer</b>'=>$r['tgl_transfer'],
				  '<b>Nama Seminar</b>'=>$r['nm_seminar'],
				  '<b>No. Registrasi</b>'=>$r['id_peserta'],
				  '<b>Nama Peserta</b>'=>$r['nama_peserta'],
				  '<b>Gateway</b>'=>$r['nm_bank'],
				  '<b>Bank Transfer</b>'=>$r['bank_transfer'],
				  '<b>Jml. Transfer</b>'=>$r['jml_transfer'],
				  '<b>Pemilik Rek.</b>'=>$r['nm_pemilik_rek'],
				  '<b>Status Bayar</b>'=>$r['status_bayar']);
$i++;
}
$pdf->ezTable($data, '', '', '');

$pdf->ezStartPageNumbers(990, 34, 10);
$pdf->ezStream();
?>
