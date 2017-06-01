<?php
	require "../sections/header.php";
	require "../sections/sidebar.php";
	require "../sections/top_navigation.php";
	require "../../libs/database.php";

?>
<!-- page content -->

         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Laporan Pelanggaran <small></small></h3>
              </div>
              <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Berdasarkan Periode</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  
                    <canvas id="grafikgaris"></canvas>
					<script type="text/javascript">
                    var ctx = document.getElementById("grafikgaris");
			  var lineChart = new Chart(ctx, {
				type: 'line',
				data: {
				  labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","Oktober","November","Desember"],
				  datasets: [{
					label: "Pelanggar Siswa",
					backgroundColor: "rgba(38, 185, 154, 0.31)",
					borderColor: "rgba(38, 185, 154, 0.7)",
					pointBorderColor: "rgba(38, 185, 154, 0.7)",
					pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointBorderWidth: 1,
					data: [31, 74, 6, 39, 20, 85, 82, 23, 66, 9, 99, 4]
				  }, {
					label: "Pelanggar Siswi",
					backgroundColor: "rgba(3, 88, 106, 0.3)",
					borderColor: "rgba(3, 88, 106, 0.70)",
					pointBorderColor: "rgba(3, 88, 106, 0.70)",
					pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
					pointHoverBackgroundColor: "#fff",
					pointHoverBorderColor: "rgba(151,187,205,1)",
					pointBorderWidth: 1,
					data: [82, 23, 66, 9, 99, 4, 31, 74, 6, 39, 20, 85]
				  }]
				}
			  });
                  </script>  

                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Berdasarkan Tahun</h2>
                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="grafikbatang"></canvas>
                    
                   <script>
            var ctx = document.getElementById("grafikbatang");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["2012", "2013", "2014", "2015", "2016", "2017"],
                    datasets: [{
                            label: 'Tahun',
                            data: [101, 108, 120, 117, 117, 113],
                            backgroundColor: "#03586A"
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                                }
                        }]
                    }
                }
            });
        </script>
        			</div>
                </div>
              </div>


            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Berdasarkan Jenis Kelamin</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="grafikpie"></canvas>
                    <script>
            var ctx = document.getElementById("grafikpie");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Siswa", "Siswi"],
                    datasets: [{
                            label: 'Pelanggar Siswa',
                            data: [70,30],
                            backgroundColor: ["#9B59B6","#3498DB"]
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                                }
                        }]
                    }
                }
            });
        </script>

                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Berdasarkan Pelanggaran</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="grafikdonat"></canvas>
                    <script>
            var ctx = document.getElementById("grafikdonat");
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["Pelanggaran berat", "Pelanggaran Sedang", "Pelanggaran Ringan"],
                    datasets: [{
                            label: 'Pelanggar',
                            data: [10,50,40],
                            backgroundColor: ["#9B59B6","#3498DB","#26B99A"]
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                                }
                        }]
                    }
                }
            });
        </script>
                  </div>
                </div>
              </div>
            </div>

                <div class="col-md-4">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                      </div>
                    
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php
include "../sections/footer.php";
?>