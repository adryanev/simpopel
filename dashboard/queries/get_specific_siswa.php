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
echo json_encode($to_json);