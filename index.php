<?php
/**
 * Created by PhpStorm.
 * User: adryanev
 * Date: 29/05/2017
 * Time: 14.52
 */

session_start();
require 'config.php';

header("Location: ".BASE_URL."views/login.php");