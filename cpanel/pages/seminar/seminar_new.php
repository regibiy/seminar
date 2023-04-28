		<?php
			include "../lib/inc.session.php";
		?>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Tambah Seminar/Workshop <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  
						<form role="form" name="form1" action="?page=svSmnr" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputSmnr1">Nama Seminar/Workshop</label>
										<input type="text" class="form-control" name="nama_seminar" id="exampleInputSmnr1" placeholder="Ketikkan nama seminar/workshop." required="required">
									</div>
								</p>
					
								<p>
									<div class="box-body">
										<div class="row">
											<div class="col-xs-4">
												<label>Tanggal Pelaksanaan</label>
												<input type="text" name="tgl" class="form-control" id="datetimepicker2" placeholder="Pilih tanggal." required="required">
											</div>
											<div class="col-xs-4">
												<label>Waktu Pelaksanaan</label>
												<input type="text" name="jam" class="form-control" id="datetimepicker1" placeholder="Pilih waktu." required="required">
											</div>
											<div class="col-xs-4">
												<label>Biaya (IDR)</label>
												<input type="text" name="biaya" class="form-control" placeholder="Biaya seminar/workshop." required="required">
											</div>
										</div>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputLksSmnr1">Lokasi Seminar/Workshop</label>
										<input type="text" class="form-control" name="lokasi_seminar" id="exampleInputLksSmnr1" placeholder="Ketikkan lokasi seminar/workshop." required="required">
									</div>
								</p>
					
								<p>
									<div class="box-body pad">
										<label>Headline Seminar/Workshop</label>
										<textarea class="textarea" name="headline" placeholder="Ketikkan headline seminar/workshop." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									</div>
								</p>

								<p>
									<div class="box-body pad">
										<label>Deskripsi Seminar/Workshop</label>
										<textarea class="textarea" name="deskripsi" placeholder="Ketikkan deskripsi seminar/workshop." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									</div>
								</p>
								
							</div>
							<div class="box-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
								<button type="submit" class="btn btn-primary pull-right" name="submit">Save</button>
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