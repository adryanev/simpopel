<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 05/05/2017
 * Time: 10.13
 */
require '../../libs/database.php';
?>

<!-- modals -->
<!-- Large modal -->
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM tabelperaturan where idPeraturan = $id";
    $result = mysqli_query($dbConnection,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Peraturan</h4>
            </div>
            <div class="modal-body">
                <form id="editperaturan" name="editperaturan" action="../../processes/update_peraturan.php" method="post" class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idPeraturan">ID Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" id="idPeraturan" placeholder="Masukkan kode peraturan. Contoh: PR030" class="form-control col-md-7 col-xs-12" name="idPeraturan" value="<?php echo $row['idPeraturan'] ;?>">

                        </div>

                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namaPeraturan">Nama Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="name" name="namaPelanggaran" id="namaPelanggaran" placeholder="Masukkan Nama Pelanggaran" class="form-control col-md-7 col-xs-12" value="<?php echo $row['namaPelanggaran'] ;?>">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sanksiPoin">Jumlah Poin
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-building"></i>
                            </div>
                            <input type="text" name="sanksiPoin" id="sanksiPoin" placeholder="Masukkan Jumlah Poin" class="form-control col-md-7 col-xs-12" value="<?php echo $row['sanksiPoin']; ?>">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="save" class="btn btn-primary">Tambah Peraturan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

