<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$TRANSPORTS = new Transports($id);
?> 
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Transports Rates || My Account || www.srilankatourism.travel</title>

        <!-- Bootstrap core CSS -->
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
                        <div class="row  top-bott20"> 
                            <?php
                            $vali = new Validator();
                            $vali->show_message();
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"><i class="fa fa-save"></i> Create Transport Rates</div>
                                <div class="panel-body">
                                    <div class="body">
                                        <div class="userccount">
                                            <div class="formpanel"> 
                                                <form class="form-horizontal"  method="post" action="post-and-get/transport-rate.php" enctype="multipart/form-data"> 
                                                    <div class="col-md-12">

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="location_from">Location From</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="location_from" autocomplete="off" name="location_from" required="TRUE">
                                                                    <option value=""> -- Please Select -- </option>
                                                                    <?php foreach (City::all() as $key => $location_from) {
                                                                        ?>
                                                                        <option value="<?php echo $location_from['id']; ?>"><?php echo $location_from['name']; ?></option><?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="location_to">Location To</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <select class="form-control place-select1 show-tick" autocomplete="off" type="text" id="location_to" autocomplete="off" name="location_to" required="TRUE">
                                                                    <option value=""> -- Please Select -- </option>
                                                                    <?php foreach (City::all() as $key => $location_to) {
                                                                        ?>
                                                                        <option value="<?php echo $location_to['id']; ?>"><?php echo $location_to['name']; ?></option><?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="distance">Distance</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <div class="form-line">
                                                                    <input type="text" id="price" class="form-control" placeholder="Enter Distance" autocomplete="off" name="distance" required="true">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <div class="bottom-top">
                                                                <label for="price">Price</label>
                                                            </div>
                                                            <div class="formrow">
                                                                <div class="form-line">
                                                                    <input type="text" id="price" class="form-control" placeholder="Enter Price" autocomplete="off" name="price" required="true">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="top-bott50">
                                                            <div class="bottom-top">
                                                                <input type="hidden" id="id" class="form-control" placeholder="Enter id" autocomplete="off" name="id" required="true">
                                                                <input type="hidden" id="member" name="member" value="<?php echo $_SESSION['id']; ?>"/>
                                                                <input type="hidden" id="id" value="<?php echo $TRANSPORTS->id; ?>" name="id"/>
                                                                <input type="hidden" value="<?php echo $id ?>" name="id" />
                                                                <button name="add-transport-rate" type="submit" class="btn btn-info center-block">Create</button>
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                </form>  
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <div>
                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>From</th>
                                                                <th>To</th> 
                                                                <th>Distance</th>
                                                                <th>Price</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>From</th>
                                                                <th>To</th> 
                                                                <th>Distance</th>
                                                                <th>Price</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            <?php
                                                            $TRANSPORT_RATES = TransportRates::GetTransportRatesByTransportId($id);
                                                            if (count($TRANSPORT_RATES) > 0) {
                                                                foreach ($TRANSPORT_RATES as $key => $transport_rates) {
                                                                    ?>
                                                                    <tr id="row_<?php echo $transport_rates['id']; ?>">
                                                                        <td><?php echo $transport_rates['sort']; ?></td> 
                                                                        <td>
                                                                            <?php
                                                                            $city = new City($transport_rates['location_from']);
                                                                            echo $city->name;
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $CITY = new City($transport_rates['location_to']);
                                                                            echo $CITY->name;
                                                                            ?>
                                                                        </td>
                                                                        <td><?php echo $transport_rates['distance']; ?> Km</td>
                                                                        <td class="text-right"> $ <?php echo $transport_rates['price']; ?>.00</td>
                                                                        <td> 
                                                                            <a href="#"> 
                                                                                <button class="btn btn-danger btn-sm all-icon fa fa-trash-o delete-transport-rates" data-id="<?php echo $transport_rates['id']; ?>"></button>
                                                                            </a> |

                                                                            <a href="edit-transport-rate.php?id=<?php echo $transport_rates['id']; ?>">
                                                                                <button class="btn btn-primary btn-sm all-icon fa fa-pencil"></button>
                                                                            </a> 

                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                            } else {
                                                                ?> 
                                                            <b style="padding-left: 15px;">No Transports Rates in the database.</b> 
                                                        <?php } ?> 
                                                        </tbody>
                                                    </table>
                                                    <div class="text-right">
                                                        <a href="add-transport-photo.php?id=<?php echo $TRANSPORTS->id; ?>"> 
                                                            <button type="button" class="btn btn-round btn-info">Add Transport Image</button>
                                                        </a>
                                                    </div>
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
        <script src="delete/js/transport-rate.js" type="text/javascript"></script>
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
