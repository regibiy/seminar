	<?php
		include "conf/koneksi.php";
		include "conf/fungsi_indotgl.php";
		
		$tid = isset($_GET['tid']) ? $_GET['tid'] : '' ;
		
		$sql = mysqli_query($connect, "SELECT * FROM seminar WHERE token_seminar = '$tid'");
		$r = mysqli_fetch_array($sql);
	?>
	
	<div class="row marketing">
        <div class="col-lg-12">
          <h4><?php echo $r['nm_seminar']; ?></h4>
          <p align="justify"><?php echo $r['deskripsi_seminar']; ?></p>
		  <br>
		  <p align="justify">
			<b>Pelaksanaan seminar/workshop</b><br>
			Tanggal : <?php echo tgl_indo($r['tgl_seminar']); ?><br>
			Waktu : <?php echo $r['jam_seminar']; ?><br>
			Lokasi : <?php echo $r['lokasi_seminar']; ?><br>
			Registrasi : <?php echo "IDR"; echo "&nbsp;"; echo $r['biaya_seminar']; ?><br>
		  </p>
        </div>
    </div>
	