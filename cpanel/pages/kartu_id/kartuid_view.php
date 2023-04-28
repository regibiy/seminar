<?php
	include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>

  <body class="hold-transition skin-blue sidebar-mini">

        <!-- Main content -->
        <section class="content">
          <div class="row">
			<div class="col-xs-3">
				<input type="button" class="btn btn-block btn-primary" name="addBtnCard" value="Tambah Kartu Identitas" onclick="window.location='?page=adCard'">
			</div>
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Kartu Identitas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
                        <th>Kartu Identitas</th>
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
						
						$vw = mysqli_query($connect, "SELECT * FROM kartu_identitas ORDER BY id_kartu DESC");
						$no = 1;
						while ($r = mysqli_fetch_array($vw)){
					?>
					
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo "$r[jns_kartuid]"; ?></td>
                        <td><?php echo "$r[aktif_kartuid]"; ?></td>
                        <td><?php echo "$r[cr_dt_kartuid]"; ?></td>
                        <td><?php echo "$r[md_dt_kartuid]"; ?></td>
                        <td><?php echo "$r[cr_username_kartuid]"; ?></td>
						<td><?php echo "$r[md_username_kartuid]"; ?></td>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edCard&tid=<?php echo $r['token_kartuid']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlCard&tid=<?php echo $r['token_kartuid']; ?>' ">
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


