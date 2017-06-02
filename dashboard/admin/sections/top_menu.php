<?php
    require '../../libs/database.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->

    <?php
        date_default_timezone_set('Asia/Jakarta');
        $currentYear = date('Y');
        $currentMonth = date('m');
        $sql = "SELECT count(*) as total, 
SUM(CASE when waktuKejadian between '".$currentYear."-".$currentMonth."-01' and '".$currentYear."-".$currentMonth."-31' then 1 else 0 end) as kejadianBulan, 
SUM(CASE when jenisKelamin = 'L' then 1 else 0 end) as totalLaki, 
SUM(CASE when jenisKelamin = 'P' then 1 else 0 end) as totalPr FROM pelanggaran_all_time";
    $result = mysqli_query($dbConnection, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="row tile_count">
        <div class="col-md-3 col-sm-6 col-xs-9 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Total Pelanggaran Siswa</span>
            <div class="count"><?php echo $row['total'] ; ?></div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-9 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Pelanggaran Bulan ini</span>
            <div class="count"><?php echo $row['kejadianBulan'] ; ?></div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-9 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Pelanggaran oleh Laki-laki</span>
            <div class="count"><?php echo $row['totalLaki'] ; ?></div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-9 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i> Pelanggar oleh Perempuan</span>
            <div class="count"><?php echo $row['totalPr'] ; ?></div>
        </div>
    </div>
    <!-- /top tiles -->

    <div class="clearfix"></div>
