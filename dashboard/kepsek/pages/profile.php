<?php
require '../sections/header.php';
require '../sections/sidebar.php';
require '../sections/top_navigation.php';
require '../../libs/database.php';
?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Profil <small>siswa</small></h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <?php
                        $id = $_GET['id'];
                        $sql = "SELECT idSiswa, nis, nama, tempatLahir, date_format(tanggalLahir, '%d/%m/%Y') as tanggalLahir, jenisKelamin, namaOrtu,
 alamat, agama, usia, nisn, kelas, totalPoin, pasFoto FROM tabelsiswa WHERE idSiswa = $id";
                        $result = mysqli_query($dbConnection, $sql);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->

                            <?php

                                echo "<img class=\"img-responsive avatar-view\" src=\"../../../images/".$row['pasFoto']."\" alt=\"Avatar\" title=\"Change the avatar\">";
                            ?>

                          </div>
                      </div>

                      <h3><?php echo $row['nama']?></h3>

                      <ul class="list-unstyled user_data">
                      <table class="table table-responsive">
                        <tbody>
                          <tr>
                            <th scope="row">NIS</th>
                            <td><?php echo $row['nis']?></td>
                          </tr>
                          <tr>
                            <th scope="row">Kelas</th>
                            <td><?php echo $row['kelas']?></td>
                          </tr>
                        </tbody>
                      </table>
                      </ul>

                        <?php
                        include '../modals/edit_siswa.php';
                           // echo "<a href=\"edit_siswa.php?id=".$id."\" class=\"btn btn-success\"><i class=\"fa fa-edit m-right-xs\"></i>Edit Siswa</a>"
                        ?>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit m-right-xs"></i> Edit Siswa</button>
                      <br />
                    </div>

                      <div class="clearfix visible-xs"></div>
                    <div class="col-md-9 col-sm-9 col-xs-16">
                <div class="x_panel">
                     <div class="x_title">
                            <h3>Biodata <small>siswa</small></h3>
                            <div class="clearfix"></div>
                        </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-responsive">
                              <tbody>
                               <tr>
                                  <th scope="row">NIS</th>
                                  <td><?php echo $row['nis']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Nama</th>
                                  <td><?php echo $row['nama']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Tempat Lahir</th>
                                  <td><?php echo $row['tempatLahir']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Tanggal Lahir</th>
                                  <td><?php echo $row['tanggalLahir']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Jenis Kelamin</th>
                                  <td><?php
                                      if($row['jenisKelamin'] == 'P'){
                                          echo 'Perempuan';
                                      }else{
                                          echo 'Laki-Laki';
                                      }
                                      ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Nama Orang Tua</th>
                                  <td><?php echo $row['namaOrtu']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Alamat</th>
                                  <td><?php echo $row['alamat']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Agama</th>
                                  <td><?php echo $row['agama']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Usia</th>
                                  <td><?php echo $row['usia']?></td>
                                </tr>
                                <tr>
                                  <th scope="row">NISN</th>
                                  <td><?php echo $row['nisn']?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <h3 class="panel-title">Daftar Pelanggaran siswa</h3>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-responsive table-bordered">
                              <thead>

                                <tr>
                                  <th>No</th>
                                  <th>ID Peraturan</th>
                                  <th>Nama Pelanggaran</th>
                                  <th>Waktu Kejadian</th>
                                  <th>Total Poin</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php

                              $sql = "select tabelpelanggaran.idPelanggaran, tabelpelanggaran.idSiswa, tabelperaturan.idPeraturan, tabelperaturan.namaPelanggaran, tabelperaturan.sanksiPoin, tabelpelanggaran.waktuKejadian
from tabelpelanggaran 
inner join tabelperaturan
on tabelpelanggaran.idPeraturan = tabelperaturan.idPeraturan
inner join tabelsiswa
on tabelpelanggaran.idSiswa = tabelsiswa.idSiswa
WHERE tabelsiswa.idSiswa = ". "$id";
                              $result = mysqli_query($dbConnection, $sql);
                              if(mysqli_num_rows($result)>0){
                                  $counter = 1;
                                  while($row = mysqli_fetch_assoc($result)){
                                      echo "<tr>";
                                      echo "<th scope=\"row\">$counter</th>";
                                      echo "<td><a href=\"rincian_pelanggaran.php?id=".$row['idPelanggaran']."\">".$row['idPeraturan']."</a></td>";
                                      echo "<td><a href=\"rincian_pelanggaran.php?id=".$row['idPelanggaran']."\">".$row['namaPelanggaran']."</a></td>";
                                      echo "<td><a href=\"rincian_pelanggaran.php?id=".$row['idPelanggaran']."\">".$row['waktuKejadian']."</a></td>";
                                      echo "<td align='right'><a href=\"rincian_pelanggaran.php?id=".$row['idPelanggaran']."\">".$row['sanksiPoin']."</a></td>";
                                      echo "</tr>";
                                      $counter++;

                                  }
                                  $sql = "Select totalPoin, nama, nis from tabelsiswa where idSiswa = $id";
                                  $result = mysqli_query($dbConnection,$sql);
                                  $totalPoin = mysqli_fetch_assoc($result);
                                  echo "<tr>";
                                  echo "<td colspan='4'>Total Poin</td>";
                                  echo "<td align='right'>".$totalPoin['totalPoin']."</td>";
                                  echo "</tr>";
                                  echo "</tbody>";
                                  echo "</table>";
                                  echo "<div class=\"clearfix\"> </div> ";
                                  if($totalPoin['totalPoin'] >= 250 && $totalPoin['totalPoin'] < 500){
                                      echo "<button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\"><i class=\"fa fa-edit m-right-xs\"></i> Cetak SP 1</button>";
                                  }
                                  elseif ($totalPoin['totalPoin'] >=500 && $totalPoin['totalPoin'] < 1000){
                                      echo "<button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\"><i class=\"fa fa-edit m-right-xs\"></i> Cetak SP 2</button>";
                                  }
                                  elseif ($totalPoin['totalPoin'] > 1000){
                                      echo "<button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\"><i class=\"fa fa-edit m-right-xs\"></i> Cetak SP 3</button>";
                                  }
                                  include '../modals/konfirmasi_permintaan_sp.php';
                              }else{
                                  echo "<p class='text-center'>Siswa tidak perhah melanggar aturan.</p>";
                              }
                              ?>

                          </div>
                        </div>
                      </div>
                    <!-- end of accordion -->


                  </div>
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
require '../sections/footer.php';
?>

