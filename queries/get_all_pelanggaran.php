<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 21/05/17
 * Time: 0:04
 */
require '../mobile/libs/database.php';
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT * FROM tabelpelanggaran";
$result = mysqli_query($dbConnection, $sql);
$to_json = array();
while($row = mysqli_fetch_assoc($result)){
    $to_json[] = $row;

}
$json_string = json_encode($to_json,JSON_PRETTY_PRINT);
print $json_string;