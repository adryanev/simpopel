<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 29/05/2017
 * Time: 16.11
 */
session_start();
require '../../config.php';
$url = constant('BASE_URL');

unset($_SESSION['level']);
unset($_SESSION['id']);
unset($_SESSION['nama']);
$_SESSION = array();

session_unset();
session_destroy();

header("Location: ".$url."/mobile/views/login.php");