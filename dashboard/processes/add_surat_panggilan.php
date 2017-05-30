<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 29/05/2017
 * Time: 14.49
 */
require '../libs/database.php';

$id = $_GET['id'];
$sp = $_GET['sp'];
$sql = "SELECT * from tabelsiswa where idSiswa = $id";
$result = mysqli_query($dbConnection,$sql);
$row = mysqli_fetch_assoc($result);
$today = date('Y-m-d');
$dateNull = "0000-00-00";
$sqlInsertSP = "INSERT INTO tabelsp(idSiswa,jenisSP,statusKepsek,statusWaka,tanggalPermintaan,tanggalCetak)
VALUES($id,$sp,null,null,'$today','$dateNull')";


