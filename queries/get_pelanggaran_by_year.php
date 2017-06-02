<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 30/05/2017
 * Time: 17.38
 */

header("Content-Type: application/json; charset=UTF-8");
require '../mobile/libs/database.php';

$sql = "SELECT * from total_pelanggaran_tahun";
$result = mysqli_query($dbConnection,$sql);
$row = mysqli_fetch_assoc($result);
$jsonTahun = $row;

echo json_encode($jsonTahun);