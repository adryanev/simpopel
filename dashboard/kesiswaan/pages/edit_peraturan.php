<?php
require '../sections/header.php';
require '../sections/sidebar.php';
require '../sections/top_navigation.php';
require '../../libs/database.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM tabelperaturan where idPeraturan = '$id' ";
    $result = mysqli_query($dbConnection,$sql);
    $row = mysqli_fetch_assoc($result);

?>
<div class="right_col" role="main">

          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h3>Edit Peraturan</h3>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form id="demo-form2" action="../../processes/update_peraturan.php?id="<?php echo $id;?>" method="post" class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="idPeraturan">ID Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            <input type="text" id="idPeraturan" class="form-control col-md-7 col-xs-12" name="idPeraturan" value="<?php echo $row['idPeraturan'] ;?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="namaPeraturan">Nama Peraturan
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </div>
                            <input type="name" name="namaPelanggaran" id="namaPelanggaran" class="form-control col-md-7 col-xs-12" value="<?php echo $row['namaPelanggaran'] ;?>">
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
                            <input type="text" name="sanksiPoin" id="sanksiPoin" class="form-control col-md-7 col-xs-12" value="<?php echo $row['sanksiPoin']; ?>">
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