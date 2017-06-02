<?php
require '../../libs/database.php';

?>
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

                <?php
                //fetch data from database
                $sql1 = "SELECT DISTINCT nis FROM tabelsiswa";
                $result1 = mysqli_query($dbConnection, $sql1) or die("Error " . mysqli_error($connection));
                $sql3 = "SELECT DISTINCT namaPelanggaran FROM tabelperaturan";
                $result3 = mysqli_query($dbConnection, $sql3) or die("Error " . mysqli_error($connection));
                ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nis">NIS
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" list="nomor" autocomplete="off" id="nis" placeholder="Masukkan NIS Siswa" required="" class="form-control col-md-7 col-xs-12" name="nis">
                            <datalist id="nomor">
                            <?php while($row = mysqli_fetch_array($result1)) { ?>
                                <option value="<?php echo $row['nis']; ?>"><?php echo $row['nis']; ?></option>
                            <?php } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namaPeraturan">Nama Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="text" list="nampel" autocomplete="off" name="namaPelanggaran" id="namaPelanggaran" placeholder="Masukkan Nama Pelanggaran" required="" class="form-control col-md-7 col-xs-12">
                            <datalist id="nampel">
                            <?php while($row = mysqli_fetch_array($result3)) { ?>
                                <option value="<?php echo $row['namaPelanggaran']; ?>"><?php echo $row['namaPelanggaran']; ?></option>
                            <?php } ?>
                            </datalist>
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

    </script>
</div>



