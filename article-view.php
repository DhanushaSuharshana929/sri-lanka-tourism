<?php
include_once(dirname(__FILE__) . '/class/include.php');
if (!isset($_SESSION)) {
    session_start();
}
$id = $_GET["id"];


$ARTICLES = new Article($id);
$ARTICLEPHOTOS = new ArticlePhoto(NULL);
$TYPE = new ArticleType($ARTICLES->article_type);
$CITY = new City($ARTICLES->city);
$MEMBER = new Member($ARTICLES->member);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sri Lanka || Tourism</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link href="css/search.css" rel="stylesheet" type="text/css"/>
        <link href="css/datepicker.css" rel="stylesheet" type="text/css"/>
        <!--<link href="css/style.css" rel="stylesheet" type="text/css"/>-->
        <link href="css/responsive-table.css" rel="stylesheet" type="text/css"/>
        <link href="visitor-feedback/validation-styles.css" rel="stylesheet" type="text/css"/>
        <link href="css/comments-style.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Russo+One|Magra|Ubuntu+Condensed" rel="stylesheet"> 
        <link href="css/owl.carousel.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: #fff">
        <!-- Our Resort Values style-->
        <?php
        include './header.php';
        ?>
        <div id="page">
            <div class="page-header page-title-left page-title-pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title hidden-sm hidden-xs"><?php echo $ARTICLES->title; ?></h1> 
                            <ul class="breadcrumb">
                                <li class="banner-bredcum-1">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="active banner-bredcum-2">Articles</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="container transport-container">
            <div class="row">
                <div class="col-md-8">
                    <div id="article_photos" class="galleria-slider">
                        <?php
                        $photos = ArticlePhoto::getArticlePhotosById($id);
                        foreach ($photos as $key => $img) {
                            ?>
                            <a href="upload/article/<?php echo $img['image_name']; ?>">
                                <img src="upload/article/thumb/<?php echo $img['image_name']; ?>" data-title="">
                            </a>
                            <?php
                        }
                        ?>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget-member">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <div class="posted-title">Posted By </div>  
                                    <a href="member-view.php?id=<?php echo $MEMBER->id; ?>" class="link">
                                        <?php
                                        if (empty($MEMBER->profile_picture)) {
                                            ?>
                                            <img src="upload/member/member.png" class="img img-responsive" id="profil_pic"/>
                                            <?php
                                        } else {
                                            if ($MEMBER->facebookID && substr($MEMBER->profile_picture, 0, 5) === "https") {
                                                ?>
                                                <img src="<?php echo $MEMBER->profile_picture; ?>" class="img-responsive">
                                            <?php } else {
                                                ?>
                                                <img src="upload/member/<?php echo $MEMBER->profile_picture; ?>" class="img-responsive">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <ul class="list-group-transport">
                                        <li class="list-group-transport-item"><b>Name</b>  <br><?php echo $MEMBER->name; ?></li> 
                                        <li class="list-group-transport-item"><b>Email</b> <br><?php echo $MEMBER->email; ?></li>
                                        <li class="list-group-transport-item"><b>Contact No</b> <br><?php echo $MEMBER->contact_number; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="jbside">
                        <h3>About This Article</h3>
                        <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-12 col-xs-12 jb-title"><span> <?php echo $ARTICLES->title; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">Article Type</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $TYPE->name; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">City</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $CITY->name; ?></span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-xs-6">Location</div>
                                <div class="col-md-6 col-xs-6"><span><?php echo $ARTICLES->location; ?></span></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="transport-description">
                        <span>
                            <?php echo $ARTICLES->description; ?>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <h2 class="t-comment">Customer Testimonials</h2>
                                <!-- Carousel indicators -->

                                <!--                                <ol class="carousel-indicators">
                                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                                                </ol>   -->


                                <!-- Wrapper for carousel items -->
                                <div class="carousel-inner">
                                    <?php
                                    $FEEDBACK = new Feedback(NULL);
                                    $ARTICLE_FEEDBACKS = $FEEDBACK->getFeedbackByArticleID($id);
                                    $li = '';
                                    foreach ($ARTICLE_FEEDBACKS as $key => $article_feedback) {
                                        $VISITOR = new Visitor($article_feedback['visitor']);
                                        if ($key === 0) {
                                            $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '" class="active">'
                                                    . '</li>';
                                            ?>  
                                            <div class="item carousel-item active">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="testimonial">
                                                            <p><?php echo $article_feedback['description']; ?></p>
                                                        </div>
                                                        <div class="media">
                                                            <div class="media-left d-flex mr-3">
                                                                <img src="upload/visitor/<?php echo $VISITOR->image_name ?>" alt=""/>										
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="overview">
                                                                    <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></b></div>
                                                                    <div class="details"><?php echo $article_feedback['title']; ?></div>
                                                                    <div class="star-rating-t">
                                                                        <ul class="list-inline">
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>										
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>			
                                            </div>
                                            <?php
                                        } else {
                                            $li .= ' <li data-target="#myCarousel" data-slide-to="' . $key . '">'
                                                    . '</li>';
                                            ?>
                                            <div class="item carousel-item">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="testimonial">
                                                            <p><?php echo $article_feedback['description']; ?></p>
                                                        </div>
                                                        <div class="media">
                                                            <div class="media-left d-flex mr-3">
                                                                <img src="upload/visitor/<?php echo $VISITOR->image_name ?>" alt=""/>										
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="overview">
                                                                    <div class="name"><b><?php echo $VISITOR->first_name . ' ' . $VISITOR->second_name ?></b></div>
                                                                    <div class="details"><?php echo $article_feedback['title']; ?></div>
                                                                    <div class="star-rating-t">
                                                                        <ul class="list-inline">
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                                            <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>										
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>			
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Carousel controls -->
                                <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                                <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                                    <i class="fa fa-chevron-right"></i>
                                </a>
                                <div class="text-center">
                                    <button type="submit" id="btn-add-comment" class="btn btn-info btn-position-rel">
                                        <i class="fa fa-plus"></i>  Add Your Comment
                                    </button>
                                </div>
                                <?php
                                include './add-feedback.php';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row top-margin-30">
                <hr>
                <div class="col-md-12">
                    <p class="subtitle-more more-t"><span>More Articles</span></p>

                    <div class="owl-carousel tour-slider" id="transport-carousel">
                        <?php
                        $ARTICLE = Article::all();
                        foreach ($ARTICLE as $article) {
                            $article_type = new ArticleType($article['article_type']);
                            $city = new ArticleType($article['city']);
                            $article_photos = $ARTICLEPHOTOS->getArticlePhotosById($article['id']);
                            ?>
                            <div  class="index-transport-container" style="background-color: #ececec;">
                                <?php
                                foreach ($article_photos as $key => $article_photo) {


                                    if ($key == 0) {
                                        ?>
                                        <a href="article-view.php?id=<?php echo $article['id']; ?>">
                                            <span class="price">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <img src="upload/article/thumb/<?php echo $article_photo['image_name'] ?>" alt=""/>
                                        </a>

                                        <?php
                                    }
                                }
                                ?>
                                <!--                                        <div class="transport-heading"></div>-->
                                <div class="transport-bot-container">  
                                    <a href="article-view.php?id=<?php echo $article['id']; ?>">
                                        <div class="transport-bot-title"> <?php
                                            echo substr($article['title'], 0, 23);
                                            if (strlen($article['title']) > 23) {
                                                echo '...';
                                            }
                                            ?>
                                        </div>
                                        <div class="article-options-bottom">
                                            <div class="vehicle-options-heading">Article Type : <?php echo $article_type->name; ?></div>
                                            <div class="vehicle-options-heading">City :  <?php echo $city->name; ?></div>
                                            <div class="vehicle-options-heading">Location : <?php echo $article['location']; ?></div>
                                        </div>
                                    </a>
                                    <div class="read_more">
                                        <a href="article-view.php?id=<?php echo $article['id']; ?>" class="read_more_button">View More
                                            <i class="fa fa-long-arrow-right"></i></a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>


                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>

        <?php
        include './footer.php';
        ?>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider.js" type="text/javascript"></script>
        <link href="galleria/themes/classic/galleria.classic.css" rel="stylesheet" type="text/css"/>
        <script src="js/galleria.js" type="text/javascript"></script>
        <script src="js/galleria.classic.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $('#article_photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true,

                //                imageCrop: true,
            });
        </script>
        <script>
            jQuery(document).ready(function () {
                jQuery('#btn-add-comment').click(function () {
                    jQuery("#myModalarticle").modal('show');
                });

            });


            jQuery('#create').click(function (event) {

                event.preventDefault();

                var captchacode = jQuery('#captchacode').val();

                jQuery.ajax({
                    url: "visitor-feedback/captchacode.php",
                    cache: false,
                    dataType: "json",
                    type: "POST",
                    data: {
                        captchacode: captchacode

                    },
                    success: function (html) {
                        var status = html.status;
                        var msg = html.msg;

                        if (status == "incorrect") {

                            jQuery("#capspan").addClass("notvalidated");
                            jQuery("#capspan").html(msg);
                            jQuery("#capspan").show();
                            jQuery("#capspan").fadeOut(2000);

                        } else if (status == "correct") {
                            jQuery('#client-comment').submit();
                        }
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                $('#transport-carousel').owlCarousel({

                    loop: true,
                    margin: 10,
                    responsiveClass: true,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: true
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: true
                        }
                    }
                });
            });
        </script>
    </body> 

</html>