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
						<p align="justify">Apabila seminar/workshop telah berlangsung, maka seminar/workshop dapat di <b>hapus</b> atau di <b>nonaktifkan (Aktif: N)</b> agar seminar/workshop yang telah berlangsung tidak tampil dalam komponen pilihan seminar yang terdapat pada form registrasi online untuk pelaksanaan seminar/workshop berikutnya.</p>
					</div>
					</div>
				</div>
			</div>
		  
			<div class="col-xs-3">
				<input type="button" class="btn btn-block btn-primary" name="addBtnCard" value="Tambah Seminar/Workshop" onclick="window.location='?page=adSmnr'">
			</div>
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Seminar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
                        <th>Nama Seminar/Workshop</th>
                        <th>Aktif</th>
                        <th>Created Date</th>
                        <th>Modified Date</th>
						<th>Created User</th>
						<th>Modified User</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
					
					<tbody>
					
					<?php
						include "../conf/koneksi.php";
						
						$vw = mysqli_query($connect, "SELECT * FROM seminar ORDER BY id_seminar DESC");
						$no = 1;
						while ($r = mysqli_fetch_array($vw)){
					?>
					
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo "$r[nm_seminar]"; ?></td>
                        <td><?php echo "$r[aktif_seminar]"; ?></td>
                        <td><?php echo "$r[cr_dt_seminar]"; ?></td>
                        <td><?php echo "$r[md_dt_seminar]"; ?></td>
                        <td><?php echo "$r[cr_username_seminar]"; ?></td>
						<td><?php echo "$r[md_username_seminar]"; ?></td>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edSmnr&tid=<?php echo $r['token_seminar']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlSmnr&tid=<?php echo $r['token_seminar']; ?>' ">
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


