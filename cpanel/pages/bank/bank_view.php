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
				<input type="button" class="btn btn-block btn-primary" name="addBtnBn" value="Tambah Bank" onclick="window.location='?page=adBn'">
			</div>
			<div class="col-xs-12">
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Bank</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
                        <th>Nama Bank</th>
						<th>No. Rekening</th>
                        <th>Pemilik Rekening</th>
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
						
						$vw = mysqli_query($connect, "SELECT * FROM bank ORDER BY nm_bank DESC");
						$no = 1;
						while ($r = mysqli_fetch_array($vw)){
					?>
					
                      <tr>
						<td><?php echo $no; ?></td>
                        <td><?php echo "$r[nm_bank]"; ?></td>
						<td><?php echo "$r[no_rek]"; ?></td>
                        <td><?php echo "$r[pemilik_rek]"; ?></td>
                        <td><?php echo "$r[cr_dt_bank]"; ?></td>
                        <td><?php echo "$r[md_dt_bank]"; ?></td>
                        <td><?php echo "$r[cr_username_bank]"; ?></td>
						<td><?php echo "$r[md_username_bank]"; ?></td>
						<td>
							<div class="btn-group">
								<input type="button" class="btn btn-default" name="submit" value="Edit" onclick="window.location='?page=edBn&tid=<?php echo $r['token_bank']; ?>' ">
								<input type="button" class="btn btn-default" name="reset" value="Hapus" onclick="window.location='?page=dlBn&tid=<?php echo $r['token_bank']; ?>' ">
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


