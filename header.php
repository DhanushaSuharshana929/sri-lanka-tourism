
<header class="main-header"> 
    <div class="container clearfix common-pad">
        <div class="row contact-head">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact-row">
                <div class="contact-detail">
                    <i class="fa fa-phone">
                        <span class="details">0757522415</span>
                    </i>
                    <span class="separate hidden-sm hidden-xs">||</span>
                    <i class="fa fa-envelope-o hidden-sm hidden-xs">
                        <span class="details">srilankatourism.com</span>
                    </i>
                    <?php
                    if (isset($_SESSION["login"])) {
                        ?>
                        <div class="dropdown" style="float: right;">
                            <?php
                            $VISITOR = new Visitor($_SESSION['id']);
                            if (empty($VISITOR->image_name)) {
                                ?>
                                <div class="visitor-login-name">
                                    <?php echo 'Hi ' . $VISITOR->first_name . '..'; ?>
                                </div>
                                <img class="img-circle add-user-logged" id="visitor_pic" src="upload/visitor/member.png" alt="" />
                                <div class="dropdown-content">
                                    <a href="visitor-profile.php">
                                        <i class="fa fa-user"></i>
                                        My profile
                                    </a>
                                    <a href="post-and-get/logout.php">
                                        <i class="fa fa-power-off"></i>
                                        Log out
                                    </a>
                                </div>
                            </div>
                            <?php
                        } else {
                            if ($VISITOR->facebookID && substr($VISITOR->image_name, 0, 5) === "https") {
                                ?>

                                <div class="visitor-login-name">
                                    <?php echo 'Hi ' . $VISITOR->first_name . '..'; ?>
                                </div>
                                <img class="img-circle add-user-logged" id="visitor_pic" src="<?php echo $VISITOR->image_name; ?>" alt="" />
                                <div class="dropdown-content">
                                    <a href="visitor-profile.php">
                                        <i class="fa fa-user"></i>
                                        My profile
                                    </a>
                                    <a href="post-and-get/logout.php">
                                        <i class="fa fa-power-off"></i>
                                        Log out
                                    </a>
                                </div>
                            </div>
                        <?php } else {
                            ?>
                            <div class="visitor-login-name">
                                <?php echo 'Hi ' . $VISITOR->first_name . '..'; ?>
                            </div>
                            <img class="img-circle add-user-logged" id="visitor_pic" src="upload/visitor/<?php echo $VISITOR->image_name; ?>" alt="" />
                            <div class="dropdown-content">
                                <a href="visitor-profile.php">
                                    <i class="fa fa-user"></i>
                                    My profile
                                </a>
                                <a href="post-and-get/logout.php">
                                    <i class="fa fa-power-off"></i>
                                    Log out
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="pull-right">
                        <a href="visitor-login.php" ><img class="add-user" src="images/icon/user(1).png" alt="" /></a>
                        <a href="visitor-register.php"><img class="user-t" src="images/icon/user(2).png" alt="" /></a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <hr style="padding-top: -10px !important;">
        <div class=" hidden-sm hidden-xs " >
            <div class="col-md-5 p-o">
                <div class="sec-header sec-header-pad">
                    <a class="head-link-hover" href="index.php">
                        <h2>Sri Lanka Tourism</h2>
                        <h3>Plan your trip to Sri Lanka</h3>
                    </a>
                </div>
            </div>
            <div class="hidden-md hidden-lg">
                <div class="sec-header sec-header-pad">
                    <a class="head-link-hover" href="index.php">
                        <h2>Sri Lanka Tourism</h2>
                        <h3>Plan your trip to Sri Lanka</h3>
                    </a>
                </div>
            </div>
            <div class="col-md-2 ">
                <a href="index.php">
                    <img src="images/logo-intro2.png" alt="image" class="logo" id="logo1"/>  
                </a>
            </div>

            <div class="col-md-3">
                <div class="sec-header sec-header-pad">
                    <ul class="social-icon">
                        <h4>Follow us</h4>
                        <a data-original-title="Facebook" href="#"><i class="fa fa-facebook index-fa-facebook"></i></a>
                        <a data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                        <a data-original-title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                        <a data-original-title="instagram" href="#"><i class="fa fa-instagram"></i></a>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="sec-header sec-header-pad ">
                    <ul>
                        <li> 
                            <a class="head-link-hover" href="member/index.php">
                                <div class="c-button-member-mobile add-your" >
                                    <span>Add Your Business</span>
                                </div>
                            </a>
                        </li>
                    </ul> 
                </div>
            </div>

        </div>
        <div class=" hidden-lg hidden-md visible-sm visible-xs">
            <div class="row">
                <div class=" col-xs-4 col-sm-4 p-o">
                    <a href="index.php">
                        <img src="images/logo-intro2.png" alt="image" class="logo"/>  
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 p-o">
                    <div class="sec-header sec-header-pad c-sec-header-pad">
                        <a class="head-link-hover" href="index.php">
                            <h2>Sri Lanka Tourism</h2>
                            <h3>Plan your trip to Sri Lanka</h3>
                        </a>
                        <br>
                        <div class="c-padding">
                            <h4 class="hidden-sm hidden-xs">Follow us</h4>
                            <a data-original-title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                            <a data-original-title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a data-original-title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                            <a data-original-title="instagram" href="#"><i class="fa fa-instagram"></i></a>

                            <a href="member/index.php">
                                <div class="c-button-member-mobile add-your" >
                                    <span>Add Your Business</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




