<script type="text/javascript">
	function validasi(){
		/*--- validasi combo pilih bank tujuan ---*/
		var bank = (form1.bank_tujuan.value);
		if(bank == 0){
			alert("Bank tujuan pembayaran belum dipilih.");
			document.form1.bank_tujuan.focus();
			return false;
		}
	
		/*--- validasi file bukti transfer ---*/
		var img = (form1.fupload.value);
		if(img == ""){
			alert("File bukti transfer belum dipilih.");
			document.form1.fupload.focus();
			return false;
		}
	}
</script>

<?php
	include "conf/koneksi.php";
	include "lib/inc.session.pst.php";

	$sql = mysqli_query($connect, "select * from peserta, seminar
	                    where peserta.id_seminar = seminar.id_seminar
						and peserta.email_peserta = '$_SESSION[email_pst]'");
	$r = mysqli_fetch_array($sql);
?>

<body>
<form role="form1" name="form1" method="post" action="act-confirm-payment.html" enctype="multipart/form-data" onSubmit="return validasi()">
	
	<p>
		<div class="form-group">
        	<label for="noReg">No. Registrasi</label>
            <input type="text" class="form-control" name="no_reg" id="noReg" placeholder="Nomor registrasi." value="<?php echo $r['id_peserta']; ?>" readonly required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="nama">Nama Peserta</label>
            <input type="text" class="form-control" name="nm_peserta" id="nama" placeholder="Nama peserta." value="<?php echo $r['nama_peserta']; ?>" readonly required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="nmSmnr">Nama Seminar</label>
			<input type='hidden' name='id_smnr' value="<?php echo $r['id_seminar']; ?>" >
            <input type="text" class="form-control" name="nm_seminar" id="nmSmnr" placeholder="Nama seminar." value="<?php echo $r['nm_seminar']; ?>" readonly required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
			<label>Bank Tujuan</label>
			<select class="form-control" name="bank_tujuan">
				<?php 
					include "conf/koneksi.php";
						
					echo"
						<option value=0 selected>- Pilih Bank Tujuan -</option>";
  						$tampil=mysqli_query($connect, "SELECT * FROM bank WHERE aktif_bank = 'Y' ORDER BY id_bank");
   						while($r=mysqli_fetch_array($tampil)){
							echo "<option value=$r[id_bank]>$r[nm_bank]</option>"; 
						}
				?>
  			</select>
		</div>
	</p>
	<p>
		<div class="form-group">
        	<label for="bnTrf">Bank Transfer</label>
            <input type="text" class="form-control" name="bank_trf" id="bnTrf" placeholder="Ketikkan bank transfer."  required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="jmlTrf">Jumlah Transfer</label>
            <input type="text" class="form-control" name="jml_trf" id="jmlTrf" placeholder="Ketikkan jumlah transfer."  required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="pemilikRek">A/n Pemilik Rekening</label>
            <input type="text" class="form-control" name="pemilik_rek" id="pemilikRek" placeholder="Ketikkan nama pemilik rekening."  required="required">
        </div>
	</p>
	<p>
		<div class="box-body pad">
			<label>Informasi Tambahan</label>
			<textarea class="textarea" name="info_tambahan" placeholder="Ketikkan informasi tambahan." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
		</div>
	</p>
	<p>
		<div class="form-group">
			<label for="exampleInputFile">Upload Bukti Transfer Pembayaran</label>
			<input type="file" id="exampleInputFile" name="fupload">
			<p class="help-block">File bukti transfer harus bertipe *.jpeg, *.jpg, atau *.png</p>
		</div>
	</p>
	<p align="right">
		<button type="submit" class="btn btn-sm btn-primary" name="submit">Submit</button>
		<button type="button" class="btn btn-sm btn-default" name="reset" onclick="self.history.back()">Cancel</button>
	</p>
</form>
</body>