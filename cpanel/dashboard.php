		<?php
    include "../conf/koneksi.php";
    include "../lib/inc.session.php";

    /*-------- menghitung total jumlah peserta -----------*/
    $sql1 = mysqli_query($connect, "select count(peserta.id_peserta) as jml_peserta from peserta");
    $r = mysqli_fetch_array($sql1);
    $jml = $r['jml_peserta'];

    /*-------- menghitung total konfirmasi pembayaran baru -----------*/
    $sql2 = mysqli_query($connect, "select count(pembayaran.status_bayar) as jml_konfirmasi_baru from pembayaran where status_bayar = 'Baru' ");
    $s = mysqli_fetch_array($sql2);
    $jml_baru = $s['jml_konfirmasi_baru'];

    /*-------- menghitung total konfirmasi pembayaran menunggu -----------*/
    $sql3 = mysqli_query($connect, "select count(pembayaran.status_bayar) as jml_konfirmasi_wait from pembayaran where status_bayar = 'Menunggu' ");
    $t = mysqli_fetch_array($sql3);
    $jml_menunggu = $t['jml_konfirmasi_wait'];

    /*-------- menghitung total konfirmasi pembayaran lunas -----------*/
    $sql4 = mysqli_query($connect, "select count(pembayaran.status_bayar) as jml_konfirmasi_lunas from pembayaran where status_bayar = 'Lunas' ");
    $u = mysqli_fetch_array($sql4);
    $jml_lunas = $u['jml_konfirmasi_lunas'];

    /*-------- menghitung total konfirmasi pembayaran batal -----------*/
    $sql5 = mysqli_query($connect, "select count(pembayaran.status_bayar) as jml_konfirmasi_batal from pembayaran where status_bayar = 'Batal' ");
    $v = mysqli_fetch_array($sql5);
    $jml_batal = $v['jml_konfirmasi_batal'];

    /*-------- menghitung total jumlah pengguna aktif -----------*/
    $sql6 = mysqli_query($connect, "select count(pengguna.usernm) as jml_pengguna from pengguna where blokir = 'N' ");
    $w = mysqli_fetch_array($sql6);
    $jml_user = $w['jml_pengguna'];
    ?>

		<!-- Main content -->
		<section class="content">
		  <!-- Small boxes (Stat box) -->
		  <div class="row">

		    <div class="col-xs-12">
		      <div class="box box-default">
		        <div class="box-header with-border">
		          <i class="fa fa-bullhorn"></i>
		          <h3 class="box-title">Kolom Informasi</h3>
		        </div><!-- /.box-header -->
		        <div class="box-body">
		          <div class="callout callout-info">
		            <h4>Perhatian!</h4>
		            <p align="justify">Selamat datang di <b>halaman administrator</b>. Mohon gunakan fitur yang terdapat dihalaman ini dengan sebaik-baiknya.</p>
		          </div>
		        </div>
		      </div>
		    </div>

		    <div class="col-lg-3 col-xs-6">
		      <!-- small box -->
		      <div class="small-box bg-aqua">
		        <div class="inner">
		          <h3><?php echo $jml_baru; ?></h3>
		          <p>Jumlah Konfirmasi Pembayaran Baru</p>
		        </div>
		        <div class="icon">
		          <i class="ion ion-stats-bars"></i>
		        </div>
		        <a href="?page=vwPay" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		      </div>
		    </div><!-- ./col -->

		    <div class="col-lg-3 col-xs-6">
		      <!-- small box -->
		      <div class="small-box bg-green">
		        <div class="inner">
		          <h3><?php echo $jml_menunggu; ?></h3>
		          <p>Jumlah Konfirmasi Pembayaran Menunggu</p>
		        </div>
		        <div class="icon">
		          <i class="ion ion-stats-bars"></i>
		        </div>
		        <a href="?page=vwPay" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		      </div>
		    </div><!-- ./col -->

		    <div class="col-lg-3 col-xs-6">
		      <!-- small box -->
		      <div class="small-box bg-yellow">
		        <div class="inner">
		          <h3><?php echo $jml_lunas; ?></h3>
		          <p>Jumlah Konfirmasi Pembayaran Lunas</p>
		        </div>
		        <div class="icon">
		          <i class="ion ion-stats-bars"></i>
		        </div>
		        <a href="?page=vwPay" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		      </div>
		    </div><!-- ./col -->

		    <div class="col-lg-3 col-xs-6">
		      <!-- small box -->
		      <div class="small-box bg-red">
		        <div class="inner">
		          <h3><?php echo $jml_batal; ?></h3>
		          <p>Jumlah Konfirmasi Pembayaran Batal</p>
		        </div>
		        <div class="icon">
		          <i class="ion ion-stats-bars"></i>
		        </div>
		        <a href="?page=vwPay" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		      </div>
		    </div><!-- ./col -->

		    <div class="col-lg-3 col-xs-6">
		      <!-- small box -->
		      <div class="small-box bg-aqua">
		        <div class="inner">
		          <h3><?php echo $jml; ?></h3>
		          <p>Jumlah Peserta Seminar/Workshop</p>
		        </div>
		        <div class="icon">
		          <i class="ion ion-person-add"></i>
		        </div>
		        <a href="?page=vwPst" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		      </div>
		    </div><!-- ./col -->

		    <div class="col-lg-3 col-xs-6">
		      <!-- small box -->
		      <div class="small-box bg-green">
		        <div class="inner">
		          <h3><?php echo $jml_user; ?></h3>
		          <p>Jumlah Pengguna Sistem (Aktif)</p>
		        </div>
		        <div class="icon">
		          <i class="ion ion-person-add"></i>
		        </div>
		        <a href="?page=vwUs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		      </div>
		    </div><!-- ./col -->

		  </div><!-- /.row -->
		</section>