<?php
	session_start();
	include "../lib/inc.session.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>S.W.I.T. MS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- modal style -->
	<style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent !important;
      }
    </style>
	<!-- end of modal style -->
	
	<!-- date picker -->
	<link rel="stylesheet" type="text/css" href="jquery.datetimepicker.css"/>
	<style type="text/css">

		.custom-date-style {
			background-color: red !important;
		}

		.input{	
		}
		.input-wide{
			width: 500px;
		}

	</style>
	<!-- end of date picker -->
	
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">MS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">S.W.I.T.<b>MS</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
				<?php
					include "../conf/koneksi.php";
					
					$sql = mysqli_query($connect, "select * from pengguna where usernm = '$_SESSION[username]'");
					$r = mysqli_fetch_array($sql);
				?>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $r['nm_lengkap']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
				  <li class="user-header">
                    <img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $r['nm_lengkap']; ?>
                      <small><?php echo $r['email_pengguna']; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
				  <!-- Menu Footer-->
                  <li class="user-footer">
					<div class="pull-right">
                      <a href="?page=sign-out" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="img_user/small_<?php echo $r['img_pengguna']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $r['nm_lengkap']; ?></p>
              <i class="fa fa-circle text-success"></i> <?php echo $r['status_pengguna']; ?>
            </div>
          </div>
		  
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="?page=dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
			
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>Konten</span>
				<i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=id"><i class="fa fa-circle-o"></i> Identitas Website</a></li>
                <li><a href="?page=pf"><i class="fa fa-circle-o"></i> Profil Website</a></li>
                <li><a href="?page=crReg"><i class="fa fa-circle-o"></i> Cara Pendaftaran</a></li>
              </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Manajemen Peserta</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=vwPst"><i class="fa fa-circle-o"></i> Peserta Seminar/Workshop</a></li>
			  </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Pembayaran</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=vwPay"><i class="fa fa-circle-o"></i> Konfirmasi Bayar</a></li>
			  </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i> <span>Grafik</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=grafik-sex"><i class="fa fa-circle-o"></i> Peserta - Jenis Kelamin</a></li>
				<li><a href="?page=grafik-edu"><i class="fa fa-circle-o"></i> Peserta - Pendidikan</a></li>
				<li><a href="?page=grafik-age"><i class="fa fa-circle-o"></i> Peserta - Range Usia</a></li>
			  </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span> Pengaturan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="?page=vwCard"><i class="fa fa-circle-o"></i> Kartu Identitas</a></li>
				<li><a href="?page=vwSmnr"><i class="fa fa-circle-o"></i> Seminar</a></li>
				<li><a href="?page=vwEdu"><i class="fa fa-circle-o"></i> Pendidikan</a></li>
				
				<!-- pengguna hanya dapat di akses oleh pengguna level Admin -->
				<?php 
					if($_SESSION['username'] AND $r['status_pengguna']=='Admin'){
				?>
                <li><a href="?page=vwUs"><i class="fa fa-circle-o"></i> Pengguna</a></li>
				<?php } ?>
				
				<li><a href="?page=vwBn"><i class="fa fa-circle-o"></i> Bank</a></li>
			  </ul>
            </li>
			
			<li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i> <span>Utilities</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
			  
				<!-- backup database hanya dapat di akses oleh pengguna level Admin -->
				<?php 
					if($_SESSION['username'] AND $r['status_pengguna']=='Admin'){
				?>
                <li><a href="?page=backup"><i class="fa fa-circle-o"></i> Backup Database</a></li>
				<?php } ?>
				
				<li><a href="?page=userguide"><i class="fa fa-circle-o"></i> Petunjuk Penggunaan Sistem</a></li>
				
			  </ul>
            </li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
         
			<?php include "../cpanel/akses_file.php"; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b>1.8.2
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="#">Kutuonline</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
		  <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
      
			<!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
          </div><!-- /.tab-pane -->
		  
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
