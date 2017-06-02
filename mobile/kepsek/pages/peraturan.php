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
                            <div class="col-md-6 text-left">
                                <h3>Peraturan <small> MA Hasanah </small></h3>
                            </div>
                            <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-plus m-right-xs"></i> Tambah Peraturan</button>
                            </div>
                        </div>
                            <?php include "../modals/input_peraturan.php"; ?>  

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
                                <th>Action</th>
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
                                    echo "<td align=\"center\">
                                    <a href=\"edit_peraturan.php?id=".$row['idPeraturan']."\"><button type=\"button\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-edit\"></i></button></a>
                                    </td>";
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
