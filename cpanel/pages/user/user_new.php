		<script type="text/javascript">
		function validasi(){
			/*--- validasi radio button jenis kelamin ---*/
			var laki = form1.kelamin[0].checked;
			var prp = form1.kelamin[1].checked;
			if(laki==false && prp==false){
				alert("Silahkan pilih jenis kelamin.");
				return false;
			}
			
			/*--- validasi foto pengguna ---*/
			var img = (form1.fupload.value);
			if(img == ""){
				alert("Silahkan pilih foto pengguna.");
				document.form1.fupload.focus();
				return false;
			}
		}
		</script>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Tambah Data Pengguna <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  
						<form role="form" name="form1" action="?page=svUs" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputPengguna1">Nama Pengguna</label>
										<input type="text" class="form-control" name="nama_pengguna" id="exampleInputPengguna1" placeholder="Masukkan nama pengguna" required="required">
									</div>
								</p>
					
								<p>				
									<div class="form-group">
										<label>Jenis Kelamin</label>
									</div>
										
									<div class="form-group">
										<input type="radio" name="kelamin" id="optionsRadios1" value="L" > Laki-laki &nbsp;
										<input type="radio" name="kelamin" id="optionsRadios1" value="P" > Perempuan
									</div>
								</p>
					
								<p>
									<div class="box-body pad">
										<label>Alamat Lengkap</label>
										<textarea class="textarea" name="alamat" placeholder="Masukkan alamat pengguna (nama jalan, nama daerah/komplek/cluster, blok, no. rumah, rt, rw, desa/kelurahan, kecamatan)" required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputKotaKab1">Kota/Kabupaten</label>
										<input type="text" class="form-control" name="kota_kab" id="exampleInputKotaKab1" placeholder="Masukkan nama kota / kabupaten" required="required">
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputKodepos1">Kode Pos</label>
										<input type="text" class="form-control" name="kodepos" id="exampleInputKodepos1" placeholder="Masukkan kode pos (hanya dapat di isi angka)" required="required">
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputEmail1">Email Pengguna</label>
										<input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masukkan email pengguna (format: nama_email@domain.com)" required="required">
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputHp1">No. HP Pengguna</label>
										<input type="text" class="form-control" name="hp" id="exampleInputHp1" placeholder="Masukkan no. HP pengguna (hanya dapat di isi angka)" required="required">
									</div>
								</p>

								<p>
									<div class="form-group">
										<label for="exampleInputFile">Foto Pengguna</label>
										<input type="file" id="exampleInputFile" name="fupload">
										<p class="help-block">File foto harus bertipe *.jpeg, *.jpg, atau *.png</p>
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