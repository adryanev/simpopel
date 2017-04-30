<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 29/04/2017
 * Time: 13.55
 */

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
                        <h3>Peraturan <small> MA Hasanah </small></h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Pelanggaran</th>
                                <th>Jenis Pelanggaran</th>
                                <th>Nama Pelanggaran</th>
                                <th>Sanksi Poin</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $sql  ="SELECT tabelperaturan.idPeraturan, tabelkategori.namaKategori, tabelperaturan.namaPelanggaran, 
tabelperaturan.sanksiPoin from tabelperaturan inner JOIN tabelkategori 
ON tabelperaturan.jenisPelanggaran = tabelkategori.idKategori";
                            $result=mysqli_query($dbConnection,$sql);

                            if(mysqli_num_rows($result) > 0){
                                //output
                                $counter = 1;
                                while($row = mysqli_fetch_assoc($result)){

                                    echo "<tr> ";
                                    echo "<td align='center'>" .$counter."</td>";
                                    echo "<td align=\"center\">" .$row['idPeraturan'] .  "</td>";
                                    echo "<td>" .$row['namaKategori'] . "</td>";
                                    echo "<td>" .$row['namaPelanggaran'] . "</td>";
                                    echo "<td align=\"center\">" . $row['sanksiPoin'] . "</td>";
                                    echo "</tr>";
                                    $counter++;
                                }
                            }else {
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
<!-- /page content -->

<?php
include "../sections/footer.php";
?>