<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 03/06/2017
 * Time: 02.45
 */
require '../libs/database.php';
require_once '../../documents/PHPWord.php';
require '../../config.php';
$url = constant("BASE_URL");
$today = date('D M Y');
$phpword = new PHPWord();
$document = $phpword->loadTemplate('sp.docx');
$sql = "SELECT * from tabelsiswa";
$query = mysqli_fetch_assoc(mysqli_query($dbConnection,$sql));
    $document->setValue('tanggal',$today);
    $document->setValue('nama',$query['nama']);
    $document->setValue('kelas',$query['kelas']);
    $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');
    $document->save($temp_file);
header("Content-Disposition: attachment; filename='Surat Panggilan.docx'");
readfile($temp_file);
unlink($temp_file);