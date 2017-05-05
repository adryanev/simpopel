<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.42
 */
require '../../libs/database.php';

$id = $_GET['id'];

if(isset($_POST['save'])){
    $idPeraturan = $_POST['idPeraturan'];
    $namaPelanggaran = $_POST['namaPelanggaran'];
    $jenisPelanggaran = $_POST['jenisPelanggaran'];
    $sanksiPoin = $_POST['sanksiPoin'];

    $sql = "UPDATE tabelsiswa SET idPeraturan = $idPeraturan, namaPelanggaran = $namaPelanggaran
    , jenisPelanggaran = $jenisPelanggaran, sanksiPoin = $sanksiPoin where idPeraturan = $id";

    if(mysqli_query($sql)){
        echo "<script>window.alert('Data telah masuk.');
					window.location='../views/pages/peraturan.php'</script>";

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
    }
}
