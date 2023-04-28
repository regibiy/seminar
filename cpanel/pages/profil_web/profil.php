		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$id = mysqli_query($connect, "SELECT * FROM profil_web LIMIT 1");
			while ($r = mysqli_fetch_array($id)){
		?>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Profil Website <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  
						<form role="form" name="form1" action="?page=pfUp" method="post">
							<div class="box-body">
								<input type='hidden' name='tid' value="<?php echo $r['id_profil']; ?>" >
					
								<p>
									<div class="box-body pad">
										<label>Isi Profil Website</label>
										<textarea class="textarea" name="profil" placeholder="Ketikkan profil website disini." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['isi_profil']; ?></textarea>
									</div>
								</p>
					
								<p>
									<?php
										if ($r['aktif_profil']=='Y'){
									?>
										
										<div class="form-group">
											<label>Aktifkan Profil Website</label>
										</div>
										
										<div class="form-group">
											<input type="radio" name="aktif" id="optionsRadios1" value="Y" checked> Ya
											<input type="radio" name="aktif" id="optionsRadios1" value="N" > Tidak
										</div>
										
									<?php } else { ?>
										
										<div class="form-group">
											<label>Aktifkan Profil Website</label>
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
		
		<?php } ?>