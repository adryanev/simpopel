<?php
require '../sections/header.php';
require '../../libs/database.php';

$id = $_GET ['id'];
$sql = "SELECT idSiswa, nis, nama, tempatLahir, date_format(tanggalLahir, '%d/%m/%Y') as tanggalLahir, jenisKelamin, namaOrtu,
 alamat, agama, usia, nisn, kelas, totalPoin, pasFoto FROM tabelsiswa WHERE idSiswa = $id";
$result = mysqli_query($dbConnection, $sql);
$row = mysqli_fetch_assoc($result);
?>

    <div class="right_col" role="main">

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Data Siswa</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" action="../../processes/update_siswa.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">

                        <div class="form-group hidden">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group-addon">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <input type="hidden" id="idSiswa" value="<?php echo $row['idSiswa']; ?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group-addon">
                                    <i class="fa fa-credit-card"></i>
                                </div>
                                <input type="text" id="nis" value="<?php echo $row['nis']; ?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <input type="name" id="nama" value="<?php echo $row['nama']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control">
                                    <?php
                                    switch ($row['kelas']) {
                                        case 'XII IPA':
                                            echo "<option selected>XII IPA</option>";
                                            echo "<option>XI IPS</option>";
                                            echo "<option>XI IPA</option>";
                                            echo "<option>XI IPS</option>";
                                            echo "<option>X IPA</option>";
                                            echo "<option>X IPS</option>";
                                            break;

                                        case 'XII IPS':
                                            echo "<option selected>XII IPS</option>";
                                            echo "<option>XII IPA</option>";
                                            echo "<option>XI IPA</option>";
                                            echo "<option>XI IPS</option>";
                                            echo "<option>X IPA</option>";
                                            echo "<option>X IPS</option>";
                                            break;
                                        case 'XI IPA':
                                            echo "<option>XII IPA</option>";
                                            echo "<option>XII IPS</option>";
                                            echo "<option selected>XI IPA</option>";
                                            echo "<option>XI IPS</option>";
                                            echo "<option>X IPA</option>";
                                            echo "<option>X IPS</option>";
                                            break;
                                        case 'XI IPS':
                                            echo "<option>XII IPA</option>";
                                            echo "<option>XII IPS</option>";
                                            echo "<option>XI IPA</option>";
                                            echo "<option selected>XI IPS</option>";
                                            echo "<option>X IPA</option>";
                                            echo "<option>X IPS</option>";
                                            break;
                                        case 'X IPA':
                                            echo "<option>XII IPA</option>";
                                            echo "<option>XII IPS</option>";
                                            echo "<option>XI IPA</option>";
                                            echo "<option>XI IPS</option>";
                                            echo "<option selected>X IPA</option>";
                                            echo "<option>X IPS</option>";
                                            break;
                                        case 'XI IPS':
                                            echo "<option>XII IPA</option>";
                                            echo "<option>XII IPS</option>";
                                            echo "<option>XI IPA</option>";
                                            echo "<option>XI IPS</option>";
                                            echo "<option>X IPA</option>";
                                            echo "<option selected>X IPS</option>";
                                            break;

                                        default:
                                            echo "kelas tidak ada!";
                                            break;
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <?php
                                    switch ($row['jenisKelamin']){
                                        case 'L':
                                            echo "<label class=\"btn btn-default active  \" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\">";
                                            echo "<input type=\"radio\" name=\"gender\" value=\"L\"> &nbsp; Laki-Laki &nbsp;";
                                            echo "</label>";
                                            echo "<label class=\"btn btn-default\" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\">";
                                            echo "<input type=\"radio\" name=\"gender\" value=\"F\"> Perempuan";
                                            echo " </label>";
                                            break;
                                        case 'P':
                                            echo "<label class=\"btn btn-default\" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\">";
                                            echo "<input type=\"radio\" name=\"gender\" value=\"L\"> &nbsp; Laki-Laki &nbsp;";
                                            echo "</label>";
                                            echo "<label class=\"btn btn-default active\" data-toggle-class=\"btn-primary\" data-toggle-passive-class=\"btn-default\">";
                                            echo "<input type=\"radio\" name=\"gender\" value=\"F\"> Perempuan";
                                            echo " </label>";
                                            break;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempatLahir">Tempat Lahir
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <input type="text" id="tempatLahir" value="<?php echo $row['tempatLahir']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal Lahir
                            </label>
                            <div class="input-group col-md-6 col-sm-6 col-xs-12">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" id="date" name="date" placeholder="<?php echo $row['tanggalLahir'];?>" type="text"/>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                var date_input=$('input[name="date"]'); //our date input has the name "date"
                                //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                                date_input.datepicker({
                                    format: 'dd/mm/yyyy',
                                    // container: container,
                                    todayHighlight: true,
                                    autoclose: true,
                                })
                            })
                        </script>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namaOrtu">Nama Orang Tua
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <input type="text" name="namaOrtu" id="namaOrtu" value="<?php echo $row['namaOrtu']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Alamat
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea placeholder="<?php echo $row['alamat']; ?>" class="form-control  col-md-7 col-xs-12" cols="40" id="alamat" name="alamat" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <input type="text" id="agama" value="<?php echo $row['agama']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-flag"></i>
                                </div>
                                <input type="text" id="nisn" value="<?php echo $row['nisn']; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">Pas Foto
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                                <input type="file" id="pasFoto" value="<?php echo $row['foto']; ?>" class="file col-md-7 col-xs-12" multiple data-show-upload="false" data-show-caption="true">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
include '../sections/footer.php';
?>