<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.13
 */
require '../libs/database.php';


if(isset($_POST['save'])) {
    $id = $_POST['idSiswa'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jenisKelamin = $_POST['gender'];
    $tempatLahir = $_POST['tempatLahir'];
    $tanggalLahir = $_POST['date'];
    $namaOrtu = $_POST['namaOrtu'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];
    $nisn = $_POST['nisn'];
    $usia = $thisYear - date('Y',$tanggalLahir);
    $pasFoto = $_FILES['pasFoto'];
    $namaFoto = $_FILES['pasFoto']['name'] ? $_FILES['pasFoto']['name'] : 'profile.png';



    //Uploading foto ke folder images
    if($namaFoto != 'profile.png'){
        $fileName = $_FILES['pasFoto']['name'];
        $fileSize = $_FILES['pasFoto']['size'];
        $fileTemp = $_FILES['pasFoto']['tmp_name'];
        $fileType = $_FILES['pasFoto']['type'];


            move_uploaded_file($fileTemp, "../../images/".$fileName);
            $sql = "UPDATE tabelsiswa
           SET nis = $nis,nama = $nama,tempatLahir = $tempatLahir,tanggalLahir = $tanggalLahir,jenisKelamin  = $jenisKelamin,namaOrtu = $namaOrtu,alamat = $alamat,agama = $agama,usia = $usia,nisn = $nisn,kelas = $kelas,pasFoto = $namaFoto 
           WHERE idSiswa = $id";
            if(mysqli_query($dbConnection,$sql)){
                echo "<script> alert(\"Data telah masuk\");
window.location('../admin/pages/siswa.php'); </script>";

            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);

        }

    }else{
        $sql = "UPDATE tabelsiswa
           SET nis = $nis,nama = $nama,tempatLahir = $tempatLahir,tanggalLahir = $tanggalLahir,jenisKelamin  = $jenisKelamin,namaOrtu = $namaOrtu,alamat = $alamat,agama = $agama,usia = $usia,nisn = $nisn,kelas = $kelas,pasFoto = $namaFoto 
           WHERE idSiswa = $id";
        $result = mysqli_query($dbConnection,$sql);

        if($result){
            echo "<script> alert(\"Data telah masuk\");
window.location='../admin/pages/siswa.php'; </script>";
        }else{

            echo mysqli_error($result);
        }
    }



}
