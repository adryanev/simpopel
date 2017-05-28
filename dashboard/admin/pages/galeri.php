<?php
require '../sections/header.php';
require '../sections/sidebar.php';
require '../sections/top_navigation.php';
require '../../libs/database.php';
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Siswa MA Hasanah<small> Siswa dan Point </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">
                    
                    <?php
                    $sql = "SELECT idSiswa, nama, namaPelanggaran, foto FROM pelanggaran_all_time";
                    $result = mysqli_query($dbConnection, $sql);


                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          echo "<div class=\"col-md-55\">";
                          echo "<div class=\"thumbnail\">";
                          echo "<div class=\"image view view-first\">";
                          echo"<img style=\"width: 100%; display: block;\" src=\"../../../images/".$row['foto']."\" alt=\"image\" />";
                          echo "<div class=\"mask\">";
                          echo "<p>".$row['namaPelanggaran']."</p>";
                         
                          echo "</div>";
                          echo "</div>";
                          echo "<div class=\"caption\">";
                          echo "<p><a href=\"profile.php?id=".$row['idSiswa']."\"> <strong>".$row['nama']."</strong></a></p>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                        }
                      } else {
                        echo "0 results";
                      }

                      mysqli_close($dbConnection);
                    ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
include '../sections/footer.php';
?>