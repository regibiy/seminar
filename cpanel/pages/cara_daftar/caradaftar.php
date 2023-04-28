		<script type="text/javascript">
		function validasi(){
			
			/*--- validasi gambar cara daftar ---*/
			var img = (form1.fupload.value);
			if(img == ""){
				alert("Silahkan pilih gambar informasi cara pendaftaran.");
				document.form1.fupload.focus();
				return false;
			}
		}
		</script>
		
		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$id = mysqli_query($connect, "SELECT * FROM cara_daftar LIMIT 1");
			while ($r = mysqli_fetch_array($id)){
		?>
		
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Cara Pendaftaran Seminar/Workshop <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				
						<form role="form" name="form1" action="?page=crRegUp" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
							<div class="box-body">
								<input type='hidden' name='tid' value="<?php echo $r['id_caradaftar']; ?>" >
								<p>
									<div class="box-body pad">
										<textarea class="textarea" name="caradaftar" placeholder="Ketikkan cara pendaftaran disini." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required="required"><?php echo $r['isi_caradaftar']; ?></textarea>
									</div>
								</p>
				
								<p>
									<div class="box-body pad">
										<?php echo "<img src='img_caradaftar/$r[img_caradaftar]' oncontextmenu='return false;'>"; ?>
										<!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
									</div>
								</p>
					
								<p>
									<div class="box-body pad">
										<label for="exampleInputFile">Ubah Gambar Cara Pendaftaran</label>
										<input type="file" id="exampleInputFile" name="fupload">
										<p class="help-block">File gambar harus bertipe *.jpeg, *.jpg, atau *.png</p>
									</div>
								</p>
				
								<p>
									<div class="box-body pad">
					
									<?php
										if ($r['aktif_caradaftar']=='Y'){
									?>
										
										<div class="form-group">
											<label>Aktifkan Cara Pendaftaran</label>
										</div>
										
										<div class="form-group">
											<input type="radio" name="aktif" id="optionsRadios1" value="Y" checked> Ya
											<input type="radio" name="aktif" id="optionsRadios1" value="N" > Tidak
										</div>
										
									<?php } else { ?>
										
										<div class="form-group">
											<label>Aktifkan Cara Pendaftaran</label>
										</div>
										
										<div class="form-group">
											<input type="radio" name="aktif" id="optionsRadios1" value="Y" > Ya
											<input type="radio" name="aktif" id="optionsRadios1" value="N" checked> Tidak
										</div>
										
									<?php } ?>
									</div>
								</p>
							</div><!-- /.box-body -->
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