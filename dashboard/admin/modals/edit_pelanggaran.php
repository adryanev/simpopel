<?php
require '../../libs/database.php';
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Pelanggaran</h4>
            </div>
            <div class="modal-body">
                <form id="demo-form2" action="../../processes/update_pelanggaran.php" method="post" class="form-horizontal form-label-left">

                    <div class="form-group hidden">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">ID Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" id="nis" value="<?php echo $row['idPeraturan']; ?>" readonly="readonly" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Pelanggaran
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="name" id="nama" value="<?php echo $row['namaPelanggaran'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenisPelanggaran">Jenis Pelanggaran
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">        
                            <select name="jenisPelanggaran" class="form-control">
                                <?php
                                    switch($row['jenisPelanggaran']){
                                        case '1':
                                            echo " <option value=\"1\" selected>Ringan</option>
                                <option value=\"2\" >Sedang</option>
                                <option value=\"3\">Berat</option>";
                                            break;
                                        case '2':
                                            echo " <option value=\"1\">Ringan</option>
                                <option value=\"2\" selected >Sedang</option>
                                <option value=\"3\">Berat</option>";
                                            break;
                                        case '3':
                                            echo" <option value=\"1\">Ringan</option>
                                <option value=\"2\" >Sedang</option>
                                <option value=\"3\" selected>Berat</option>";
                                            break;
                                        default: echo "Bukan jenis Pelanggaran";
                                            break;
                                    }
                                ?>
                            </select>
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

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
                </form>
        </div>
    </div>
</div>
</div>