	<?php
		include "conf/koneksi.php";
		include "conf/fungsi_indotgl.php";
		
		$sql = mysqli_query($connect, "select * from seminar where aktif_seminar = 'Y' ");
		$r = mysqli_fetch_array($sql);
		
		$tgl = tgl_indo($r['tgl_seminar']);
		
		if(!$r['aktif_seminar']=='Y'){
			
	?>
	
	<div class="jumbotron">
		<h1>Seminar dan Workshop</h1>
        <p class="lead">Maaf, belum ada seminar/workshop dalam waktu dekat ini.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button" disabled>Daftar</a></p>
    </div>
	
	<?php } else { ?>
	
	<div class="jumbotron">
		<h1><?php echo $r['nm_seminar']; ?></h1>
        <p class="lead"><?php echo $r['headline_seminar']; ?> <br><br> Seminar/workshop akan diadakan pada tanggal <?php echo "<b>"; echo $tgl; echo "</b>"; ?>, cukup dengan registrasi sebesar <b>IDR</b> <?php echo "<b>"; echo $r['biaya_seminar']; echo "</b>"; ?> Anda sudah dapat mengikuti seminar/workshop. Berminat? Silahkan klik daftar dibawah ini.</p>
        <p><a class="btn btn-lg btn-success" href="registrasi.html" role="button">Daftar</a></p>
    </div>
	
	<?php } ?>

	<!----------------------------------------- end of headline seminar/workshop --------------------------------------->
	
	<?php
		include "conf/koneksi.php";
		
		$sql = mysqli_query($connect, "select * from seminar order by id_seminar ASC");
		while($r = mysqli_fetch_array($sql)){
	?>
    <div class="row marketing">
        <div class="col-lg-12">
			<h4><?php echo $r['nm_seminar']; ?> (<?php echo tgl_indo($r['tgl_seminar']); ?>)</h4>
			<p align="justify"><?php echo $r['headline_seminar']; ?></p>
			<p><button type="button" class="btn btn-sm btn-primary" onclick="window.location='detail-<?php echo $r['token_seminar']; ?>.html' ">More info</button></p>
		</div>
	</div>
	<?php } ?>