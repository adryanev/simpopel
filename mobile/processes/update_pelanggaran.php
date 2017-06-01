<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.43
 */
session_start();
require '../libs/database.php';
date_default_timezone_set("Asia/Jakarta");
if(isset($_POST['save'])){
    $idPelanggaran = $_POST['idPelanggaran'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $idPeraturan = $_POST['idPeraturan'];
    $waktuKejadian = date('Y-m-d h:i:s');
    $foto = $_FILES['foto'];
    $namaFoto = $_FILES['foto']['name'];

    if(isset($foto)){

        $errors = array();
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileTemp = $_FILES['foto']['tmp_name'];
        $fileType = $_FILES['foto']['type'];
        $fileExt = strtolower(end(explode('.',$_FILES['foto']['name'])));
        $extension = array('jpeg','jpg','png');
        if(in_array($fileExt,$extension)== false){
            $errors[] = "Gambar harus berupa file JPEG, JPG atau PNG";

        }
        if(empty($errors) == true){
            move_uploaded_file($fileTemp, "../../images/".$fileName);
            $sql = "UPDATE tabelpelanggaran 
            SET idSiswa =(SELECT idSiswa from tabelsiswa where nis = $nis),
            idPeraturan = $idPeraturan,
            waktuKejadian = $waktuKejadian,
            foto = $namaFoto";


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
   $sql = "UPDATE tabelpelanggaran 
            SET idSiswa =(SELECT idSiswa from tabelsiswa where nis = $nis),
            idPeraturan = $idPeraturan,
            waktuKejadian = $waktuKejadian";

        $result = mysqli_query($dbConnection,$sql);

        if($result){
            echo "<script>window.alert('Data telah masuk.');
					window.location='../views/pages/siswa.php'</script>";

        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
        }
    }



}


