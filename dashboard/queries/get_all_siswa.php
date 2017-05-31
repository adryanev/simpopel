<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 20/05/17
 * Time: 21:15
 */

require '../../config.php';
require '../libs/database.php';
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT idSiswa, nis, nama, tempatLahir, tanggalLahir, jenisKelamin, namaOrtu,
alamat, agama, usia, nisn, kelas, totalPoin, pasFoto FROM tabelsiswa";
$result = mysqli_query($dbConnection, $sql);
$to_json = array();
while($row = mysqli_fetch_assoc($result)){
	$urlFoto = BASE_URL. "images/". $row['pasFoto'];
    $to_json[] =array('idSiswa' =>$row['idSiswa'],
     'nama' => $row['nama'],
     'tempatLahir' => $row['tempatLahir'],
     'tanggalLahir' => $row['tanggalLahir'],
     'jenisKelamin' => $row['jenisKelamin'],
     'namaOrtu' => $row['namaOrtu'],
     'alamat' => $row['alamat'],
     'agama' => $row['agama'],
     'usia' => $row['usia'],
     'nisn' => $row['nisn'],
     'kelas' => $row['kelas'],
     'totalPoin' => $row['totalPoin'],
     'pasFoto' => $urlFoto);

}
$json_string = json_encode($to_json,JSON_PRETTY_PRINT);
print $json_string;