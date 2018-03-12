<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$ACCOMODATION = new Accommodation(NULL);

$accommodations = $ACCOMODATION->getAccommodationByMemberId($_SESSION['id']);

$ACCOMODATION_PHOTO = new AccommodationPhoto(NULL);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Manage Accommodation || My Account ||  www.srilankatourism.travel</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <style>
            .img-thumbnail {
                max-width: 50% !important;
            }
        </style>
    </head> 
    <body> 
        <section id="container" > 
            <?php
            include './header-nav.php';
            ?>
            <!--main content start-->
            <section id="main-content">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="top-bott20"> 
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-pencil"></i> Manage Accommodation</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <div class="row clearfix">
                                                    <?php
                                                    foreach ($accommodations as $key => $accommodation) {
                                                        ?>
                                                        <div class="col-md-4 style-transport" id="div_<?php echo $accommodation['id']; ?>">
                                                            <div><?php echo $accommodation['id']; ?></div>
                                                            <div class="">
                                                                <?php
                                                                if (count($ACCOMODATION_PHOTO) > 0) {
                                                                    foreach ($ACCOMODATION_PHOTO->getAccommodationPhotosById($accommodation['id']) as $key => $accommodation_p) {
                                                                        if ($key == 1) {
                                                                            break;
                                                                        }
                                                                        ?>
                                                                        <img class="img-responsive" src="../upload/accommodation/thumb/<?php echo $accommodation_p['image_name']; ?>">
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?> 
                                                                    <b style="padding-left: 15px;">No Accommodation Image.</b> 
                                                                <?php } ?>
                                                            </div> 


                                                            <div><b>Title :</b> <?php echo $accommodation['name']; ?></div>
                                                            <div>

                                                                <a href="edit-accommodation.php?id=<?php echo $accommodation['id']; ?>"><button class="btn btn-primary btn-xs fa fa-pencil"></button>
                                                                </a> 
                                                                |
                                                                <a>
                                                                    <button class="delete-accommodation btn btn-danger btn-xs fa fa-trash-o" data-id="<?php echo $accommodation['id']; ?>"></button>
                                                                </a> 
                                                                |
                                                                <a href="add-accommodation-photo.php?id=<?php echo $accommodation['id']; ?>">
                                                                    <button class="btn btn-success btn-xs fa fa-photo"></button>
                                                                </a> 
                                                                |
                                                                <a href="accommodation-facilities.php?id=<?php echo $accommodation['id']; ?>">
                                                                    <button class="btn btn-warning btn-xs fa fa-check-square"></button>
                                                                </a> 
                                                                |
                                                                <a href="accommodation-room.php?id=<?php echo $accommodation['id']; ?>">
                                                                    <button class="btn btn-facebook btn-xs fa fa-adn"></button>
                                                                </a> 
                                                                |
                                                                <a href="manage-room.php?id=<?php echo $accommodation['id']; ?>">
                                                                    <button class="btn btn-facebook btn-xs fa fa-bank"></button>
                                                                </a> 
                                                            </div>

                                                        </div>
                                                        <?php
                                                    }
                                                    ?> 
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>

            <?php
            include './footer.php';
            ?>
        </section>

        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/common-scripts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="assets/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

        <script src="delete/js/accommmodation.js" type="text/javascript"></script>
        <script>
            //custom select box

            $(function () {
                $('select.styled').customSelect();
            });

        </script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: "#description",
                // ===========================================
                // INCLUDE THE PLUGIN
                // ===========================================

                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste"
                ],
                // ===========================================
                // PUT PLUGIN'S BUTTON on the toolbar
                // ===========================================

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                // ===========================================
                // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                // ===========================================

                relative_urls: false

            });
        </script>
    </body>

</html>
