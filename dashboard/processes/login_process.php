<?php  
require '../libs/database.php';
header("Content-Type: application/json; charset=UTF-8");
   $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM tabeluser where username='$username' AND password='$password'";
    $result = mysqli_query($dbConnection, $sql);
    $response = array();
    $data = array();
    $response['success'] = true;
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0){
        	$response['data'] = $row;
         echo json_encode($response);
       
    } else {
    	$response['success'] = false;
    	 echo json_encode($response);
 
  }
