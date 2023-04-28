		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$ed = mysqli_query($connect, "SELECT * FROM peserta, seminar, pembayaran, bank
			                   WHERE peserta.id_seminar = seminar.id_seminar
							   AND pembayaran.id_peserta = peserta.id_peserta
							   AND pembayaran.id_seminar = seminar.id_seminar
							   AND pembayaran.id_bank = bank.id_bank
							   AND pembayaran.token_bayar = '$_GET[tid]'");
			while ($r = mysqli_fetch_array($ed)){
			
			if ($r['status_bayar']=='Baru'){
				$pilihan_status = array('Baru', 'Menunggu');
			}
			elseif ($r['status_bayar']=='Menunggu'){
				$pilihan_status = array('Menunggu', 'Lunas');
			}
			elseif ($r['status_bayar']=='Lunas'){
				$pilihan_status = array('Lunas', 'Batal');
			}
			else{
				$pilihan_status = array('Baru', 'Menunggu', 'Lunas', 'Batal');
			}

			$pilihan_bayar = '';
			foreach ($pilihan_status as $status) {
				$pilihan_bayar .= "<option value=$status";
				if ($status == $r['status_bayar']) {
					$pilihan_bayar .= " selected";
				}
				$pilihan_bayar .= ">$status</option>\r\n";
			}
		?>
		
		<!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Detail Data Pembayaran Peserta Seminar/Workshop <small>Kutuonline</small></h3>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
							</div><!-- /. tools -->
						</div><!-- /.box-header -->
				  
						<form role="form" name="form1" action="?page=upPay" method="post">
							<input type='hidden' name='tid' value="<?php echo $r['token_bayar']; ?>" >
							<div class="box-body">
								<p>
									<div class="form-group">
										<label for="exampleInputNoPay1">No. Pembayaran</label>
										<input type="text" class="form-control" name="nopay" id="exampleInputNoPay1" placeholder="No. pembayaran." value="<?php echo $r['id_pembayaran']; ?>" readonly>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputTglTrf1">Tanggal Transfer</label>
										<input type="text" class="form-control" name="tgl_trf" id="exampleInputTglTrf1" placeholder="Tanggal transfer." value="<?php echo $r['tgl_transfer']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputJamTrf1">Jam Transfer</label>
										<input type="text" class="form-control" name="jam_trf" id="exampleInputJamTrf1" placeholder="Jam transfer." value="<?php echo $r['jam_transfer']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<label>Ubah Status Pembayaran</label>
									<select name='status_byr' class='form-control'>
										<?php echo $pilihan_bayar ?>
									</select>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputNmSmnr1">Nama Seminar/Workshop</label>
										<input type="text" class="form-control" name="nm_seminar" id="exampleInputNmSmnr1" placeholder="Nama seminar." value="<?php echo $r['nm_seminar']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputNoReg1">No. Registrasi</label>
										<input type="text" class="form-control" name="noreg" id="exampleInputNoRegs1" placeholder="No. registrasi." value="<?php echo $r['id_peserta']; ?>" disabled>
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
										<label for="exampleInputGateway1">Gateway (Bank Tujuan)</label>
										<input type="text" class="form-control" name="gateway" id="exampleInputGateway1" placeholder="Bank tujuan." value="<?php echo $r['nm_bank']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputBankTrf1">Bank Transfer</label>
										<input type="text" class="form-control" name="bank_trf" id="exampleInputBankTrf1" placeholder="Bank transfer." value="<?php echo $r['bank_transfer']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputJmlTrf1">Jumlah Transfer</label>
										<input type="text" class="form-control" name="jml_trf" id="exampleInputJmlTrf1" placeholder="Jumlah transfer." value="<?php echo $r['jml_transfer']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputPemilikRek1">A/n Pemilik Rekening</label>
										<input type="text" class="form-control" name="pemilik_rek" id="exampleInputPemilikRek1" placeholder="Pemilik rekening." value="<?php echo $r['nm_pemilik_rek']; ?>" disabled>
									</div>
								</p>
					
								<p>
									<div class="box-body pad">
										<label>Informasi Tambahan</label>
										<textarea class="textarea" name="info" placeholder="Informasi tambahan." disabled style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $r['informasi_tambahan']; ?></textarea>
									</div>
								</p>
					
								<p>
									<div class="form-group">
										<label for="exampleInputImgStruk1">Bukti Transfer Pembayaran</label><br>
										<?php echo "<img src='../img_payment/$r[img_bayar]' oncontextmenu='return false;'>"; ?>
										<!-- script (oncontextmenu='return false;'): mencegah gambar tidak dapat di klik kanan. -->
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