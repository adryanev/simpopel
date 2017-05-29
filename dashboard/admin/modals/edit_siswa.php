<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 02/05/2017
 * Time: 20.06
 */
require '../../libs/database.php';
?>

<!-- modals -->
<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Data Siswa</h4>
            </div>
            <div class="modal-body">
                <form id="demo-form2" action="../../processes/update_siswa.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <div class="form-group hidden">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="hidden" id="id" name="idSiswa" value="<?php echo $id; ?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
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
                                        echo "<option value='XII IPA' selected>XII IPA</option>";
                                        echo "<option value='XII IPS'>XII IPS</option>";
                                        echo "<option value='XI IPA'>XI IPA</option>";
                                        echo "<option value='XI IPS'>XI IPS</option>";
                                        echo "<option value='X IPA'>X IPA</option>";
                                        echo "<option value='X IPS'>X IPS</option>";
                                        break;
                                    case 'XII IPS':
                                        echo "<option value='XII IPA'>XII IPA</option>";
                                        echo "<option value='XII IPS' selected>XII IPS</option>";
                                        echo "<option value='XI IPA'>XI IPA</option>";
                                        echo "<option value='XI IPS'>XI IPS</option>";
                                        echo "<option value='X IPA'>X IPA</option>";
                                        echo "<option value='X IPS'>X IPS</option>";
                                        break;
                                    case 'XI IPA':
                                        echo "<option value='XII IPA'>XII IPA</option>";
                                        echo "<option value='XII IPS'>XII IPS</option>";
                                        echo "<option value='XI IPA' selected>XI IPA</option>";
                                        echo "<option value='XI IPS'>XI IPS</option>";
                                        echo "<option value='X IPA'>X IPA</option>";
                                        echo "<option value='X IPS'>X IPS</option>";
                                        break;
                                    case 'XI IPS':
                                        echo "<option value='XII IPA'>XII IPA</option>";
                                        echo "<option value='XII IPS'>XII IPS</option>";
                                        echo "<option value='XI IPA'>XI IPA</option>";
                                        echo "<option value='XI IPS' selected>XI IPS</option>";
                                        echo "<option value='X IPA'>X IPA</option>";
                                        echo "<option value='X IPS'>X IPS</option>";
                                        break;
                                    case 'X IPA':
                                        echo "<option value='XII IPA'>XII IPA</option>";
                                        echo "<option value='XII IPS'>XII IPS</option>";
                                        echo "<option value='XI IPA'>XI IPA</option>";
                                        echo "<option value='XI IPS'>XI IPS</option>";
                                        echo "<option value='X IPA' selected>X IPA</option>";
                                        echo "<option value='X IPS'>X IPS</option>";
                                        break;
                                    case 'X IPS':
                                        echo "<option value='XII IPA'>XII IPA</option>";
                                        echo "<option value='XII IPS'>XII IPS</option>";
                                        echo "<option value='XI IPA'>XI IPA</option>";
                                        echo "<option value='XI IPS'>XI IPS</option>";
                                        echo "<option value='X IPA'>X IPA</option>";
                                        echo "<option value='X IPS' selected>X IPS</option>";
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
                            <input class="form-control" id="date" name="date" value="<?php echo $row['tanggalLahir'];?>" type="text"/>
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
                            <textarea class="form-control  col-md-7 col-xs-12" cols="40" id="alamat" name="alamat" rows="10"><?php echo $row['alamat']; ?></textarea>
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


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="save">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

