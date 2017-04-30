<?php
require '../sections/header.php';
require '../sections/sidebar.php';
require '../sections/top_navigation.php';
require '../../libs/database.php';
?>


        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Total Point <small> Pelanggaran Siswa </small></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-hover table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                        <thead>
                        <tr>
                            <th>No</th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Kelas</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php
                      $sql = "SELECT idSiswa, nis, nama, kelas FROM `tabelsiswa` ORDER BY idSiswa ASC";
                      $result = mysqli_query($dbConnection, $sql);

                      if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {


                          echo "<tr> ";
                            echo "<td><a href=\"profile.php?id=" .$row['idSiswa'] ." \">".$row["idSiswa"]."</a></td>";
                          echo "<td><a href=\"profile.php?id=" .$row['idSiswa'] ." \">".$row["nis"]."</a></td>";
                            echo "";
                          echo "<td><a href=\"profile.php?id=" .$row['idSiswa'] ." \"> ".$row["nama"]." </a></td>";
                          echo "<td align=\"center\"><a href=\"profile.php?id=" .$row['idSiswa'] ." \">".$row["kelas"]."</a></td>";
                          echo "<td align=\"center\">";
                          echo "<button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus\"></i></button>";
                          echo "<button type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-pencil\"></i></button>";
                          echo "</tr>";


                        }
                      } else {
                        echo "0 results";
                      }

                      mysqli_close($dbConnection);
                       ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php
include '../sections/footer.php';
?>