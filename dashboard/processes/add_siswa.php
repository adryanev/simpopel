<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 02/05/2017
 * Time: 22.52
 */
session_start();
    require '../libs/database.php';
    require '../../config.php';
    $url = constant("BASE_URL");
    $thisYear = date('Y');
    if(isset($_POST['save'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jenisKelamin = $_POST['gender'];
        $tempatLahir = $_POST['tempatLahir'];
        $tanggalLahir = $_POST['date'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $nisn = $_POST['nisn'];
        $usia = $thisYear - date('Y',strtotime($tanggalLahir));
        $namaOrtu = $_POST['namaOrtu'];
        $pasFoto = $_FILES['pasFoto'];
        $namaFoto = $_FILES['pasFoto']['name'] ? $_FILES['pasFoto']['name'] : 'profile.jpg';

        //Uploading foto ke folder images
        if($namaFoto != 'profile.jpg'){
            $errors = array();
            $fileName = $_FILES['pasFoto']['name'];
            $fileSize = $_FILES['pasFoto']['size'];
            $fileTemp = $_FILES['pasFoto']['tmp_name'];
            $fileType = $_FILES['pasFoto']['type'];


            if(empty($errors) == true){
                move_uploaded_file($fileTemp, "../../images/".$fileName);
                $sql = "INSERT INTO tabelsiswa(nis,nama,tempatLahir,tanggalLahir,jenisKelamin,namaOrtu,alamat,agama,usia,nisn,kelas,totalPoin,pasFoto)
VALUES('$nis','$nama','$tempatLahir','$tanggalLahir','$jenisKelamin','$namaOrtu','$alamat','$agama',$usia,'$nisn','$kelas',0,'$namaFoto')";
                if(mysqli_query($dbConnection,$sql)){
                    echo "<script> window.alert(\"Data telah masuk\"); 
                        window.location='".$url."dashboard/".$_SESSION['level']."/pages/siswa.php';</script>";

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
                echo "<script>window.alert(\"Data telah masuk.\");
					window.location='".$url."dashboard/".$_SESSION['level']."/pages/siswa.php';</script>";

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($dbConnection);
            }
        }



    }







