<html>
	<head>
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../cpanel/pages/grafik/js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Peserta Seminar/Workshop',
			x: -20
         },
		 subtitle: {
                text: 'Berdasarkan Pendidikan Peserta',
                x: -20
            },
         xAxis: {
            categories: ['Pendidikan']
         },
         yAxis: {
            title: {
               text: 'Total Peserta Seminar/Workshop'
            }
         },
              series:             
            [
            <?php 
        	include "../conf/koneksi.php";
						
            $sql   = "SELECT *, pendidikan.pendidikan FROM peserta, pendidikan 
			          WHERE peserta.id_pendidikan = pendidikan.id_pendidikan
					  GROUP BY pendidikan.pendidikan";
            $query = mysqli_query($connect, $sql);
            while( $ret = mysqli_fetch_array( $query ) ){
            	$edu = $ret['pendidikan'];                     
                 $sql_jumlah   = "SELECT *, pendidikan.pendidikan, 
		                          count(pendidikan.pendidikan) as jumlah
		                          FROM peserta, pendidikan 
								  WHERE peserta.id_pendidikan = pendidikan.id_pendidikan 
								  AND pendidikan.pendidikan = '$edu' 
								  GROUP BY pendidikan.pendidikan";        
                 $query_jumlah = mysqli_query($connect, $sql_jumlah);
                 while( $data = mysqli_fetch_array($query_jumlah) ){
                    $jumlah = $data['jumlah'];                
                  }             
                  ?>
                  {
                      name: '<?php echo $edu; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>				  
            ]
      });
   });	
</script>
	</head>
	<body>
	 <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
				<!-- AREA CHART -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Grafik Peserta Seminar/Workshop <small>Berdasarkan Pendidikan</small></h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
					</div>
					<div class="box-body">
						<div class="chart">
							<div id='container' style="width: 500px; height: 300px; margin: 0 auto;"></div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</section>
	</body>
</html>