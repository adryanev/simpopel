<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.38
 */

require '../libs/database.php' ;
$id =$_GET['id'];

$sql = "DELETE FROM tabelsiswa WHERE idSiswa = $id";
$result = mysqli_query($dbConnection, $sql);

if($result){
    echo "<script> alert(\"Data telah dihapus\");
window.location='../views/pages/siswa.php'; </script>";
}else{
    echo mysqli_error($dbConnection);
}
