<?php
	require "../sections/header.php";
	require "../../libs/database.php";

?>
<!-- page content -->

         <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
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
                        $(function () {
                            $.ajax({
                                type: "GET",
                                url:"<?php echo $url; ?>queries/get_pelanggaran_by_periode.php",
                                success: function(data){
                                    console.log(data);

                                    var hasilLaki = [];
                                    hasilLaki.push(data[0].totalJanuari);
                                    hasilLaki.push(data[0].totalFebruari);
                                    hasilLaki.push(data[0].totalMaret);
                                    hasilLaki.push(data[0].totalApril);
                                    hasilLaki.push(data[0].totalMei);
                                    hasilLaki.push(data[0].totalJuni);
                                    hasilLaki.push(data[0].totalJuli);
                                    hasilLaki.push(data[0].totalAgustus);
                                    hasilLaki.push(data[0].totalSeptember);
                                    hasilLaki.push(data[0].totalOktober);
                                    hasilLaki.push(data[0].totalNovember);
                                    hasilLaki.push(data[0].totalDesember);
                                    console.log(hasilLaki);

                                    var hasilPR = [];
                                    hasilPR.push(data[1].totalJanuari);
                                    hasilPR.push(data[1].totalFebruari);
                                    hasilPR.push(data[1].totalMaret);
                                    hasilPR.push(data[1].totalApril);
                                    hasilPR.push(data[1].totalMei);
                                    hasilPR.push(data[1].totalJuni);
                                    hasilPR.push(data[1].totalJuli);
                                    hasilPR.push(data[1].totalAgustus);
                                    hasilPR.push(data[1].totalSeptember);
                                    hasilPR.push(data[1].totalOktober);
                                    hasilPR.push(data[1].totalNovember);
                                    hasilPR.push(data[1].totalDesember);
                                    console.log(hasilPR);

                                    var chartData = {
                                        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni","Juli","Agustus","Oktober","November","Desember"],
                                        datasets: [
                                            {
                                                label: "Pelanggar Siswa",
                                                backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                borderColor: "rgba(38, 185, 154, 0.7)",
                                                pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                pointHoverBackgroundColor: "#fff",
                                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                                pointBorderWidth: 1,
                                                data: hasilLaki
                                            },
                                            {
                                                label: "Pelanggar Siswi",
                                                backgroundColor: "rgba(3, 88, 106, 0.3)",
                                                borderColor: "rgba(3, 88, 106, 0.70)",
                                                pointBorderColor: "rgba(3, 88, 106, 0.70)",
                                                pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                                                pointHoverBackgroundColor: "#fff",
                                                pointHoverBorderColor: "rgba(151,187,205,1)",
                                                pointBorderWidth: 1,
                                                data: hasilPR
                                            }
                                        ]
                                    };
                                    console.log(chartData);
                                    var ctx = document.getElementById("grafikgaris");
                                    var lineGraph = new Chart(ctx, {
                                        type: 'line',
                                        data: chartData,
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
                                },
                                error: function (data) {
                                    console.log(data);
                                }
                            });
                            
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
                       $(function () {
                           $.ajax({
                               type: "GET",
                               url: "<?php echo $url; ?>queries/get_pelanggaran_by_year.php",
                               success: function (data) {
                                    console.log(data);
                                    var tahun = [];
                                        tahun.push(data.total2016);
                                        tahun.push(data.total2017);
                                        tahun.push(data.total2018);
                                        tahun.push(data.total2019);
                                        tahun.push(data.total2020);

                                   var ctx = document.getElementById("grafikbatang");
                                   var myChart = new Chart(ctx, {
                                       type: 'bar',
                                       data: {
                                           labels: ["2016", "2017", "2018", "2019", "2020"],
                                           datasets: [{
                                               label: 'Banyak Pelanggaran',
                                               data: tahun,
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

                               },
                               error: function (data) {
                                   console.log("Error mengambil data tahun");
                               }
                           })

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
                        $(function(){
                            $.ajax({
                                type: "GET",
                                url: "<?php echo $url; ?>queries/get_pelanggaran_by_gender.php",
                                success: function (data) {
                                    console.log(data);
                                    var gender = [];
                                    gender.push(data.total);
                                    gender.push(data.totalLaki);
                                    gender.push(data.totalPr);
                                    console.log(gender);

                                    var ctx = document.getElementById("grafikpie");
                                    var myChart = new Chart(ctx, {
                                        type: 'pie',
                                        data: {
                                            labels: ["Siswa", "Siswi"],
                                            datasets: [{
                                                label: 'Pelanggar Siswa',
                                                data: [gender[1],gender[2]],
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

                                },
                                error: function (data) {
                                    console.log("Error mengambil data gender");
                                }
                            })
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
                        $(function(){
                            $.ajax({
                                type: "GET",
                                url: "<?php echo $url; ?>queries/get_pelanggaran_by_jenis.php",
                                success: function (data) {
                                    console.log(data);
                                    var jenis = [];
                                    jenis.push(data.totalRingan);
                                    jenis.push(data.totalSedang);
                                    jenis.push(data.totalBerat);
                                    console.log(jenis);

                                    var ctx = document.getElementById("grafikdonat");
                                    var myChart = new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ["Pelanggaran Ringan", "Pelanggaran Sedang", "Pelanggaran berat"],
                                            datasets: [{
                                                label: 'Pelanggar',
                                                data: [jenis[0],jenis[1],jenis[2]],
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
                                },
                                error: function (data) {
                                    console.log("Error mengambil data gender");
                                }
                            })
                        });

        </script>
                  </div>
                </div>
                  <div class="clearfix"></div>
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