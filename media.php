<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Kutuonline | Seminar dan Workshop</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
	
	<!-- Custom styles for navbar -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
  </head>

  <body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="beranda">Kutuonline</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="beranda">Beranda</a></li>
            <li><a href="tentang-kami.html">Tentang</a></li>
            <li><a href="kontak.html">Kontak</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lainnya <span class="caret"></span></a>
              <ul class="dropdown-menu">
				<li><a href="cara-pendaftaran.html">Cara Pendaftaran</a></li>
				<li role="separator" class="divider"></li>
				<!-- menu ini hanya dapat di akses oleh peserta yang terdaftar -->
				<?php 
					if(isset($_SESSION['email_pst'])){
				?>
				<li><a href="view-reg.html">Data Registrasi</a></li>
                <li><a href="confirm-payment.html">Konfirmasi Bayar</a></li>
				<?php } ?>
              </ul>
            </li>
          </ul>
		  <ul class="nav navbar-nav navbar-right">
			
			<?php
				if(isset($_SESSION['email_pst'])) {
					echo "<li><a href='sign-out.html'>Sign out</a></li>";
				} else {
					echo "<li><a href='sign-in.html'>Sign in</a></li>";
				}
			?>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<!-- End of Fixed navbar -->

    <div class="container">
	
	  <?php include "open_file.php"; ?>

      <footer class="footer">
        <p>Copyright &copy; 2015 kutuonline. All rights reserved.</p>
      </footer>

    </div> <!-- /container -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
	
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
