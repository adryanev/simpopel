<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 19/05/17
 * Time: 16:11
 */
require '../libs/database.php';
header("Content-Type: application/json; charset=UTF-8");
$id = $_GET['id'];
$sql = "SELECT * from tabelsiswa where idSiswa = $id";
$result = mysqli_query($dbConnection,$sql);
$to_json = array();
while($row = mysqli_fetch_assoc($result)){
    $to_json[] = $row;
}
echo json_encode($to_json);