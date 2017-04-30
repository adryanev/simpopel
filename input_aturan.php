<?php 
require 'database.php';

$idPeraturan = $_POST['idPeraturan'];
$namaPelanggaran = $_POST['namaPelanggaran'];
$jenisPelanggaran = $_POST['jenisPelanggaran'];
$sanksiPoin = $_POST['sanksiPoin'];


$query = "INSERT INTO tabelPeraturan(idPeraturan, namaPelanggaran, jenisPelanggaran, sanksiPoin) VALUES('$idPeraturan', '$namaPelanggaran.', $jenisPelanggaran, $sanksiPoin)";


if (mysqli_query($dbConnection, $query)) {
    
    echo "<script>window.alert('Data telah masuk.');
					window.location='input_peraturan.html'</script>";
			
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($dbConnection);
}
