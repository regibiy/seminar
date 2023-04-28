	<?php
		include "conf/koneksi.php";
		
		$sql = mysqli_query($connect, "SELECT * FROM cara_daftar WHERE aktif_caradaftar='Y'");
		$r = mysqli_fetch_array($sql);
	?>
	
	<div class="row marketing">
        <div class="col-lg-12">
          <p align="center"><?php echo "<img src='cpanel/img_caradaftar/$r[img_caradaftar]'>"; ?></p>
		  <p align="justify"><?php echo $r['isi_caradaftar']; ?></p>
        </div>
    </div>