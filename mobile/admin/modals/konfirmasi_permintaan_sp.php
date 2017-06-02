<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 29/05/2017
 * Time: 01.06
 */
require '../../libs/database.php';
?>
<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
                <?php

                    if($totalPoin['totalPoin'] >= 250 && $totalPoin['totalPoin'] < 500){
                        $sp =1;
                    }
                    elseif ($totalPoin['totalPoin'] >=500 && $totalPoin['totalPoin'] < 1000){
                        $sp = 2;
                    }
                    elseif ($totalPoin['totalPoin'] > 1000){
                       $sp =3;
                    }

                ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <h4>Cetak SP</h4>
                <p>Apakah anda ingin mencetak Surat Panggilan untuk siswa berikut ini?</p><br>
                <p>Nama &nbsp;: <?php echo $totalPoin['nama'];?> </p><br>
                <p>Nim  &nbsp;: <?php echo $totalPoin['nis'];?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?php echo $url; ?>dashboard/processes/add_surat_panggilan.php?id=<?php echo $id;?>&sp=<?php echo $sp;?>"><button type="button" class="btn btn-danger">Cetak SP</button></a>
            </div>

        </div>
    </div>
</div>
<!-- /modals -->
