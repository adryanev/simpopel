<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 30/05/2017
 * Time: 17.39
 */
header("Content-Type: application/json; charset=UTF-8");
require '../mobile/libs/database.php';

$sql= "Select * from total_pelanggaran_gender";
$result = mysqli_query($dbConnection,$sql);
$row = mysqli_fetch_assoc($result);
$jsonTotal = $row;
echo json_encode($jsonTotal);