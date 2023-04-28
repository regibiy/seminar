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
							<p align="justify">Apabila seminar/workshop telah berlangsung, dan data peserta telah di unduh untuk keperluan selanjutnya (seperti rekapitulasi peserta, pembuatan sertifikat, dll) maka data peserta diperbolehkan untuk di <b>hapus</b>.</p>
							<p align="justify">Klik aksi <b>Detail</b> untuk mendapatkan informasi lebih lanjut mengenai peserta.</p>
							<p align="justify">Admin dapat mengunduh laporan data peserta dalam format yang telah disediakan. klik tombol <b>Export to XLS</b> untuk mengunduh laporan data peserta dalam format Excel, dan klik tombol <b>Export to PDF</b> untuk mengunduh laporan data peserta dalam format PDF.</p>
						</div>
					</div>
				</div>
			</div>
			
			<form action="pages/peserta/actionexport.php" method="post" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getXls" value="Export to XLS">
			</div>
			</form>
			
			<form action="pages/peserta/pdf_peserta.php" method="post" target="_blank" name="postform">
			<div class="col-xs-3">
				<input type="submit" class="btn btn-block btn-primary" name="getPdf" value="Export to PDF">
			</div>
			</form>
			
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Peserta Seminar/Workshop</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>No. Registrasi</th>
						<th>Tgl. Daftar</th>
                        <th>Nama Seminar/Workshop</th>
                        <th>No. Identitas</th>
                        <th>Nama Peserta</th>
                        <th>Email</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
					
					<tbody>
					
					<?php
						include "../conf/koneksi.php";
						
						$vw = mysqli_query($connect, "SELECT * FROM peserta, seminar
      						              WHERE peserta.id_seminar = seminar.id_seminar
										  ORDER BY peserta.id_peserta DESC");
						$no = 1;
						while ($r = mysqli_fetch_array($vw)){
					?>
					
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo "$r[id_peserta]"; ?></td>
                        <td><?php echo "$r[tgl_daftar]"; ?></td>
                        <td><?php echo "$r[nm_seminar]"; ?></td>
                        <td><?php echo "$r[no_kartuid]"; ?></td>
                        <td><?php echo "$r[nama_peserta]"; ?></td>
						<td><?php echo "$r[email_peserta]"; ?></td>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-default" name="submit" value="Detail" onclick="window.location='?page=dtPst&tid=<?php echo $r['token_peserta']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlPst&tid=<?php echo $r['token_peserta']; ?>' ">
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


