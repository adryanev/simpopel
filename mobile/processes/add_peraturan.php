<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.42
 */

session_start();
require '../../libs/database.php';
require '../../config.php';
$url = constant("BASE_URL");

$idPeraturan = $_POST['idPeraturan'];
$namaPelanggaran = $_POST['namaPelanggaran'];
$jenisPelanggaran = $_POST['jenisPelanggaran'];
$sanksiPoin = $_POST['sanksiPoin'];

$sql = "INSERT INTO tabelPeraturan (idPeraturan, namaPelanggaran, jenisPelanggaran, sanksiPoin)
VALUES('$idPeraturan','$namaPelanggaran',$jenisPelanggaran, $sanksiPoin)";
$result = mysqli_query($dbConnection, $sql);

if($result){
    echo "<script> alert(\"Data telah masuk\");
window.location = '".$url."".$_SESSION['level']."pages/peraturan.php'; </script>";
}else{
    echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
}