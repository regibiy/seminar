	<?php
		include "conf/koneksi.php";
		
		$sql = mysqli_query($connect, "SELECT * FROM identitas_web ORDER BY id_identitas LIMIT 1");
		while($r = mysqli_fetch_array($sql))
		{
	?>
	
	<div class="row marketing">
	
        <div class="col-lg-12">
          <div class="jumbotron">
          <p>
			<?php echo "<h3>"; echo $r['nama_pt']; echo "</h3>"; ?>
			<?php echo $r['alamat_pt']; ?>
			<?php echo "<br>"; echo $r['tlp_pt']; ?>
			<?php echo "<br>"; echo $r['email_pt']; ?>
			<?php echo "<br>"; echo $r['url']; ?>
		  </p>
		  </div>
        </div>
    </div>

	<?php } ?>