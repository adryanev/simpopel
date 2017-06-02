<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 04/05/2017
 * Time: 11.43
 */
session_start();
require '../../config.php';
$url = constant("BASE_URL");
require '../libs/database.php';

/*
 * Proses saat memasukkan pelanggaran

 * 1. Dapatkan semua data dari form
 * 2. Jika gambar tidak ada, maka gunakan gambar default
 * 3. masukkan pelanggaran ke tabel pelanggaran
 * 4. tambahkan poin siswa pada tabel siswa
 * 5. jalankan sms gateway ke nomor orang tua
 * 6. Arahkan ke halaman pelanggaran
 */
date_default_timezone_set("Asia/Jakarta");
if(isset($_POST['save'])){

    $nis = $_POST['nis'];
    $getID = mysqli_fetch_assoc(mysqli_query($dbConnection,"SELECT idSiswa, noHp from tabelsiswa where nis = $nis"));
    $idSiswa = $getID['idSiswa'];
    $nama = $_POST['nama'];
    $namaPelanggaran = $_POST['namaPelanggaran'];
    $getIdPeraturan = mysqli_fetch_assoc(mysqli_query($dbConnection,"Select idPeraturan from tabelperaturan where namaPelanggaran like '%".$namaPelanggaran."%'"));
    $idPeraturan = $getIdPeraturan['idPeraturan'];
    $noHp = $getID['noHp'];
    $waktuKejadian = date('Y-m-d h:i:s');
    $pesan = $nama." telah melanggar peraturan. Untuk info lebih lanjut silahkan hubungi: 085210248958" ;
    $foto = $_FILES['foto'];
    $namaFoto = $_FILES['foto']['name'] ? $_FILES['foto']['name']: 'fotopelanggaran.jpg';
    $sql = "Select sanksiPoin from tabelperaturan where idPeraturan = '$idPeraturan'";
    $result = mysqli_fetch_assoc(mysqli_query($dbConnection,$sql));
    $poin = $result['sanksiPoin'];
    if($namaFoto != 'fotopelanggaran.jpg'){
        $errors = array();
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $fileTemp = $_FILES['foto']['tmp_name'];
        $fileType = $_FILES['foto']['type'];

        if(empty($errors) == true){
            move_uploaded_file($fileTemp, "../../images/".$fileName);
            $sql = "INSERT INTO tabelpelanggaran(idSiswa,idPeraturan,waktuKejadian,foto)
VALUES($idSiswa,'$idPeraturan','$waktuKejadian','$namaFoto')";


            if(mysqli_query($dbConnection,$sql)){

                $tambahPoin = mysqli_query($dbConnection,"UPDATE tabelsiswa set totalPoin = totalPoin + $poin WHERE idSiswa = $idSiswa");

                if($tambahPoin){
                    //kirim sms pelanggaran

                    $sql = mysqli_query($dbConnection,"INSERT INTO gammu.outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHp', '$pesan', '$nama')");
                    if($sql){
                        echo "<script> alert(\"Data telah masuk\");
window.location='".$url."mobile/".$_SESSION['level']."/pages/pelanggaran.php';</script>";

                    }


                }

            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
            }
        }
        else{
            print_r($errors);
        }

    }

    else{
        $sql = "INSERT INTO tabelpelanggaran(idSiswa,idPeraturan,waktuKejadian,foto)
VALUES($idSiswa,'$idPeraturan','$waktuKejadian','$namaFoto')";
        $result = mysqli_query($dbConnection,$sql);

        if($result){
            $tambahPoin = mysqli_query($dbConnection,"UPDATE tabelsiswa set totalPoin = totalPoin + $poin WHERE idSiswa = $idSiswa");

            if($tambahPoin){
                //kirim sms pelanggaran
                $sql = mysqli_query($dbConnection,"INSERT INTO gammu.outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$noHp', '$pesan', '$nama')");
                if($sql){
                    echo "<script> alert(\"Data telah masuk\");
window.location='".$url."mobile/".$_SESSION['level']."/pages/pelanggaran.php';</script>";
                    echo "<script>window.alert('Data telah masuk.');
					</script>";

                }
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
        }
    }



}







