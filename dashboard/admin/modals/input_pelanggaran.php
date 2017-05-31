<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 05/05/2017
 * Time: 10.59
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
                <h4 class="modal-title" id="myModalLabel">Tambah Data Siswa</h4>
            </div>
            <div class="modal-body">
                <form id="inputsiswa" name="inputsiswa" action="../../processes/add_pelanggaran.php" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" id="nis" placeholder="Masukkan NIS Siswa" class="form-control col-md-7 col-xs-12" name="nis">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="name" name="nama" id="nama" placeholder="Masukkan Nama Siswa" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namaPeraturan">Nama Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="name" name="namaPelanggaran" id="namaPelanggaran" placeholder="Masukkan Nama Pelanggaran" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">Foto Pelanggaran
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                            <input type="file" id="foto" name="foto" class="file col-md-7 col-xs-12" multiple data-show-upload="false" data-show-caption="true">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="save" class="btn btn-primary">Tambah Pelanggaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#namaPelanggaran').autocomplete({
            paramName: ,
            serviceUrl: "<?php echo $url;?>queries/get_all_peraturan.php"

        });
    </script>
</div>



