<?php
include_once(dirname(__FILE__) . '/class/include.php');
$id = $_GET["id"];
$VIEW_ACCOMMODATIONS = new Accommodation($id);
$ACCOMMODATIONS = new Accommodation($id);
$ACCOMMODATION_PHOTO = new AccommodationPhoto(NULL);
$ROOM_VIEW = new RoomFacility($id);
$ROOM_PHOTO = new RoomPhoto(NULL);
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
        <style>

            .hp-section {} .hp-section {
                position: relative;
                overflow: hidden;
                margin-bottom: 50px;
            }
            .hp-sub-tit {
                position: relative;
                overflow: hidden;
                margin-bottom: 30px;
                border-bottom: 1px solid #dfd2bf;
            }
            .hp-sub-tit h4 {
                margin-top: 0px;
                font-size: 24px;
                margin-bottom: 15px;
            }
            .hp-sub-tit h4 span {
                font-family: 'Quicksand', sans-serif;
                color: #8a6e35;
                font-size: 24px;
            }
            .hp-sub-tit p {} .hp-amini {} .hp-amini ul {
                margin-bottom: 0px;
            }
            .hp-amini ul li {
                color: #333;
                display: block;
                position: relative;
                margin: 0 10px 10px 0;
                padding: 15px 15px 12px;
                float: left;
                width: 18%;
                text-align: center;
                border: 1px solid #dfd2bf;
                text-overflow: ellipsis;
                overflow: hidden;
                white-space: nowrap;
                border-radius: 2px;
            }
            .hp-amini ul li:hover{
                background: #dad2c2;	
            }
            .hp-amini ul li img {
                margin: 0 auto;
                display: table;
                width: 45px;
                margin-bottom: 15px;
            }
            .hp-call {} .hp-right-com {
                padding: 30px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #dfd2bf;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
                background-color: #ffffff;
                border-radius: 2px;
                text-align: center;
                position: relative;
                overflow: hidden;
            }
            .hp-call-in img {
                margin: 0 auto;
                display: table;
                width: 85px;
                margin-bottom: 15px;
                background: #ffffff;
                padding: 20px;
                border-radius: 60px;
                border: 1px solid #dfd2bf;
            }
            .hp-call-in h3 {
                font-weight: 700;
                text-transform: uppercase;
                font-size: 32px;
                margin-bottom: 15px;
            }
            .hp-call-in h3 span {
                display: block;
                opacity: 0.8;
                line-height: 1.2;
                font-size: 14px;
                color: #a2783e;
            }
            .hp-call-in small {
                font-size: 14px;
                color: #727070;
            }
            .hp-call-in a {
                display: block;
                background: #f91942;
                border-radius: 2px;
                color: #fff;
                padding: 15px;
                margin-top: 15px;
                text-transform: uppercase;
                font-weight: 700;
            }
            .hp-book-in {} .like-button {
                background-color: #fafafa;
                border: 1px solid #ddd;
                color: #444;
                font-weight: 600;
                font-size: 14px;
                background-color: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 50px;
                padding: 10px 25px;
                line-height: 24px;
                transition: 0.3s;
                cursor: pointer;
                display: block;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            .like-button i {
                color: #f3103c;
                font-weight: 500;
                /* float: left; */

                width: 20px;
                margin-right: 8px;
                font-size: 16px;
            }
            .hp-book-in ul {
                margin-bottom: 0px;
                margin-top: 20px;
                position: relative;
                overflow: hidden;
            }
            .hp-book-in ul li {
                float: left;
                margin: 0px 2px;
                /* width: 32%; */
            }
            .hp-book-in ul li a {
                border: 1px solid #bfbfbf;
                border-radius: 50px;
                font-weight: 500;
                font-size: 13px;
                padding: 7px 18px;
                transition: 0.3s;
                display: inline-block;
                line-height: 17px;
                font-weight: 500;
                color: #fff;
            }
            .hp-book-in ul li:nth-child(1) a {
                border: 1px solid #254384;
                background: #3b5998;
            }
            .hp-book-in ul li:nth-child(2) a {
                border: 1px solid #1684c7;
                background: #1da1f2;
            }
            .hp-book-in ul li:nth-child(3) a {
                border: 1px solid #bf3929;
                background: #dd4b39;
            }
            .hp-book-in ul li a i {} .hp-main-overview {} .hp-main-overview ul {
                margin-bottom: 0px;
            }
            .hp-main-overview ul li {
                border-bottom: 1px solid #ddd;
                line-height: 40px;
                font-weight: 600;
                font-family: 'Quicksand', sans-serif;
                font-size: 15px;
                background: url('../images/checked.png') no-repeat left center;
                background-size: 14px;
                padding-left: 35px;
                padding-right: 35px;
                color: #2a2b33;
            }
            .hp-main-overview ul li span {
                float: right;
                /* padding-left: 44px; */

                color: #949494;
                font-weight: 500;
            }
            .hp-ov-fac {} .hp-ov-fac img {
                width: 100%;
            }
            .hp-over-nav {} .hp-over-nav li img {
                width: 20px;
                margin-right: 4px;
            }
            .hp-over-nav li a {
                color: #444c54;
                font-size: 16px;
                font-weight: 600;
                font-family: 'Quicksand', sans-serif;
                color: #8a6e35;
            }
            .hp-over-nav li a span{
                color: #2a2b33;	
            }
            .hp-card-in {} .hp-card-in h3 {
                margin-top: 0px;
            }
            .hp-card-in img {
                margin-top: 10px;
            }
            .ov-yes {
                background: #4CAF50;
                /* margin-top: 11px; */
                margin: 5px;
                padding: 1px;
                width: 50px;
                height: 25px;
                text-align: center;
                line-height: 23px;
                border: 1px solid #3c9840;
                color: #fff !important;
                border-radius: 25px;
            }
            .site-map {} .site-map-inn {
                float: left;
                width: 20%;
            }
            .site-map-inn h4 {
                margin-bottom: 25px;
            }
            .site-map-inn ul {
                margin-bottom: 0px;
            }
            .site-map-inn ul li {
                line-height: 30px;
            }
            .site-map-inn ul li a {
                color: #9a9a9a;
                text-transform: capitalize;
            }
            .tab-space {
                padding: 30px 0px;
            }
            .hp-banner {} .hp-banner img {
                width: 100%;
            }
            .check-available {
                background: #2a2b33;
                box-shadow: 0px -5px 32px 9px rgba(0, 0, 0, 0.56);
            }
            .check-available form {
                border: 0px;
                box-shadow: none;
            }
            .avail-title {} .avail-title h4 {
                color: #fff;
                margin: 0px;
                padding-bottom: 5px;
                text-transform: uppercase;
            }

            /*-------------------------------------------------------*/
            /*  USER REVIEWS
            /*-------------------------------------------------------*/

            .hp-review {
                position: relative;
                overflow: hidden;
            }
            .hp-review-rat {
                position: relative;
                overflow: hidden;
                border-top: 1px solid #e2e2e2;
                margin-top: 20px;
                padding-top: 20px;
            }
            .hp-review-left {
                float: left;
                width: 40%;
                border-right: 4px solid #6b7f8a;
                padding-right: 20px;
            }
            .hp-review-left-1 {
                float: left;
                width: 100%;
            }
            .hp-review-left-2 {
                /* float: left; */
                /* width: 50%; */
            }
            .hp-review-left-11 {
                float: left;
                width: 50%;
                font-size: 13px;
                padding-right: 14px;
                color: #636363;
                font-family: 'Montserrat', sans-serif;
            }
            .hp-review-left-12 {
                float: left;
                width: 50%;
                height: 6px;
                background: #dadada;
                margin-top: 7px;
                border-radius: 0px;
            }
            .hp-review-left-13 {
                width: 100%;
                background: #43a047;
                height: 6px;
                border-radius: 0px;
            }
            .hp-review-left-Good {
                width: 50%;
                background: #73ca14;
            }
            .hp-review-left-satis {
                width: 18%;
                background: #3dbbd0;
            }
            .hp-review-left-below {
                width: 20%;
                background: #ca7224;
            }
            .hp-review-left-poor {
                width: 5%;
                background: #de382c;
            }
            .hp-review-right {
                float: left;
                /*                width: 60%;
                                padding: 2px 20px;*/
            }
            .hp-review-right h5 {
                font-family: 'Montserrat', sans-serif;
                font-weight: 500;
                font-size: 18px;
                padding-bottom: 20px;
                margin: 0px;
            }
            .hp-review-right p {} .hp-review-right p span {
                background: #c7a354;
                font-size: 34px;
                color: #fff;
                font-weight: 600;
                padding: 8px;
                border-radius: 5px;
                vertical-align: sub;
                margin-right: 15px;
            }
            .hp-review-right p span i {
                font-size: 20px;
                vertical-align: text-top;
            }
            .hp-review-rat {} .hp-review-rat h5 {
                padding: 15px 0px 5px 0px;
                background: #fff;
                font-family: 'Montserrat', sans-serif;
                font-weight: 500;
                font-size: 18px;
                text-transform: uppercase;
            }
            .hp-review-rat ul {
                margin-bottom: 0px;
            }
            .hp-review-rat ul li {
                position: relative;
                overflow: hidden;
                border-bottom: 1px solid #e2e2e2;
                padding-top: 15px;
                padding-bottom: 5px;
            }
            .lp-ur-all-rat {
                position: relative;
                overflow: hidden;
            }
            .lp-ur-all-left {
                float: left;
                width: 40%;
                border-right: 4px solid #6b7f8a;
                padding-right: 20px;
            }
            .lp-ur-all-left-1 {
                float: left;
                width: 100%;
            }
            .lp-ur-all-left-2 {
                /* float: left; */
                /* width: 50%; */
            }
            .lp-ur-all-left-11 {
                float: left;
                width: 50%;
                font-size: 13px;
                padding-right: 14px;
                color: #636363;
                font-family: 'Montserrat', sans-serif;
            }
            .lp-ur-all-left-12 {
                float: left;
                width: 50%;
                height: 6px;
                background: #dadada;
                margin-top: 7px;
                border-radius: 0px;
            }
            .lp-ur-all-left-13 {
                width: 100%;
                background: #43a047;
                height: 6px;
                border-radius: 0px;
            }
            .lp-ur-all-left-Good {
                width: 50%;
                background: #73ca14;
            }
            .lp-ur-all-left-satis {
                width: 18%;
                background: #3dbbd0;
            }
            .lp-ur-all-left-below {
                width: 20%;
                background: #ca7224;
            }
            .lp-ur-all-left-poor {
                width: 5%;
                background: #de382c;
            }
            .lp-ur-all-right {
                float: left;
                width: 60%;
                padding: 2px 20px;
            }
            .lp-ur-all-right h5 {
                font-family: 'Montserrat', sans-serif;
                font-weight: 500;
                font-size: 18px;
                padding-bottom: 20px;
            }
            .lp-ur-all-right p {} .lp-ur-all-right p span {
                background: #55bf15;
                font-size: 34px;
                color: #fff;
                font-weight: 600;
                padding: 8px;
                border-radius: 5px;
                vertical-align: sub;
                margin-right: 15px;
            }
            .lp-ur-all-right p span i {
                font-size: 20px;
                vertical-align: text-top;
            }
            .lp-ur-all-rat {} .lp-ur-all-rat h5 {
                padding: 15px 0px 5px 0px;
                background: #fff;
                font-family: 'Montserrat', sans-serif;
                font-weight: 500;
                font-size: 18px;
                text-transform: uppercase;
            }
            .lp-ur-all-rat ul {
                margin-bottom: 0px;
            }
            .lp-ur-all-rat ul li {
                position: relative;
                overflow: hidden;
                border-bottom: 1px solid #e2e2e2;
                padding-top: 15px;
                padding-bottom: 5px;
            }
            .lr-user-wr-img {
                float: left;
                /* width: 10%; */

                display: inline-block;
            }
            .lr-user-wr-img img {
                width: 42px;
            }
            .lr-user-wr-con {
                float: left;
                width: 90%;
                display: inline-block;
                padding: 0px 20px;
            }
            .lr-user-wr-con h6 {
                line-height: 36px;
                font-size: 18px;
                margin: 0px;
            }
            .lr-user-wr-con p {
                font-size: 14px;
            }
            .lr-revi-date {
                font-size: 13px;
                color: #828282;
            }
            .lr-user-wr-con h6 span {
                background: #c7a354;
                font-size: 15px;
                color: #fff;
                font-weight: 600;
                padding: 4px 4px;
                border-radius: 4px;
                vertical-align: top;
                margin-left: 6px;
            }
            .lr-user-wr-con h6 span i {
                font-size: 10px;
                vertical-align: text-top;
            }
            .lr-user-wr-con ul {
                padding: 0px;
                position: relative;
                overflow: hidden;
            }
            .lr-user-wr-con ul li {
                list-style-type: none;
                display: inline-block;
                padding-right: 15px;
                padding-top: 0px;
                border: 0px;
            }
            .lr-user-wr-con ul li a {
                color: #333;
                font-size: 14px;
            }
            .lr-user-wr-con ul li a span {
                padding-right: 7px;
                color: #888;
                font-size: 12px;
            }
            .lr-user-wr-con ul li a i {} .list-pg-write-rev {
                position: relative;
                overflow: hidden;
            }
            .wr-re-btn {
                background: #f4364f;
                padding: 12px 25px;
                color: #fff;
                /* text-transform: uppercase; */

                font-weight: 600;
                font-family: 'Quicksand', sans-serif;
                border-radius: 50px;
                font-size: 18px;
                margin-top: 20px;
            }

            .room-soc-share {} .room-soc-share ul {
                margin-bottom: 0px;
            }
            .room-soc-share ul li {
                float: left;
                display: inline-block;
            }
            .room-soc-share ul li a {
                color: #fff;
                padding: 8px 12px;
                text-align: center;
                border-radius: 2px;
                background: #333;
                margin: 2px;
                font-size: 13px;
            }
            .room-soc-share ul li:nth-child(1) a {
                background: #3b5998;
            }
            .room-soc-share ul li:nth-child(2) a {
                background: #dd4b39;
            }
            .room-soc-share ul li:nth-child(3) a {
                background: #55acee;
            }
            .room-soc-share ul li:nth-child(4) a {
                background: #0077b5;
            }
            .room-soc-share ul li:nth-child(5) a {
                background: #3ead19;
            }
            .room-soc-share ul li a i {} .detail-title {
                position: relative;
                overflow: hidden;
                margin-bottom: 18px;
            }
            .room-photo-all {
                position: relative;
                overflow: hidden;
            }
            .room-photo {
                padding: 0px !important;
            }
            .room-photo-gal {
                margin: 0px 5px 5px 0px;
            }
            .room-photo-gal img {
                padding: 10px;
            }
            .typo-com {} .typo-com input {
                border: 1px solid #dfdfdf;
                padding: 8px;
                box-sizing: border-box;
                height: 45px;
                border-radius: 2px;
                background: #fff;
            }
            .typo-com textarea {
                border: 1px solid #dfdfdf;
                padding: 8px;
                box-sizing: border-box;
                height: 100px;
                border-radius: 2px;
                background: #fff;
            }
            .typo-com label {
                padding: 8px;
                left: 10px;
                color: #7f7f7f;
                font-size: 14px;
                top: 6px;
            }
            .form-ch-box label {
                padding: 1px 33px;
                left: 5px;
                color: #7f7f7f;
                font-size: 14px;
                top: 12px;
            }
            .alert {
                font-size: 14px;
            }
            .res-menu {
                position: relative;
                overflow: hidden;
                border-bottom: 1px solid #ece5d3;
                margin-bottom: 15px;
                margin: 15px;
                padding-bottom: 15px;
            }
            .res-menu:hover.res-menu h3 span {
                background: #dba714;
                color: #fff;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }
            .res-menu img {
                float: left;
                width: 55px;
                margin-right: 25px;
            }
            .res-menu h3 span {
                float: right;
                font-size: 20px;
                color: #dba714;
                border: 1px solid #dba714;
                padding: 3px;
                border-radius: 2px;
                font-family: 'Quicksand', sans-serif;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }
            .res-menu h3 {
                margin-top: 0px;
                margin-bottom: 0px;
                color: #000
            }
            .menu-item {}
            .accommodation-container{
                padding-top: 38px;
                padding-bottom: 26px;
            }

        </style>
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
                            <h1 class="title hidden-sm hidden-xs">cdf</h1> 
                            <ul class="breadcrumb">
                                <li class="banner-bredcum-1">
                                    <a href="index.php">Home</a>
                                </li> 
                                <li class="active banner-bredcum-2">Transports</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="container transport-container">
            <div class="row">
                <div class="col-md-8">
                    <div id="accommodation_photos" class="galleria-slider">
                        <?php
                        $VIEW_ACCOMMODATION = AccommodationPhoto::getAccommodationPhotosById($id);
                        foreach ($VIEW_ACCOMMODATION as $key => $accommodation) {
                            ?>
                            <a href="upload/accommodation/<?php echo $accommodation['image_name']; ?>">
                                <img src="upload/accommodation/thumb/<?php echo $accommodation['image_name']; ?>" data-title="" >
                            </a>
                            <?php
                        }
                        ?>
                    </div>  
                    <div class="hp-section">

                        <div class="hp-amini">
                            <p>Maecenas erat lorem, vulputate sed ex at, vehicula dignissim risus. Nullam non nisi congue elit cursus tempus. Nunc vel ante nec libero semper maximus. Donec cursus sed massa eget commodo. Phasellus semper neque id iaculis malesuada. Nulla efficitur dui vitae orci blandit tempor. Mauris sed venenatis nibh, sed sodales risus.</p>
                            <p>Nam sit amet tortor in elit fermentum consectetur et sit amet eros. Sed varius velit at eros tempor sodales. Fusce at enim at lectus sollicitudin pharetra at in risus. Donec ut semper turpis. Maecenas lobortis ante ut eros scelerisque, at semper augue ullamcorper.</p>
                        </div>
                    </div>
                    <div class="hp-section">
                        <div class="hp-sub-tit">
                            <h4><span>Accommodation</span> Facilities</h4>
                        </div>
                        <div class="hp-amini">
                            <ul>
                                <li><img src="upload/accommodation-facilities-icons/-249911214_190953229692_1522316723_n.jpg" alt=""> Elevator in building</li>
                                <li><img src="upload/accommodation-facilities-icons/-309727215_190893413691_1522314355_n.jpg" alt=""> Friendly workspace</li>
                                <li><img src="upload/accommodation-facilities-icons/-249911214_190953229692_1522316723_n.jpg" alt=""> Elevator in building</li>
                                <li><img src="upload/accommodation-facilities-icons/-309727215_190893413691_1522314355_n.jpg" alt=""> Friendly workspace</li>
                                <li><img src="upload/accommodation-facilities-icons/-249911214_190953229692_1522316723_n.jpg" alt=""> Elevator in building</li>
                                <li><img src="upload/accommodation-facilities-icons/-309727215_190893413691_1522314355_n.jpg" alt=""> Friendly workspace</li>
                            </ul>
                        </div>
                    </div>
                    <div class="hp-section">
                        <div class="hp-sub-tit">
                            <h4><span>Rooms</span></h4>
                            <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                        </div>
                        <div class="hp-over">

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active tab-space">
                                    <div class="res-menu"> <img src="upload/accommodation/rooms/thumb/-419142386_190783998520_1522301530_n.jpg" alt="">
                                        <h3>salted fried chicken <span>$45</span></h3> 
                                        <span class="menu-item">Tomato soup with croutons, small ceasar salad, apple juice</span>
                                    </div>
                                    <div class="res-menu"> <img src="upload/accommodation/rooms/thumb/-419142386_190783998520_1522301530_n.jpg" alt="">
                                        <h3>salted fried chicken <span>$45</span></h3> 
                                        <span class="menu-item">Tomato soup with croutons, small ceasar salad, apple juice</span>
                                    </div>
                                </div>
                                <!--                                        <div id="menu1" class="tab-pane fade tab-space">
                                                                            <div class="hp-main-overview">
                                                                                <ul>
                                                                                    <li>Occupancy: <span>Max four Persons</span>
                                                                                    </li>
                                                                                    <li>Size : <span>800 sq. feet</span>
                                                                                    </li>
                                                                                    <li>View : <span>Sea or Garden view</span>
                                                                                    </li>
                                                                                    <li>Room Service : <span>Available per request</span>
                                                                                    </li>
                                                                                    <li>Terraces : <span>Balcony</span>
                                                                                    </li>
                                                                                    <li>Free Pickup Facility : <span>Yes</span>
                                                                                    </li>
                                                                                    <li>Internet Free <span>Yes</span>
                                                                                    </li>
                                                                                    <li>Gym : <span class="ov-yes">Yes</span>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>-->
                            </div>
                        </div>
                    </div>

                    <div class="hp-section">
                        <div class="hp-sub-tit">
                            <h4><span>Ratings</span> Suite Room</h4>
                            <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                        </div>

                    </div>
                    <div class="hp-section">
                        <div class="hp-sub-tit">
                            <h4><span>USER</span> REVIEWS</h4>
                            <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                        </div>
                        <div class="lp-ur-all-rat">
                            <a class="waves-effect waves-light wr-re-btn" href="!#" data-toggle="modal" data-target="#commend"><i class="fa fa-edit"></i> Write Review</a> </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--=========================================-->
                    <div class="hp-call hp-right-com">
                        <div class="hp-review">
                            <div class="hp-review-right">
                                <h5>Overall Ratings</h5>
                                <p><span>4<i class="fa fa-star" aria-hidden="true"></i></span> based on 242 reviews</p>
                            </div>
                        </div>
<!--                        <div class="hp-call-in"> <img src="images/icon/dbc4.png" alt="">-->
<!--                            <h3><span>Check Availability. Call us!</span> +01 4214 4214</h3> <small>We are available 24/7 Monday to Sunday</small> <a href="#">Call Now</a> </div>-->
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-book hp-right-com">
                        <div class="hp-book-in">
                            <button class="like-button"><i class="fa fa-heart-o"></i> Bookmark this listing</button> <span>159 people bookmarked this place</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i> Share</a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Tweet</a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Share</a>
                                </li>
                                <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-card hp-right-com">
                        <div class="hp-card-in">
                            <h3>We Accept</h3> <span>159 people bookmarked this place</span> <img src="images/card.png" alt=""> </div>
                    </div>
                    <!--=========================================-->
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
            $('#accommodation_photos').galleria({
                responsive: true,
                width: 700,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true,

                //                imageCrop: true,
            });
        </script>
        <script type="text/javascript">
            $('.room-photos').galleria({
                responsive: true,
                height: 500,
                autoplay: 7000,
                lightbox: true,
                showInfo: true,
                //                imageCrop: true,
            });
        </script>
        <script>

            $('.room-title-btn').click(function () {
                var roomTitleId = this.id;
                var roomId = roomTitleId.replace('room-title-', '');
                $('#room-slider-' + roomId).show();

            });

            $('.close').click(function () {
                $('.modal').hide();
            });

            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        </script> 
    </body> 

</html>