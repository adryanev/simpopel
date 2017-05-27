<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.13
 */
require '../libs/database.php';

$id = $_GET['id'];
if(isset($_POST['save'])) {
    echo var_dump($id);
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
    if(isset($pasFoto)){
        $errors = array();
        $fileName = $_FILES['pasFoto']['name'];
        $fileSize = $_FILES['pasFoto']['size'];
        $fileTemp = $_FILES['pasFoto']['tmp_name'];
        $fileType = $_FILES['pasFoto']['type'];
        $fileExt = strtolower(end(explode('.',$_FILES['pasFoto']['name'])));
        $extension = array('jpeg','jpg','png');

        if(in_array($fileExt,$extension)== false){
            $errors[] = "Gambar harus berupa file JPEG, JPG atau PNG";

        }
        if(empty($errors) == true){
            move_uploaded_file($fileTemp, "../../images/".$fileName);
            $sql = "UPDATE tabelsiswa
           SET nis = $nis,nama = $nama,tempatLahir = $tempatLahir,tanggalLahir = $tanggalLahir,jenisKelamin  = $jenisKelamin,namaOrtu = $namaOrtu,alamat = $alamat,agama = $agama,usia = $usia,nisn = $nisn,kelas = $kelas,pasFoto = $namaFoto 
           WHERE idSiswa = $id";


            if(mysqli_query($dbConnection,$sql)){
                echo "<script> alert(\"Data telah masuk\");
window.location('views/pages/siswa.php'); </script>";

            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
            }
        }
        else{
            print_r($errors);
        }

    }else{
        $sql = "INSERT INTO tabelsiswa(nis,nama,tempatLahir,tanggalLahir,jenisKelamin,namaOrtu,alamat,agama,usia,nisn,kelas,totalPoin,pasFoto)
VALUES('$nis','$nama','$tempatLahir','$tanggalLahir','$jenisKelamin','$namaOrtu','$alamat','$agama',$usia,'$nisn','$kelas',0,'$namaFoto')";

        $result = mysqli_query($dbConnection,$sql);

        if($result){
            echo "<script> alert(\"Data telah masuk\");
window.location='../views/pages/siswa.php'; </script>";
        }else{

            echo mysqli_error($result);
        }
    }



}
