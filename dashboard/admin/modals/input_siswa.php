<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 02/05/2017
 * Time: 20.22
 */
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
                <form id="inputsiswa" name="inputsiswa" action="../../processes/add_siswa.php" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kelas">Kelas
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="kelas" class="form-control">
                                   <option value="XII IPS" selected>XII IPS</option>
                                    <option value="XII IPA" >XII IPA</option>
                                       <option value="XI IPA">XI IPA</option>
                                       <option value="XI IPS">XI IPS</option>
                                        <option value="X IPA">X IPA</option>
                                        <option value="X IPS">X IPS</option>

                                    </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                      <label class="btn btn-default active  " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                      <input type="radio" name="gender" value="L"> &nbsp; Laki-Laki &nbsp;
                                        </label>
                                        <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                       <input type="radio" name="gender" value="F"> Perempuan
                                        </label>
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
                            <input type="text" name="tempatLahir" id="tempatLahir" placeholder="Masukkan Tempat Lahir Siswa" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Tanggal Lahir
                        </label>
                        <div class="input-group col-md-6 col-sm-6 col-xs-12">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(){
                            var date_input=$('input[name="date"]'); //our date input has the name "date"
                            //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                            date_input.datepicker({
                                format: 'yyyy-mm-dd',
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
                            <input type="text" name="namaOrtu" id="namaOrtu" placeholder="Masukkan Nama Orang Tua Siswa" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Alamat
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea placeholder="Masukkan Alamat Siswa" class="form-control  col-md-7 col-xs-12" cols="40" id="alamat" name="alamat" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">Agama
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-book"></i>
                            </div>
                            <input type="text" id="agama" name="agama" placeholder="Masukkan Agama SIswa" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-flag"></i>
                            </div>
                            <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN Siswa" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">Pas Foto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 input-group">
                            <input type="file" id="pasFoto" name="pasFoto" class="file col-md-7 col-xs-12" multiple data-show-upload="false" data-show-caption="true">
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" name="save" class="btn btn-primary">Tambah Siswa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


