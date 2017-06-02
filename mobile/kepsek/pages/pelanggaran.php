<?php
require '../sections/header.php';
require '../sections/top_navigation.php';
require '../../libs/database.php';
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-6 ">
                                <h3>Pelanggaran Siswa <small> MA Hasanah </small></h3>
                            </div>
                            <div class="col-md-6 text-right">


                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus m-right-xs"></i> Tambah Pelanggaran</button>

                            </div>

                        </div>
                        </div>
                    <?php include '../modals/input_pelanggaran.php'?>
                    <div class="clearfix"></div>
                    <div class="x_content">

                        <table id="datatable-responsive" class="table table-hover table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Pelanggaran</th>
                                <th>Point</th>
                                <th>Waktu</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT tabelpelanggaran.idPelanggaran, tabelsiswa.nama,tabelsiswa.kelas, tabelperaturan.namaPelanggaran, tabelperaturan.sanksiPoin, tabelpelanggaran.waktuKejadian
from tabelpelanggaran inner JOIN tabelperaturan
on tabelpelanggaran.idPeraturan = tabelperaturan.idPeraturan
inner join tabelsiswa
WHERE tabelpelanggaran.idSiswa = tabelsiswa.idSiswa";
                            $result = mysqli_query($dbConnection, $sql);

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td align='center'><a href=\"rincian_pelanggaran.php?id=" .$row['idPelanggaran'] ." \">".$row["idPelanggaran"]."</a></td>";
                                    echo "<td><a href=\"rincian_pelanggaran.php?id=" .$row['idPelanggaran'] ." \">".$row["nama"]."</a></td>";
                                    echo "<td align='center'><a href=\"rincian_pelanggaran.php?id=" .$row['idPelanggaran'] ." \">".$row["kelas"]."</a></td>";
                                    echo "<td><a href=\"rincian_pelanggaran.php?id=" .$row['idPelanggaran'] ." \">".$row["namaPelanggaran"]."</a></td>";
                                    echo "<td align='center'><a href=\"rincian_pelanggaran.php?id=" .$row['idPelanggaran'] ." \">".$row["sanksiPoin"]."</a></td>";
                                    echo "<td><a href=\"rincian_pelanggaran.php?id=" .$row['idPelanggaran'] ." \">".$row["waktuKejadian"]."</a></td>";
                                    echo "</tr>";
                                }
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
<!-- /page content -->
