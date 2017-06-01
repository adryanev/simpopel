<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 20/05/17
 * Time: 23:27
 */
require '../libs/database.php';
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT * FROM tabelperaturan";
$result = mysqli_query($dbConnection, $sql);
$to_json = array();
while($row = mysqli_fetch_assoc($result)){
    $to_json[] = $row;

}
$json_string = json_encode($to_json);
print $json_string;