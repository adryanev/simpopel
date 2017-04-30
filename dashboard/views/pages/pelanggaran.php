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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Pelanggaran <small> Siswa </small></h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Pelanggaran</th>
                                <th>Point</th>
                                <th>Waktu</th>
                                <th>Action</th>
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
                                    echo "<td align='center'>" .$row['idPelanggaran']. "</td>";
                                    echo "<td>" .$row['nama']. "</td>";
                                    echo "<td align='center'>" .$row['kelas']. "</td>";
                                    echo "<td>" .$row['namaPelanggaran']. "</td>";
                                    echo "<td align='center'>" .$row['sanksiPoin']. "</td>";
                                    echo "<td>" .$row['waktuKejadian']. "</td>";
                                    echo "<td align=\"center\">
                                    <button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-plus\"></i></button>
                                    <button type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-pencil\"></i></button>
                                </td>";
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


<?php
include "../sections/footer.php";
?>
