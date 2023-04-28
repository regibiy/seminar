		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$ed = mysqli_query($connect, "SELECT * FROM peserta, seminar, kartu_identitas, pendidikan
			                   WHERE peserta.id_seminar = seminar.id_seminar
							   AND peserta.id_kartu = kartu_identitas.id_kartu
							   AND peserta.id_pendidikan = pendidikan.id_pendidikan
							   AND peserta.token_peserta = '$_GET[tid]'");
			while ($r = mysqli_fetch_array($ed)){
		?>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Detail Data Seminar/Workshop <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  
						<div class="box-body">
							<p>
								<div class="form-group">
									<label for="exampleInputNoReg1">No. Registrasi</label>
									<input type="text" class="form-control" name="noreg" id="exampleInputNoReg1" placeholder="No. registrasi." value="<?php echo $r['id_peserta']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputTglDaftar1">Tanggal Daftar</label>
									<input type="text" class="form-control" name="tgl_daftar" id="exampleInputTglDaftar1" placeholder="Tanggal daftar." value="<?php echo $r['tgl_daftar']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputNmSmnr1">Nama Seminar/Workshop</label>
									<input type="text" class="form-control" name="nm_seminar" id="exampleInputNmSmnr1" placeholder="Nama seminar." value="<?php echo $r['nm_seminar']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputId1">Jenis Identitas</label>
									<input type="text" class="form-control" name="jns_id" id="exampleInputId1" placeholder="Jenis identitas." value="<?php echo $r['jns_kartuid']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputNoId1">No. Identitas</label>
									<input type="text" class="form-control" name="no_id" id="exampleInputNoId1" placeholder="No. identitas." value="<?php echo $r['no_kartuid']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputNmPst1">Nama Peserta</label>
									<input type="text" class="form-control" name="nm_peserta" id="exampleInputNmPst1" placeholder="Nama peserta." value="<?php echo $r['nama_peserta']; ?>" disabled>
								</div>
							</p>
							
							<p>
								<div class="form-group">
									<label for="exampleInputEdu1">Pendidikan</label>
									<input type="text" class="form-control" name="nm_peserta" id="exampleInputEdu1" placeholder="Tingkatan pendidikan." value="<?php echo $r['pendidikan']; ?>" disabled>
								</div>
							</p>
							
							<p>
								<div class="form-group">
									<label for="exampleInputAge1">Range Usia <small>(Tahun)</small></label>
									<input type="text" class="form-control" name="usia" id="exampleInputAge1" placeholder="Range usia." value="<?php echo $r['range_usia']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputEmailPst1">Email Peserta</label>
									<input type="text" class="form-control" name="email" id="exampleInputEmailPst1" placeholder="Email peserta." value="<?php echo $r['email_peserta']; ?>" readonly>
								</div>
							</p>
					
							<p>
								<?php
									if ($r['jns_kelamin']=='L'){
								?>
										
								<div class="form-group">
									<label>Jenis Kelamin</label>
								</div>
										
								<div class="form-group">
									<input type="radio" name="kelamin" id="optionsRadios1" value="L" checked disabled> Laki-laki
									<input type="radio" name="kelamin" id="optionsRadios1" value="P" disabled> Perempuan
								</div>
										
								<?php } else { ?>
										
								<div class="form-group">
									<label>Jenis Kelamin</label>
								</div>
										
								<div class="form-group">
									<input type="radio" name="kelamin" id="optionsRadios1" value="L" disabled> Laki-laki
									<input type="radio" name="kelamin" id="optionsRadios1" value="P" checked disabled> Perempuan
								</div>
										
								<?php } ?>
							</p>
					
							<p>
								<div class="box-body pad">
									<label>Alamat</label>
									<textarea class="textarea" name="alamat" placeholder="Alamat peserta." disabled style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['alamat_peserta']; ?></textarea>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputKotaKab1">Kota/Kabupaten</label>
									<input type="text" class="form-control" name="kota_kab" id="exampleInputKotaKab1" placeholder="Kota / kabupaten." value="<?php echo $r['kota_kab_peserta']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputKodePos1">Kode Pos</label>
									<input type="text" class="form-control" name="kodepos" id="exampleInputKodePos1" placeholder="Kode pos." value="<?php echo $r['kode_pos']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<div class="form-group">
									<label for="exampleInputNoHp1">No. HP</label>
									<input type="text" class="form-control" name="nohp" id="exampleInputNoHp1" placeholder="No. HP." value="<?php echo $r['no_hp']; ?>" disabled>
								</div>
							</p>
					
							<p>
								<?php
									if ($r['status_aktivasi']=='Y'){
								?>
										
								<div class="form-group">
									<label>Status Aktivasi</label>
								</div>
										
								<div class="form-group">
									<input type="radio" name="aktivasi" id="optionsRadios1" value="Y" checked disabled> Ya
									<input type="radio" name="aktivasi" id="optionsRadios1" value="N" disabled> Tidak
								</div>
										
								<?php } else { ?>
										
								<div class="form-group">
									<label>Status Aktivasi</label>
								</div>
										
								<div class="form-group">
									<input type="radio" name="aktivasi" id="optionsRadios1" value="Y" disabled> Ya
									<input type="radio" name="aktivasi" id="optionsRadios1" value="N" checked disabled> Tidak
								</div>
										
								<?php } ?>
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
						</div>
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