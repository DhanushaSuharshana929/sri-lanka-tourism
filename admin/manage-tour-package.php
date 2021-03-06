﻿<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$TOUR_PACKAGE = new TourPackage(NULL);
$tour_packages = NULL;
if (isset($_GET['member'])) {
    $tour_packages = $TOUR_PACKAGE->getTourPackagesByMemberId($_GET['member']);
} else {
    $tour_packages = $TOUR_PACKAGE->all();
}
?> 
﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Manage Tour Package - www.srilankatourism.travel</title>
        <!-- Favicon-->
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- JQuery DataTable Css -->
        <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
        <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
        <!-- Custom Css -->
        <link href="css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="css/themes/all-themes.css" rel="stylesheet" />
    </head>

    <body class="theme-red">
        <?php
        include './navigation-and-header.php';
        ?>
        <section class="content">
            <div class="container-fluid"> 
                <?php
                $vali = new Validator();

                $vali->show_message();
                ?>
                <!-- Manage Tour Package -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Tour Package
                                    <?php
                                    if (isset($_GET['member'])) {
                                        $MEM = new Member($_GET['member']);
                                        echo ': ' . $MEM->name;
                                    }
                                    ?>
                                </h2>
                                <ul class="header-dropdown">
                                    <li>
                                        <a href="create-tour-package.php">
                                            <i class="material-icons">add</i> 
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <!--                                <div class="table-responsive">-->
                                <div>
                                    <div class="row clearfix">
                                        <?php
                                        foreach ($tour_packages as $key => $tour_package) {
                                            if (count($tour_package) > 0) {
                                                ?>
                                                <div class="col-md-3"  id="div<?php echo $tour_package['id']; ?>">
                                                    <div class="photo-img-container">
                                                        <img src="../upload/tour-package/<?php echo $tour_package['picture_name']; ?>" class="img-responsive ">
                                                    </div>
                                                    <div class="img-caption">
                                                        <p class="maxlinetitle">Name : <?php echo $tour_package['name']; ?></p>  
                                                        <p class="maxlinetitle">Price : <?php echo $tour_package['price']; ?></p>  
                                                        <div class="d">
                                                            <a href="#"  class="delete-tour-package" data-id="<?php echo $tour_package['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn"></button></a>
                                                            <a href="edit-tour-package.php?id=<?php echo $tour_package['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn"></button></a>
                                                            <a href="view-tour-sub-section.php?id=<?php echo $tour_package['id']; ?>">  <button class="glyphicon glyphicon-indent-left arrange-btn"></button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            } else {
                                                ?> 
                                                <b style="padding-left: 15px;">No packages in the database.</b> 
                                                <?php
                                            }
                                        }
                                        ?> 

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="plugins/node-waves/waves.js"></script>

        <!-- Jquery DataTable Plugin Js -->
        <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

        <script src="plugins/sweetalert/sweetalert.min.js"></script>
        <!-- Custom Js -->
        <script src="js/admin.js"></script>
        <script src="js/pages/tables/jquery-datatable.js"></script>

        <!-- Demo Js -->
        <script src="js/demo.js"></script>
        <script src="delete/js/tour-package.js" type="text/javascript"></script>
    </body>

</html> 