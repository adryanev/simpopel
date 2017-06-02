<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 29/05/2017
 * Time: 14.52
 */

session_start();
require 'config.php';
$url = constant("BASE_URL");
header("Location: ".$url."dashboard/views/login.php");