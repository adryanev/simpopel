]<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 21/05/17
 * Time: 10:25
 */
require '../../config.php';
require '../libs/database.php';
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT nama, namaPelanggaran, foto FROM pelanggaran_all_time";
$result = mysqli_query($dbConnection, $sql);
$to_json = array();
$urlgambar = BASE_URL . "images/";

while($row = mysqli_fetch_assoc($result)){
	$urlgambar += $row['pasFoto'];
    $to_json[] = $row;

}
$json_string = json_encode($to_json,JSON_PRETTY_PRINT);
print $json_string;