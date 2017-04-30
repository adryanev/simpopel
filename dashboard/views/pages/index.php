<?php
/**
 * Created by IntelliJ IDEA.
 * User: adryanev
 * Date: 30/04/2017
 * Time: 18.14
 */
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
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-55">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;" src="../../images/media.jpg" alt="image" />
                                <div class="mask">
                                    <p>Total Point</p>
                                    <div class="tools tools-bottom">
                                        <a href="edit_form.html"><i class="fa fa-pencil"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong>Nama Siswa</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /page content -->
<?php
include '../sections/footer.php';
?>
