<?php
include ('class.ezpdf.php');

$pdf = new Cezpdf('Legal','landscape');

$pdf->ezSetCmMargins(3.5,2,2,2);
$pdf->selectFont('fonts/Helvetica.afm');

$all = $pdf->openObject();
//tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('logo.jpg',55,525,69);

$pdf->addText(120, 560, 14,' <b>Kutuonline - Seminar and Workshop of Information Technology</b>');
$pdf->addText(120, 540, 14,' <b>Data Peserta Seminar/Workshop</b>');

//Garis header
$pdf->line(10, 520, 1000, 520);

//Garis footer
$pdf->line(10, 50, 1000, 50);

$pdf->addText(10,34,10,' Dicetak tanggal : ' . date('d M Y'));

$pdf->closeObject();
//tampilkan object di semua halaman
$pdf->addObject($all, 'all');

include "../../../conf/koneksi.php";

$sql=mysqli_query($connect, "SELECT peserta.id_peserta, peserta.tgl_daftar, kartu_identitas.jns_kartuid,
           peserta.no_kartuid, peserta.nama_peserta, seminar.nm_seminar, 
           peserta.jns_kelamin, peserta.alamat_peserta,
		   peserta.kota_kab_peserta, peserta.kode_pos, peserta.no_hp, 
		   peserta.email_peserta, peserta.status_aktivasi
		   FROM peserta, seminar, kartu_identitas
           WHERE peserta.id_seminar = seminar.id_seminar 
		   AND peserta.id_kartu = kartu_identitas.id_kartu
		   ORDER BY peserta.id_peserta");
$i=1;
while ($r = mysqli_fetch_array($sql)) {
  $data[$i]=array('<b>No. </b>'=>$i,
  				  '<b>No. Registrasi</b>'=>$r['id_peserta'],
                  '<b>Tgl Daftar</b>'=>$r['tgl_daftar'],
				  '<b>Nama Peserta</b>'=>$r['nama_peserta'],
				  '<b>Nama Seminar</b>'=>$r['nm_seminar'],
				  '<b>Jenis Id.</b>'=>$r['jns_kartuid'],
				  '<b>No. Id.</b>'=>$r['no_kartuid'],
				  '<b>No. HP</b>'=>$r['no_hp'],
				  '<b>Email</b>'=>$r['email_peserta']);
$i++;
}
$pdf->ezTable($data, '', '', '');

$pdf->ezStartPageNumbers(990, 34, 10);
$pdf->ezStream();
?>
