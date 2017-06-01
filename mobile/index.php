<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 29/05/2017
 * Time: 16.24
 */

require '../config.php';
$url = constant("BASE_URL");
echo $url;
header("Location: /simpopel/mobile/views/login.php");	