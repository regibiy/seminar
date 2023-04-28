<script type="text/javascript">
	function validasi(){
		/*--- validasi combo pilih seminar ---*/
		var smnr = (form1.seminar.value);
		if(smnr == 0){
			alert("Silahkan pilih seminar yang ingin diikuti.");
			document.form1.seminar.focus();
			return false;
		}
	
		/*--- validasi combo jenis identitas ---*/
		var id = (form1.jns_id.value);
		if(id == 0){
			alert("Jenis identitas belum dipilih.");
			document.form1.jns_id.focus();
			return false;
		}
			
		/*--- validasi radio button jenis kelamin ---*/
		var laki = form1.kelamin[0].checked;
		var prp = form1.kelamin[1].checked;
			
		if(laki==false && prp==false){
			alert("Silahkan pilih jenis kelamin.");
			return false;
		}
		
		/*--- validasi combo pendidikan ---*/
		var edu = (form1.pendidikan.value);
		if(edu == 0){
			alert("Pendidikan belum dipilih.");
			document.form1.pendidikan.focus();
			return false;
		}
		
		/*--- validasi combo range usia ---*/
		var age = (form1.usia.value);
		if(age == 0){
			alert("Range usia belum dipilih.");
			document.form1.usia.focus();
			return false;
		}
	}
</script>

<?php
	if(!isset($_SESSION['email_pst'])){
?>

<body>
<form role="form1" name="form1" method="post" action="aksi-reg.html" enctype="multipart/form-data" onSubmit="return validasi()">
	<p>
		<div class="form-group">
			<label>Pilih Seminar</label>
			<select class="form-control" name="seminar">
				<?php 
					include "conf/koneksi.php";
						
					echo"
						<option value=0 selected>- Pilih Seminar -</option>";
  						$tampil=mysqli_query($connect, "SELECT * FROM seminar WHERE aktif_seminar = 'Y' ORDER BY id_seminar");
   						while($r=mysqli_fetch_array($tampil)){
							echo "<option value=$r[id_seminar]>$r[nm_seminar]</option>"; 
						}
				?>
  			</select>
		</div>
	</p>
	<p>
		<div class="form-group">
			<label>Jenis Identitas</label>
			<select class="form-control" name="jns_id">
				<?php 
					include "conf/koneksi.php";
						
					echo"
						<option value=0 selected>- Pilih Jenis Identitas -</option>";
  						$tampil=mysqli_query($connect, "SELECT * FROM kartu_identitas WHERE aktif_kartuid = 'Y' ORDER BY id_kartu");
   						while($r=mysqli_fetch_array($tampil)){
							echo "<option value=$r[id_kartu]>$r[jns_kartuid]</option>"; 
						}
				?>
  			</select>
		</div>
	</p>
	<p>
		<div class="form-group">
        	<label for="noId">Nomor Identitas</label>
            <input type="text" class="form-control" name="no_id" id="noId" placeholder="Ketikkan nomor identitas."  required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="nama">Nama Peserta</label>
            <input type="text" class="form-control" name="nm_peserta" id="nama" placeholder="Ketikkan nama lengkap peserta."  required="required">
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
		<div class="form-group">
			<label>Pendidikan</label>
			<select class="form-control" name="pendidikan">
				<?php 
					include "conf/koneksi.php";
						
					echo"
						<option value=0 selected>- Pilih Pendidikan -</option>";
  						$tampil=mysqli_query($connect, "SELECT * FROM pendidikan WHERE aktif_pendidikan = 'Y' ORDER BY id_pendidikan");
   						while($r=mysqli_fetch_array($tampil)){
							echo "<option value=$r[id_pendidikan]>$r[pendidikan]</option>"; 
						}
				?>
  			</select>
		</div>
	</p>
	<p>
		<div class="form-group">
			<label>Pilih Range Usia</label>
			<select class="form-control" name="usia">
				<?php 
					echo"
						<option value=0 selected>- Pilih Range Usia -</option>
						<option value='<17'><17 Tahun</option>
						<option value='17-25'>17-25 Tahun</option>
						<option value='26-35'>26-35 Tahun</option>
						<option value='36-45'>36-45 Tahun</option>
						<option value='>45'>>45 Tahun</option>";
				?>
  			</select>
		</div>
	</p>
	<p>
		<div class="box-body pad">
			<label>Alamat</label>
			<textarea class="textarea" name="alamat" placeholder="Ketikkan alamat lengkap." required="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
		</div>
	</p>
	<p>
		<div class="form-group">
        	<label for="kotaKab">Kota/Kabupaten</label>
            <input type="text" class="form-control" name="kota_kab" id="kotaKab" placeholder="Ketikkan kota / kabupaten."  required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="kodePos">Kode Pos</label>
            <input type="text" class="form-control" name="kodepos" id="kodePos" placeholder="Ketikkan kode pos."  required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="noHp">No. HP</label>
            <input type="text" class="form-control" name="no_hp" id="noHp" placeholder="Ketikkan nomor HP."  required="required">
        </div>
	</p>
	<p>
		<div class="form-group">
        	<label for="email1">Email</label>
            <input type="text" class="form-control" name="email" id="email1" placeholder="Ketikkan email."  required="required">
        </div>
	</p>
	<p align="right">
		<button type="submit" class="btn btn-sm btn-primary" name="submit">Submit</button>
		<button type="button" class="btn btn-sm btn-default" name="reset" onclick="self.history.back()">Cancel</button>
	</p>
</form>
</body>

<?php } else { 
	echo "<script>alert('Anda telah terdaftar sebagai peserta seminar/workshop.');</script>";
	echo "<meta http-equiv='refresh' content='0;url=view-reg.html'>";
}
?>