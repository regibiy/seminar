		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$ed = mysqli_query($connect, "SELECT * FROM seminar WHERE token_seminar = '$_GET[tid]'");
			while ($r = mysqli_fetch_array($ed)){
		?>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Data Seminar/Workshop <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
						
						<form role="form" name="form1" action="?page=upSmnr" method="post">
							<input type='hidden' name='tid' value="<?php echo $r['token_seminar']; ?>" >
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputSmnr1">Nama Seminar/Workshop</label>
										<input type="text" class="form-control" name="nama_seminar" id="exampleInputSmnr1" placeholder="Ketikkan nama seminar." value="<?php echo $r['nm_seminar']; ?>" required="required">
									</div>
								</p>
					
								<p>
									<div class="box-body">
										<div class="row">
											<div class="col-xs-4">
												<label>Tanggal Pelaksanaan</label>
												<input type="text" name="tgl" class="form-control" id="datetimepicker2" placeholder="Pilih tanggal." value="<?php echo $r['tgl_seminar']; ?>" required="required">
											</div>
											<div class="col-xs-4">
												<label>Waktu Pelaksanaan</label>
												<input type="text" name="jam" class="form-control" id="datetimepicker1" placeholder="Pilih waktu." value="<?php echo $r['jam_seminar']; ?>" required="required">
											</div>
											<div class="col-xs-4">
												<label>Biaya (IDR)</label>
												<input type="text" name="biaya" class="form-control" placeholder="Biaya seminar/workshop." value="<?php echo $r['biaya_seminar']; ?>" required="required">
											</div>
										</div>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputLksSmnr1">Lokasi Seminar/Workshop</label>
										<input type="text" class="form-control" name="lokasi_seminar" id="exampleInputLksSmnr1" placeholder="Ketikkan lokasi seminar/workshop." value="<?php echo $r['lokasi_seminar']; ?>" required="required">
									</div>
								</p>
					
								<p>
									<div class="box-body pad">
										<label>Headline Seminar/Workshop</label>
										<textarea class="textarea" name="headline" placeholder="Ketikkan headline seminar/workshop." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['headline_seminar']; ?></textarea>
									</div>
								</p>

								<p>
									<div class="box-body pad">
										<label>Deskripsi Seminar/Workshop</label>
										<textarea class="textarea" name="deskripsi" placeholder="Ketikkan deskripsi seminar." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['deskripsi_seminar']; ?></textarea>
									</div>
								</p>
					
								<p>
									<?php
										if ($r['aktif_seminar']=='Y'){
									?>
										
									<div class="form-group">
										<label>Aktifkan Seminar/Workshop</label>
									</div>
										
									<div class="form-group">
										<input type="radio" name="aktif" id="optionsRadios1" value="Y" checked> Ya
										<input type="radio" name="aktif" id="optionsRadios1" value="N" > Tidak
									</div>
										
									<?php } else { ?>
										
									<div class="form-group">
										<label>Aktifkan Seminar/Workshop</label>
									</div>
										
									<div class="form-group">
										<input type="radio" name="aktif" id="optionsRadios1" value="Y" > Ya
										<input type="radio" name="aktif" id="optionsRadios1" value="N" checked> Tidak
									</div>
										
									<?php } ?>
								</p>
							</div>
							<div class="box-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
								<button type="submit" class="btn btn-primary pull-right" name="submit">Save changes</button>
							</div>
						</form>
					</div>
				</div><!-- /.col-->
			</div><!-- ./row -->
        </section><!-- /.content -->
		
		<script src="jquery.js"></script>
		<script src="build/jquery.datetimepicker.full.js"></script>
		<script>
			$('#datetimepicker1').datetimepicker({
				datepicker:false,
				format:'H:i',
				step:5
			});
			$('#datetimepicker2').datetimepicker({
				yearOffset:10,
				lang:'ch',
				timepicker:false,
				/*-- format:'d/m/Y', format tanggal indonesia --*/
				format:'Y/m/d',
				formatDate:'Y/m/d',
				minDate:'-2010/01/02', // yesterday is minimum date
				maxDate:'+2010/01/02' // and tommorow is maximum date calendar
			});
		</script>
		
		<?php } ?>