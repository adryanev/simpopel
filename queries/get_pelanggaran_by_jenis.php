<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 30/05/2017
 * Time: 17.39
 */

header("Content-Type: application/json; charset=UTF-8");
require '../mobile/libs/database.php';


$sql = "SELECT * from total_jenis_pelanggaran";
$result = mysqli_query($dbConnection,$sql);
$row = mysqli_fetch_assoc($result);
$jsonJenis = $row;

echo json_encode($jsonJenis);