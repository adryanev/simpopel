<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 18/05/17
 * Time: 20:30
 */
session_start();
include '../libs/database.php';
include '../../config.php';
$url = constant("BASE_URL");
$id = $_GET['id'];
var_dump($id);
$sesi = $_SESSION['level'];
var_dump($sesi);
if($sesi == 'kepsek'){
    $sql = "UPDATE tabelsp set statusKepsek = 'ok' where idSP = $id";
    $result = mysqli_query($dbConnection,$sql);
    if($result){
        echo"<script>window.alert('\"Berhasil menyetujui permintaan cetak SP.\"');

     window.location='".$url."dashboard/".$_SESSION['level']."/pages/surat_panggilan.php';</script>";
    }
}
elseif ($sesi == 'kesiswaan'){
    $sql = "UPDATE tabelsp set statusWaka = 'ok' where idSP = $id";
    $result = mysqli_query($dbConnection,$sql);
    if($result) {
        echo "<script>window.alert('\"Berhasil menyetujui permintaan cetak SP.\"');

     window.location='" . $url . "dashboard/" . $_SESSION['level'] . "/pages/surat_panggilan.php';</script>";
    }

}
elseif ($sesi == 'admin'){
    $sql = "UPDATE tabelsp set statusWaka = 'ok', statusKepsek = 'ok' where idSP = $id";
    $result = mysqli_query($dbConnection,$sql);
    if($result) {
        echo "<script>window.alert('\"Berhasil menyetujui permintaan cetak SP.\"');

     window.location='" . $url . "dashboard/" . $_SESSION['level'] . "/pages/surat_panggilan.php';</script>";
    }
}
else{

        echo "<script>window.alert('\"Anda tidak berhak menyetujui Permintaan Cetak SP.\"');

     window.location='" . $url . "dashboard/" . $_SESSION['level'] . "/pages/surat_panggilan.php';</script>";

}

