		<?php
			include "../conf/koneksi.php";
			include "../lib/inc.session.php";
			
			$ed = mysqli_query($connect, "SELECT * FROM bank WHERE token_bank = '$_GET[tid]'");
			while ($r = mysqli_fetch_array($ed)){
		?>
		
		<!-- Main content -->
        <section class="content">
		  <div class="example-modal">
            <div class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location='?page=vwBn'"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Data Bank</h4>
                  </div>
				  <form role="form" name="form1" action="?page=upBn" method="post">
				  <input type='hidden' name='tid' value="<?php echo $r['token_bank']; ?>" >
                  <div class="modal-body">
                    <p>
						<div class="form-group">
                            <label for="exampleInputBank1">Nama Bank</label>
                            <input type="text" class="form-control" name="nama_bank" id="exampleInputBank1" placeholder="Masukkan nama bank" value="<?php echo $r['nm_bank']; ?>" required="required">
                        </div>
					</p>
					
					<p>
						<div class="form-group">
                            <label for="exampleInputNorek1">No. Rekening</label>
                            <input type="text" class="form-control" name="norek" id="exampleInputNorek1" placeholder="Masukkan no rekening" value="<?php echo $r['no_rek']; ?>" required="required">
                        </div>
					</p>
					
					<p>
						<div class="form-group">
                            <label for="exampleInputPemilikrek1">Pemilik Rekening</label>
                            <input type="text" class="form-control" name="nm_pemilik" id="exampleInputPemilikrek1" placeholder="Masukkan nama pemilik rekening" value="<?php echo $r['pemilik_rek']; ?>" required="required">
                        </div>
					</p>
					
					<p>
						<div class="form-group">
                            <label for="exampleInputKantorCab1">Kantor Cabang</label>
                            <input type="text" class="form-control" name="kantor_cab" id="exampleInputKantorCab1" placeholder="Masukkan kantor cabang bank" value="<?php echo $r['kantor_cabang']; ?>" required="required">
                        </div>
					</p>
					
					<p>
						<?php
							if ($r['aktif_bank']=='Y'){
						?>
										
						<div class="form-group">
							<label>Aktifkan Bank</label>
						</div>
										
						<div class="form-group">
							<input type="radio" name="aktif" id="optionsRadios1" value="Y" checked> Ya
							<input type="radio" name="aktif" id="optionsRadios1" value="N" > Tidak
						</div>
										
						<?php } else { ?>
										
						<div class="form-group">
							<label>Aktifkan Bank</label>
						</div>
										
						<div class="form-group">
							<input type="radio" name="aktif" id="optionsRadios1" value="Y" > Ya
							<input type="radio" name="aktif" id="optionsRadios1" value="N" checked> Tidak
						</div>
										
						<?php } ?>
					</p>
					
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                  </div>
				  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
		</section>
		
		<?php } ?>