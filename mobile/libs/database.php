<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 28/04/2017
 * Time: 23.19
 */
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'testschool';

	$dbConnection = mysqli_connect($server, $username, $password,$database);
	if(mysqli_connect_errno()){
        echo "Gagal terhubung ke database: " . mysqli_connect_error();
    }
	mysqli_select_db($dbConnection,$database) or die("Database tidak ditemukan." . mysqli_error($dbConnection));