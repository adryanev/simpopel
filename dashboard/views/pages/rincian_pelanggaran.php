<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 21.42
 */
require '../sections/header.php';
require '../sections/sidebar.php';
require '../sections/top_navigation.php';
require '../../libs/database.php';
?>

<?php
    $id = $_GET['id'];
    $sql = "SELECT * from pelanggaran_all_time where idPelanggaran = $id";
    $result = mysqli_query($dbConnection, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Rincian Pelanggaran Siswa</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="../../../images/<?php echo $row['foto']; ?>" alt="Avatar" title="<?php echo $row['namaPelanggaran'];?>">
                                </div>
                            </div>
                            <h3><?php echo $row['namaPelanggaran']; ?></h3>

                            <ul class="list-unstyled user_data">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">ID Peraturan</th>
                                        <td><?php echo $row['idPeraturan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Pelanggaran</th>
                                        <td><?php echo $row['namaPelanggaran']?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </ul>
                        </div>


                        <div class="col-md-9 col-sm-9 col-xs-15">
                            <div class="x_panel">

                                <div class="x_content">

                                    <!-- start accordion -->
                                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row">ID Pelanggaran</th>
                                                        <td><?php echo $row['idPeraturan'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Pelanggaran</th>
                                                        <td><?php echo $row['namaPelanggaran'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Pelanggaran</th>
                                                        <td><?php switch ($row['idPeraturan']){
                                                                case 1:
                                                                    echo "Ringan";
                                                                    break;
                                                                case 2:
                                                                    echo "Sedang";
                                                                    break;
                                                                case 3:
                                                                    echo "Berat";
                                                                    break;
                                                                default: echo"Tidak termasuk Pelanggaran"; break;
                                                            };?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Sanksi Poin</th>
                                                        <td><?php echo $row['sanksiPoin'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Waktu Kejadian</th>
                                                        <td><?php echo $row['waktuKejadian'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">NIS Pelanggar</th>
                                                        <td><?php echo "<a href=\"profile.php?id=".$row['idSiswa']."\">".$row['nis'] ."</a>";?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nama Pelanggar</th>
                                                        <td><?php echo "<a href=\"profile.php?id=".$row['idSiswa']."\">".$row['nama'] ."</a>";?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Kelas</th>
                                                        <td><?php echo "<a href=\"profile.php?id=".$row['idSiswa']."\">".$row['kelas'] ."</a>";?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Jenis Kelamin</th>
                                                        <td><?php switch ($row['jenisKelamin']){
                                                                case 'L':
                                                                    echo "<a href=\"profile.php?id=".$row['idSiswa']."\">Laki-Laki</a>";
                                                                    break;
                                                                case 'P':
                                                                    echo "<a href=\"profile.php?id=".$row['idSiswa']."\">Perempuan</a>";
                                                                    break;
                                                                default: echo "Bukan Jenis Kelamin"; break;
                                                            };?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
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
    include '../sections/footer.php';
?>