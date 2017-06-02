<?php 
session_start();

require('../../../config.php');
$url = constant('BASE_URL');
if ($_SESSION['level'] != 'piket') {
    header("Location: " . $url . "dashboard/views/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMPOPEL</title>
      <!-- Include jQuery -->
      <script type="text/javascript" src="../../assets/jquery/dist/jquery.js"></script>
      <!-- moment.js -->
      <script src="../../assets/moment/moment.js"></script>
      <!-- Chart JS -->
      <script src="../../assets/Chart.js/dist/Chart.min.js"></script>

      <!--JQuery auto complete -->
      <script type="text/javascript" src="../../assets/jQuery-Autocomplete/src/jquery.autocomplete.js"></script>
      <!-- Bootstrap -->
      <link href="../../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/bootstrap/bootstrap-iso.css" rel="stylesheet">

      <!--Bootstrap File Upload -->
      <link href="../../assets/bootstrap-fileinput/css/fileinput.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="../../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="../../assets/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="../../assets/iCheck/skins/flat/green.css" rel="stylesheet">

      <!-- bootstrap-progressbar -->
      <link href="../../assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <!-- JQVMap -->
      <link href="../../assets/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
      <!--bootsrap-datepicker -->
      <link href="../../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet">
      <!-- bootstrap-daterangepicker -->
      <link href="../../assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <!-- bootsrap-datetimepicker -->
      <link href="../../assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

      <!-- Custom Theme Style -->
      <link href="../../assets/custom.min.css" rel="stylesheet">
      <!-- Datatables -->
      <link href="../../assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  </head>