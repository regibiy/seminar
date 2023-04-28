<?php
	include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
						<i class="fa fa-bullhorn"></i>
						<h3 class="box-title">Kolom Informasi</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="callout callout-info">
							<h4>Perhatian!</h4>
							<p align="justify">Ubah <b>status pembayaran</b> dengan tahapan sebagai berikut: 1) <b>Baru</b>, transfer pembayaran baru saja dilakukan oleh peserta; 2) <b>Menunggu</b>, transfer pembayaran belum diterima oleh Admin; 3) <b>Lunas</b>, transfer pembayaran sudah diterima oleh Admin; 4) <b>Batal</b>, transfer pembayaran belum dilakukan oleh peserta dalam jangka waktu tertentu (maks: 3 hari).</p>
							<p align="justify">Klik aksi <b>Detail</b> untuk mendapatkan informasi lebih lanjut mengenai data pembayaran peserta.</p>
							<p align="justify">Apabila seminar/workshop telah berlangsung, dan data pembayaran sudah diterima semua oleh Admin maka data pembayaran diperbolehkan untuk di <b>hapus</b>.</p>
							<p align="justify">Admin dapat mengunduh laporan data peserta dalam format yang telah disediakan. klik tombol <b>Export to XLS</b> untuk mengunduh laporan data peserta dalam format Excel, dan klik tombol <b>Export to PDF</b> untuk mengunduh laporan data peserta dalam format PDF.</p>
						</div>
					</div>
				</div>
			</div>
			
			<form action="pages/payment/actionexport.php" method="post" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getXls" value="Export to XLS">
			</div>
			</form>
			
			<form action="pages/payment/pdf_payment.php" method="post" target="_blank" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Export to PDF">
			</div>
			</form>
			
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Pembayaran Peserta Seminar/Workshop</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>No. Pembayaran</th>
						<th>Tgl. Transfer</th>
                        <th>No. Registrasi</th>
                        <th>Nama Peserta</th>
                        <th>Gateway</th>
                        <th>Bank Transfer</th>
						<th>Status Pembayaran</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
					
					<tbody>
					
					<?php
						include "../conf/koneksi.php";
						
						$vw = mysqli_query($connect, "SELECT * FROM peserta, seminar, pembayaran, bank
      						              WHERE peserta.id_seminar = seminar.id_seminar
										  AND pembayaran.id_peserta = peserta.id_peserta
										  AND pembayaran.id_seminar = seminar.id_seminar
										  AND pembayaran.id_bank = bank.id_bank
										  ORDER BY pembayaran.id_pembayaran DESC");
						$no = 1;
						while ($r = mysqli_fetch_array($vw)){
					?>
					
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo "$r[id_pembayaran]"; ?></td>
                        <td><?php echo "$r[tgl_transfer]"; ?></td>
                        <td><?php echo "$r[id_peserta]"; ?></td>
                        <td><?php echo "$r[nama_peserta]"; ?></td>
                        <td><?php echo "$r[nm_bank]"; ?></td>
						<td><?php echo "$r[bank_transfer]"; ?></td>
						<td><?php echo "$r[status_bayar]"; ?></td>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-default" name="submit" value="Detail" onclick="window.location='?page=dtPay&tid=<?php echo $r['token_bayar']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlPay&tid=<?php echo $r['token_bayar']; ?>' ">
							</div>
						</td>
                      </tr>
					  
					  <?php $no++; } ?>
                    </tbody>
					
				  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
	<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
	
	<!-- script datatables -->
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
	
  </body>
</html>


