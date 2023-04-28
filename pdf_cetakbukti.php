<?php
session_start();

include ('cpanel/pages/peserta/class.ezpdf.php');

$pdf = new Cezpdf('A4','portrait');

$pdf->ezSetCmMargins(3.5,2,2,2);
$pdf->selectFont('cpanel/pages/peserta/fonts/Helvetica.afm');

$all = $pdf->openObject();
//tampilkan logo
$pdf->setStrokeColor(0, 0, 0, 1);
$pdf->addJpegFromFile('header.jpg',5,760,585);
$pdf->addJpegFromFile('footer.jpg',20,470,569);

//Garis footer
$pdf->line(5, 541, 590, 541);

$pdf->closeObject();
//tampilkan object di semua halaman
$pdf->addObject($all, 'all');

include "conf/koneksi.php";

if(!isset($_SESSION['email_pst'])){
	include "../lib/inc.session.pst.php";
	} else {

	$sql = mysqli_query($connect, "SELECT * FROM seminar, peserta
                    WHERE seminar.id_seminar = peserta.id_seminar
					AND peserta.email_peserta = '$_SESSION[email_pst]'");
	
	$i=1;
	while ($r = mysqli_fetch_array($sql)) {
	
		$no_reg = $r['id_peserta'];
		$peserta = $r['nama_peserta'];
		$nm_seminar = $r['nm_seminar'];
		$tgl = $r['tgl_seminar'];
		$jam = $r['jam_seminar'];
		$key = $r['token_peserta'];
		
	$i++;
	}
}

//------------set margin kiri kanan, margin atas bawah, ukuran font----//
$pdf->addText(10,720,12,"{$peserta}");
$pdf->addText(10,700,16,"{$nm_seminar}");
$pdf->addText(10,685,10,"Tanggal : {$tgl}"); $pdf->addText(120,685,10,"Jam : {$jam}");
$pdf->addText(198,630,36,"{$no_reg}",0,array("justification"=>"center"));
$pdf->ezText("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nSecurity key : {$key}",8,array("justification"=>"center"));

//$pdf->addText(40,560,12,"{$no_reg}");
$pdf->addText(15,470,12,"{$no_reg}",-90, 'left');

$pdf->ezStream();
?>
