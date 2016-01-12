<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Myproperty</title>
        <meta name="keywords" content="houses for sale, houses for rent/lease, land sales, Sri Lanka" />
        <meta name="description" content="myproperty.lk is most trusted property portal to promote Sri Lankan real-estate business locally and internationally. property website for houses for sale, houses for rent/lease and land sales across Sri Lanka, posted directly by the sellers, owners and estate agents/brokers" />
        <meta name="author" content="M_Adnan">

        <!-- FONTS ONLINE -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'/>

        <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js'></script>
        
        <!--MAIN STYLE-->
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/bootstrap.min.css' rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/main.css' rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/style.css' rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/animate.css' rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/responsive.css' rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/font-awesome.min.css' rel="stylesheet" type="text/css">
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/css/form.css' rel='stylesheet' type='text/css' media='all' />
        <link href='<?php echo Yii::app()->request->baseUrl; ?>/styles/custom-style.css' rel="stylesheet" type="text/css">
        <link  id='realexpert_bootstrap_responsive_css-css' href='<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css' rel='stylesheet' type='text/css' media='all'/>

        <style>
         #dvLoading{
           background:#fff;
           height: 100%;
           width: 100%;
           position: fixed;
           z-index: 9999;
        }
        .loadingImg{
           top: 50%;
           position: relative;
           left: 50%;
        }
        </style>
    
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script>
        $(window).load(function(){
          $('#dvLoading').fadeOut(2000);
        });
        </script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
               
                
                $('.forgotpword').click(function(){
                    $('.new-height').height(665);
                });
                $('.contactSubmit').click(function(){
                    $('.contactHeight').height(1130);
		});

                
                $("path").tooltip({
                    'container': 'body',
                    'placement': 'bottom'
                });
                $(function () {
                    $('.ownmenu li a[href^="/' + location.pathname + '"]').parent().addClass('active');
                });
                $('path').mouseenter(function () {

                    var district_ = $(this).attr('title');

                    if (district_ === "Colombo")
                    {
                        alert("Colombo");
                    } else if (district_ === "Gampaha")
                    {
                        alert("Gampaha");
                    } else if (district_ === "Kaḷutara")
                    {
                        alert("Kaḷutara");
                    }
                });
            });
        </script>
    </head>
    <body>
        <div id="dvLoading">
            <img class="loadingImg" src="images/loading.gif">
        </div>

        <!-- Page Wrap ===========================================-->
        <div id="wrap" class="home-1">

            <!--======= TOP BAR =========-->
            <div class="top-bar">
                <div class="container">
                    <ul class="left-bar-side">
                        <li>
                            <p><i class="fa fa-phone"></i> Call Us Now : +94 112 314 100</p>
                            <span>|</span> </li>
                        <li>
                          <p class="mail"><a href="#."><i class="fa fa-envelope-o"></i> info@myproperty.lk </a> </p>
                            <span>|</span> </li>
                        <li>
                           <p class="Signin" ><a href="<?php echo Yii::app()->request->baseUrl; ?>/login"><i class="fa fa-lock"></i> Sign in </a></p>
                            <span>|</span> </li>
                        <li>
                            <p class="join"><a href="<?php echo Yii::app()->request->baseUrl; ?>/register"><i class="glyphicon glyphicon-user"></i>Join</a> </p>
                            <span>|</span> </li>
                    </ul>
                    <ul class="right-bar-side social_icons">
                        <li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.myproperty.lk/index.php"><i class="fa fa-facebook"></i> </a></li>
                        <li class="twitter"> <a href="https://twitter.com/share?url=http://www.myproperty.lk/index.php"><i class="fa fa-twitter"></i> </a></li>
                        <li class="linkedin"> <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i> </a></li>
                        <li class="googleplus"><a href="http://www.plus.google.com/" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                        <!--<li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a></li>-->
                    </ul>
                </div>
            </div>

            <!--======= HEADER =========-->
            <header class="sticky">
                <div class="container">

                    <!--======= LOGO =========-->
                    <div class="logo"> <a href="#."><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_ash.png" alt="" ></a> </div>
                    <!--======= NAV =========-->
                    <nav>

                        <!--======= MENU START =========-->
                        <ul class="ownmenu">
                            <li class="active"><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/pages/about"> About </a></li>
                            <li><a href="05-Services.html">Services</a>

                                <!--======= MEGA MENU =========-->
                                <div class="megamenu full-width">
                                    <h6>Our Services</h6>
                                    <div class="row nav-post">
                                        <div class="col-sm-4 boder-da-r">
                                            <ul>
                                                <li><a href="05-Services.html">Property Marketing </a></li>
                                                <li><a href="05-Services.html">Property Brokerage</a></li>
                                                <li><a href="05-Services.html">Property Management</a></li>
                                                <li><a href="05-Services.html">Investment Advisory</a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/sold">Sold</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4"> <img class="absu"  src="images/nav-image.png" alt="" > </div>
                                    </div>

                            </li>

                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/buy">Buy</a></li>
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/rent">Rent</a></li>
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/all">Commercial</a></li>
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact">Contact us</a></li>
                            
                        </ul>

                        <!--======= SUBMIT COUPON =========-->
                        <div class="sub-nav-co"> <a href="#."><i class="fa fa-search"></i></a> </div>
                    </nav> 
                </div>
                
            </header>
            



            <?php echo $content; ?>

            <!--======= FOOTER =========-->


            <section id="footer_widgets">
                <div classs="col-lg-12">
                    <div class="row-fluid">
                        <div class="">
                            <div id="footer_bg">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="footer_widget_wrapper">
                    <div class="container">
                        <div class="row-fluid">
                            <div id="text-2" class="span4 widget widget_text">
                                <h3 class="widget-title">About myproperty.lk</h3>
                                <div class="textwidget">
                                    myproperty.lk is most trusted property portal to promote Sri Lankan real-estate business locally and internationally.<br>
                                    <br>  Our aim is to create one common platform to satisfy all real-estate needs of buyers and sellers.
                                    We hope that you would take the maximum advantage of this breath catching opportunity to make your transaction happen at your fingertips.

                                </div>
                            </div>
                            <div id="pages-2" class="span2 widget widget_pages">
                                <h3 class="widget-title">Quick Links</h3>
                                <ul>
                                    <li class="page_item page-item-18"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/buy">Buy</a></li>
                                    <li class="page_item page-item-115"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/rent">Rent</a></li>
                                   <!-- <li class="page_item page-item-1864"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/sold">Sold</a></li>-->
                                    <li class="page_item page-item-1681"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/0">Home Ideas</a></li>
                                    <li class="page_item page-item-1675"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/all">Commercial</a></li>
                                </ul>
                            </div>
                            <div id="pages-5" class="span2 widget widget_pages">
                                <h3 class="widget-title">Another Links</h3>
                                <ul>
                                    <li class="page_item page-item-14"><a href="<?php echo Yii::app()->request->baseUrl; ?>/login">Sign In </a></li>
                                    <li class="page_item page-item-18"><a href="<?php echo Yii::app()->request->baseUrl; ?>/register">Join</a></li>
                                    <li class="page_item page-item-115"><a href="<?php echo Yii::app()->request->baseUrl; ?>/login">Advertise With Us</a></li>
                                    <li class="page_item page-item-1864"><a href="<?php echo Yii::app()->request->baseUrl; ?>/login">Agent Admin</a></li>
                                    <li class="page_item page-item-1681"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact">Contact Us</a></li>
                                </ul>
                            </div>
                            <!--  <div id="blog-widget-2" class="span4 widget blog">-->
                            <div id="text-2" class="span4 widget widget_text">
                                <h3 class="widget-title">Contact Us</h3>
                                <div class="textwidget">
                                    Sri Lanka's most trusted property portal to promote Sri Lankan real-estate business locally and internationally....
                                </div>
                                <ul class="footer-blog span6">
                                    <li>
                                        <a href="#">
                                            <i class="icon-phone"></i> +94 112314100
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icon-mobile-phone" style="font-size: 18px"></i> +94 777 348 648
                                        </a>
                                    </li><li>
                                        <a href="mailto:info@dwellingsgroup.com.au">
                                            <i class="icon-envelope"></i> info@myproperty.lk
                                        </a>
                                    </li>
                                </ul>
                                <ul class="footer-blog span5">
                                    <li>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/terms_conditions.pdf" target="_blank">Terms and Conditions</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/privacy_policy.pdf" target="_blank">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- /.footer-widget-wrapper -->
            </section><!-- #footer_widgets -->




            <footer id="footer">
                <div class="container cleafix">       
                    <div class="footer-left">Copyright © 2014, Designed & Developed by SNT3.</div>
                    <div class="footer-img">
                        <a href="http://www.dwellingsgroup.com.au/" target="_blank"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dwg.png"> </a>
                    </div>
                    <div class="footer-center"><a href="http://www.dwellingsgroup.com.au/" target="_blank">MyProperty.lk is member of Dwellings Group.</div>
                    <div class="footer-right">
                        <ul class="footer-social">
                            <li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.myproperty.lk/index.php" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                            <li class="twitter"> <a href="https://twitter.com/share?url=http://www.myproperty.lk/index.php" target="_blank"><i class="fa fa-twitter"></i> </a></li>
                            <li class="linkedin"> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i> </a></li>
                            <li class="googleplus"><a href="http://www.plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </footer>

        </div>
        <script src="js/jquery-1.11.0.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/bootstrap-select.js"></script>
        <script src="js/bootstrap-select.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.stellar.js"></script>
        <script src="js/jquery.flexslider-min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/own-menu.js"></script>
        <script src="js/jquery.nouislider.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript">
            /*-----------------------------------------------------------------------------------*/
            /*    PRICE RANGE
             /*-----------------------------------------------------------------------------------*/
            $("#price-range").noUiSlider({
                range: {
                    'min': [0],
                    'max': [10000000]},
                start: [0, 10000000],
                connect: true,
                serialization: {
                    lower: [
                        $.Link({
                            target: $("#price-min")
                        })],
                    upper: [
                        $.Link({
                            target: $("#price-max")
                        })],
                    format: {
                        // Set formatting
                        decimals: 0,
                        prefix: '$'
                    }}
            });
        </script>
    </body>
</html>
