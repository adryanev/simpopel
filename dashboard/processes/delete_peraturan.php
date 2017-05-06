<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.43
 */

require '../libs/database.php';

$id = $_POST['idPeraturan'];

$sql = "DELETE FROM tabelperaturan where idPeraturan = $id";
$result = mysqli_query($dbConnection, $sql);

if($result){
    echo "<script> alert(\"Data telah dihapus\");
window.location='../views/pages/peraturan.php'; </script>";
}else{
    echo mysqli_error($dbConnection);
}

