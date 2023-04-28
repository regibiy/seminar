		  <?php
			include "conf/fungsi_indotgl.php";
		  ?>
		  
		  <h2 class="sub-header">Data Peserta</h2>
          <div class="table-responsive">										
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>No. Registrasi</th>
				  <th>Tgl Pendaftaran</th>
                  <th>Nama Peserta</th>
				  <th>Seminar</th>
				  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
				<?php
					include "conf/koneksi.php";
					
					if(!isset($_SESSION['email_pst'])){
						include "lib/inc.session.pst.php";
						} else {
							$sql = mysqli_query($connect, "SELECT * FROM peserta, seminar, pembayaran
							                    WHERE peserta.id_seminar = seminar.id_seminar 
												AND pembayaran.id_seminar = seminar.id_seminar
												AND pembayaran.id_peserta = peserta.id_peserta
												AND peserta.email_peserta = '$_SESSION[email_pst]'");
							$no = 1;
							while($r = mysqli_fetch_array($sql)){
				?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $r['id_peserta']; ?></td>
									<td><?php echo tgl_indo($r['tgl_daftar']); ?></td>
									<td><?php echo $r['nama_peserta']; ?></td>
									<td><?php echo $r['nm_seminar']; ?></td>
									<td>
									<?php 
										if($r['status_bayar']=='Baru' OR $r['status_bayar']=='Menunggu'){
									?>
											<a class="btn btn-primary" href="#" role="button" disabled>Sedang proses..</a>
									<?php } else ?>
									
									<?php 
										if($r['status_bayar']=='Lunas'){
									?>
											<a class="btn btn-primary" href="cetak-bukti-registrasi.html?tid=<?php echo $r['token_peserta']; ?>" role="button" target="_blank">Cetak Bukti Pendaftaran</a>
									<?php } else ?>
									
									<?php 
										if($r['status_bayar']=='Batal'){
									?>
											<a class="btn btn-primary" href="#" role="button" disabled>Dibatalkan</a>
									<?php } ?>
									</td>
								</tr>
						<?php 
							$no++; 
							}
						} 
						?>
              </tbody>
            </table>
          </div>