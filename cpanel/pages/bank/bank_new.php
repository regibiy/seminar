		<!-- Main content -->
        <section class="content">
		  <div class="example-modal">
            <div class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location='?page=vwBn'"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Bank</h4>
                  </div>
				  <form role="form" name="form1" action="?page=svBn" method="post">
                  <div class="modal-body">
                    <p>
						<div class="form-group">
                            <label for="exampleInputBank1">Nama Bank</label>
                            <input type="text" class="form-control" name="nama_bank" id="exampleInputBank1" placeholder="Masukkan nama bank" required="required">
                        </div>
					</p>
					
					<p>
						<div class="form-group">
                            <label for="exampleInputNorek1">No. Rekening</label>
                            <input type="text" class="form-control" name="norek" id="exampleInputNorek1" placeholder="Masukkan no rekening" required="required">
                        </div>
					</p>
					
					<p>
						<div class="form-group">
                            <label for="exampleInputPemilikrek1">Pemilik Rekening</label>
                            <input type="text" class="form-control" name="nm_pemilik" id="exampleInputPemilikrek1" placeholder="Masukkan nama pemilik rekening" required="required">
                        </div>
					</p>
					
					<p>
						<div class="form-group">
                            <label for="exampleInputKantorCab1">Kantor Cabang</label>
                            <input type="text" class="form-control" name="kantor_cab" id="exampleInputKantorCab1" placeholder="Masukkan kantor cabang bank" required="required">
                        </div>
					</p>
					
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="self.history.back()">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="submit">Save</button>
                  </div>
				  </form>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
		</section>