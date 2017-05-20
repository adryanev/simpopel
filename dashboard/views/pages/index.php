<?php

require '../sections/header.php';
require '../sections/sidebar.php';
require '../sections/top_navigation.php';
require '../sections/top_menu.php';
require '../../libs/database.php';
?>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h3>Top 10 <small> Siswa dengan point terbanyak </small></h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="row">

                    <?php
                    $sql = "SELECT idSiswa, nama, totalPoin, pasFoto FROM tabelsiswa ORDER BY totalPoin DESC LIMIT 10";
                    $result = mysqli_query($dbConnection, $sql);


                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                          echo "<div class=\"col-md-55\">";
                          echo "<div class=\"thumbnail\">";
                          echo "<div class=\"image view view-first\">";
                          echo"<img style=\"width: 100%; display: block;\" src=\"../../../images/".$row['pasFoto']."\" alt=\"image\" />";
                          echo "<div class=\"mask\">";
                          echo "<p>Point :  ".$row['totalPoin']."</p>";
                          echo "<div class=\"tools tools-bottom\">";
                          echo "<a href=\"edit_form.html\"><i class=\"fa fa-pencil\"></i></a>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                          echo "<div class=\"caption\">";
                          echo "<p><a href=\"profile.php?id=".$row['idSiswa']."\"> <strong>".$row['nama']."</strong></a></p>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                        }
                      } else {
                        echo "0 results";
                      }

                      mysqli_close($dbConnection);
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
include '../sections/footer.php';
?>
