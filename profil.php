	<?php
		include "conf/koneksi.php";
		
		$sql = mysqli_query($connect, "SELECT * FROM profil_web WHERE aktif_profil='Y'");
		$r = mysqli_fetch_array($sql);
	?>
	
	<div class="row marketing">
        <div class="col-lg-12">
          <h4>Tentang Kami</h4>
          <p align="justify"><?php echo $r['isi_profil']; ?></p>
        </div>
    </div>