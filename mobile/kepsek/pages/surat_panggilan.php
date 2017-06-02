<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 18/05/17
 * Time: 19:53
 */
require '../../libs/database.php';
require '../sections/header.php';
require '../sections/top_navigation.php';

?>
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <h3>Verifikasi <small> Surat Panggilan</small></h3>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-responsive" class="table table-hover table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Surat Panggilan</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Permintaan</th>
                                <th>Action Kepsek</th>
                                <th>Action Kesiswaan</th>
                                <th>Cetak SP</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT tabelsp.idSP, tabelsp.statusKepsek, tabelsp.statusWaka, tabelsiswa.nama, tabelsp.tanggalPermintaan FROM
                            tabelsp INNER  JOIN  tabelsiswa ON tabelsp.idSiswa = tabelsiswa.idSiswa";
                            $result = mysqli_query($dbConnection, $sql);
                            $counter = 1;
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {

                                    echo "<tr>";
                                    echo "<td>$counter</td>";
                                    echo "<td>".$row['idSP']."</td>";
                                    echo "<td>".$row["nama"]."</td>";
                                    echo "<td>".$row["tanggalPermintaan"]." </td>";
                                    if($row['statusKepsek'] == 'ok'){
                                        echo "<td align=\"center\"><i class='fa fa-check'></i></td>";
                                    }else{
                                        echo "<td align=\"center\">
                                   <a href=\"".$url."mobile/processes/update_surat_panggilan.php?id=".$row['idSP']."\"> <button id='kepsek' type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-thumbs-up\"></i></button></a>
                                </td>";
                                    }
                                    if($row['statusWaka'] == 'ok'){
                                        echo "<td align=\"center\"><i class='fa fa-check'></i></td>";
                                    }else{
                                        echo "<td align=\"center\">
                                  <a href=\"".$url."mobile/processes/update_surat_panggilan.php?id=".$row['idSP']."\">  <button id='wakil' type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-thumbs-up\"></i></button></a>
                                </td>";
                                    }
                                    if($row['statusKepsek'] == 'ok' && $row['statusWaka'] == 'ok'){
                                        echo "<td align=\"center\">
                                  <a href=\"".$url."mobile/processes/print_sp.php?id=".$row['idSP']."\">  <button type=\"button\" class=\"btn btn-primary btn-xs\"><i class=\"fa fa-print\"></i></button></a>
                                </td>";
                                    }
                                    else{
                                        echo "<td align=\"center\">
                                 <button type=\"button\" class=\"btn btn-disabled btn-xs\"><i class=\"fa fa-print\"></i></button>
                                </td>";
                                    }



                                    echo "</tr>";

                                    $counter++;
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