<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 30/05/2017
 * Time: 17.38
 */
header("Content-Type: application/json; charset=UTF-8");
require '../libs/database.php';

$sqlCowok= "Select * from total_pelanggaran_by_bulan_lk";
$resultCowok = mysqli_query($dbConnection,$sqlCowok);
$rowCowok = mysqli_fetch_assoc($resultCowok);
$sqlCewek = "SELECT * FROM total_pelanggaran_by_bulan_pr";
$resultCewek = mysqli_query($dbConnection,$sqlCewek);
$rowCewek = mysqli_fetch_assoc($resultCewek);

$jsonPeriode = array();
$jsonPeriode[0] = $rowCowok;
$jsonPeriode[1] = $rowCewek;

echo json_encode($jsonPeriode);