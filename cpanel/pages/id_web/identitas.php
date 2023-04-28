	
		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$id = mysqli_query($connect, "SELECT * FROM identitas_web LIMIT 1");
			while ($r = mysqli_fetch_array($id)){
		?>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Identitas Website <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  
						<form role="form" name="form1" action="?page=idUp" method="post" enctype="multipart/form-data" onSubmit="return validasi()">
							<div class="box-body">
								<input type='hidden' name='tid' value="<?php echo $r['id_identitas']; ?>" >
								<p>
									<div class="form-group">
										<label for="exampleInputWeb1">Nama Website</label>
										<input type="text" class="form-control" name="nama_web" id="exampleInputWeb1" placeholder="Ketikkan nama website" value="<?php echo $r['nm_website']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="form-group">
										<label for="exampleInputPerusahaan1">Nama Perusahaan</label>
										<input type="text" class="form-control" name="nama_pt" id="exampleInputPerusahaan1" placeholder="Ketikkan nama perusahaan" value="<?php echo $r['nama_pt']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="box-body pad">
										<label>Alamat Perusahaan</label>
										<textarea class="textarea" name="alamat" placeholder="Ketikkan alamat perusahaan" required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat_pt']; ?></textarea>
									</div>
								</p>
							
								<p>
									<div class="box-body">
										<div class="row">
											<div class="col-xs-4">
												<label>Kode Pos</label>
												<input type="text" name="kodepos" class="form-control" placeholder="Ketikkan kode pos." value="<?php echo $r['kode_pos']; ?>" required="required">
											</div>
											<div class="col-xs-4">
												<label>Telepon Perusahaan</label>
												<input type="text" name="tlp" class="form-control" placeholder="Ketikkan no. telepon." value="<?php echo $r['tlp_pt']; ?>" required="required">
											</div>
											<div class="col-xs-4">
												<label>Rekening Perusahaan</label>
												<input type="text" name="rekening" class="form-control" placeholder="Ketikkan no. rekening." value="<?php echo $r['rekening_pt']; ?>" required="required">
											</div>
										</div>
									</div>
								</p>
							
								<p>
									<div class="form-group">
										<label for="exampleInputEmail1">Email Perusahaan</label>
										<input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="Ketikkan email perusahaan" value="<?php echo $r['email_pt']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="form-group">
										<label for="exampleInputUrl1">URL Perusahaan</label>
										<input type="text" class="form-control" name="url" id="exampleInputUrl1" placeholder="Ketikkan alamat URL perusahaan" value="<?php echo $r['url']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="form-group">
										<label for="exampleInputFB1">Akun Facebook Perusahaan</label>
										<input type="text" class="form-control" name="fb" id="exampleInputFB1" placeholder="Ketikkan akun Facebook perusahaan" value="<?php echo $r['facebook']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="form-group">
										<label for="exampleInputTwitter1">Akun Twitter Perusahaan</label>
										<input type="text" class="form-control" name="twitter" id="exampleInputTwitter1" placeholder="Ketikkan akun Twitter perusahaan" value="<?php echo $r['twitter']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="form-group">
										<label for="exampleInputInsta1">Akun Instagram Perusahaan</label>
										<input type="text" class="form-control" name="instagram" id="exampleInputInsta1" placeholder="Ketikkan akun Instagram perusahaan" value="<?php echo $r['instagram']; ?>" required="required">
									</div>
								</p>
							
								<p>
									<div class="box-body pad">
										<label>Meta Deskripsi</label>
										<textarea class="textarea" name="deskripsi" placeholder="Deskripsikan website dengan kalimat disini." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['meta_deskripsi']; ?></textarea>
									</div>
								</p>
							
								<p>
									<div class="box-body pad">
										<label>Meta Keyword</label>
										<textarea class="textarea" name="keyword" placeholder="Deskripsikan website dengan kata kunci disini." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['meta_keyword']; ?></textarea>
									</div>
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