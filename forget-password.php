<!DOCTYPE html>
<?php
include './class/include.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="css/visitor-custom.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
    </head>
    <body style="background-color: #d7d7d7;">
        <!-- Our Resort Values style-->
        <?php include './header.php' ?>

        <div id="login-page">
            <div class="container">

                <div class="form-login">
                    <h2 class="form-login-heading"> Forgotten Password?</h2>
                    <div class="login-wrap">
                        <?php
                        if (isset($_GET['message'])) {
                            $message = new Message($_GET['message']);
                            ?>
                            <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>

                            <?php
                        }
                        ?>
                        <form action="post-and-get/send-reset-email.php" method="POST">
                            <input type="text" class="form-control" name="email" placeholder="Your Email" autofocus>
                            <br>
                            <button class="btn btn-theme btn-block"  value="Send" name="send" type="submit"><i class="fa fa-lock"></i> SEND EMAIL</button>
                            <hr class="hr">
                        </form>
                        <div class="login-social-link centered">
                            <p class="font-padding">or you can sign in via your social network</p>
                            <button class="fb btn btn-facebook social-log-buttons-1" id="fb-login" type="submit"><i class="fa fa-facebook font-fb"></i> Facebook</button>
                            <button class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                            <button class="btn btn-danger social-log-buttons-1" type="submit"><i class="fa fa-google-plus"></i> Google</button>
                        </div>
                        <hr class="hr">
                        <div class="registration">
                            <p class="font-padding">Don't have an account yet?</p>
                            <label class="checkbox">
                                <a class="link" href="visitor-register.php"> Create an account</a>

                            </label>
                        </div>

                    </div>
                    <div>	  

                    </div>
                </div>
            </div>
        </div>



        <!--
                <div class="container" style="width:350px; padding: 20px">
                    <div class="col-md-12 col-sm-12 center-all">
                        <div class="tab-content">
                            <div class="row">
                                <form class="form-horizontal form-login"  method="post" action="post-and-get/send-reset-email.php" enctype="multipart/form-data"> 
        
                                    <div class="modal-content">
        
                                        <div class="modal-header">
                                            <a href="#"><button type="button" class="close">&times;</button></a>
                                            <h4 class="modal-title">Forget Password</h4>
                                        </div>
                                        <div class="modal-body">
        <?php
        if (isset($_GET['message'])) {
            $message = new Message($_GET['message']);
            ?>
                                                        <div class="alert alert-<?php echo $message->status; ?>"><?php echo $message->description; ?></div>
        <?php }
        ?>
        
                                            <div>
                                                <input type="email" class="form-control" >
                                                <br>
                                            </div>
        
                                            <div class="modal-footer">
                                                <input class="btn btn-theme" type="submit" value="Send" name="send">
                                            </div>
        
                                        </div>
                                    </div>
        
                                </form>
        
        
                            </div>
                        </div>
                    </div>
                </div>-->

        <!-- Our Resort Values style-->  
        <?php include './footer.php' ?>

        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="js/fb-login-scripts.js" type="text/javascript"></script>
    </body> 
</html>
