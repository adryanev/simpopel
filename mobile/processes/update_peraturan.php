<?php
session_start();
require '../libs/database.php';
require '../../config.php';

$url = constant("BASE_URL");
$id = $_GET['id'];

if(isset($_POST['save'])){
    $idPeraturan = $_POST['idPeraturan'];
    $namaPelanggaran = $_POST['namaPelanggaran'];
    $jenisPelanggaran = $_POST['jenisPelanggaran'];
    $sanksiPoin = $_POST['sanksiPoin'];

    $sql = "UPDATE tabelperaturan SET idPeraturan = '$idPeraturan', namaPelanggaran = '$namaPelanggaran', jenisPelanggaran = $jenisPelanggaran, sanksiPoin = $sanksiPoin where idPeraturan = '$idPeraturan'";

    if(mysqli_query($dbConnection,$sql)){
        echo "<script>window.alert('Data telah masuk.');
					window.location='".$url."mobile/".$_SESSION['level']."/pages/peraturan.php'</script>";

    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
    }
}

