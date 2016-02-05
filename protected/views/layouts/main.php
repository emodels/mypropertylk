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
        
        header nav li.active {
            background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/nav-head.png) center 0px no-repeat;
        }
        
        header nav li:hover {
            background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/nav-head.png) center 0px no-repeat;
            color: #222222; 
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
                        //alert("Colombo");
                    } else if (district_ === "Gampaha")
                    {
                        //alert("Gampaha");
                    } else if (district_ === "Kaḷutara")
                    {
                        //alert("Kaḷutara");
                    }
                });
            });
        </script>
    </head>
    
    <body>
        <div id="dvLoading">
            <img class="loadingImg" src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif">
        </div>
        
        <div class="active">
        <img src="images/nav-head.png" onmouseover="this.src='<?php echo Yii::app()->request->baseUrl; ?>/images/nav-head.png'" onmouseout="this.src='<?php echo Yii::app()->request->baseUrl; ?>/images/nav-head.png'" />
        </div>
        
        <!-- Page Wrap ===========================================-->
        <div id="wrap" class="home-1">

            <!--======= TOP BAR =========-->
            <div class="top-bar">
                <div class="container">
                    <ul class="left-bar-side">
                        <li>
                            <p class="call"> <a href="#." <i class="fa fa-phone"></i> Call Us Now : +94 112 314 100 </a> </p>
                            <span>|</span> </li>
                        <li>
                          <p class="mail"><a href="mailto:info@dwellingsgroup.com.au"><i class="fa fa-envelope-o"></i> info@myproperty.lk </a> </p>
                            <span>|</span> </li>
                        <li>
                           <p class="Signin" ><a href="<?php echo Yii::app()->request->baseUrl; ?>/login"><i class="fa fa-lock"></i> Sign in </a></p>
                            <span>|</span> </li>
                        <li>
                            <p class="join"><a href="<?php echo Yii::app()->request->baseUrl; ?>/register"><i class="glyphicon glyphicon-user"></i>Join</a> </p>
                            <span>|</span> </li>
                    </ul>
                    <ul class="right-bar-side social_icons">
                        <li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.myproperty.lk/index.php" tittle="Facebook" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                        <li class="twitter"> <a href="https://twitter.com/share?url=http://www.myproperty.lk/index.php" tittle="Twitter" target="_blank"><i class="fa fa-twitter"></i> </a></li>
                       <li class="rss"> <a href="http://feeds.feedburner.com/" tittle="RSS"target="_blank"><i class="fa fa-rss" ></i> </a></li>
                        <li class="googleplus"><a href="http://www.plus.google.com/" title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <!--<li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a></li>-->
                    </ul>
                </div>
            </div>

            <!--======= HEADER =========-->
            <header class="sticky">
                <div class="container">

                    <!--======= LOGO =========-->
                    <div class="logo">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>" title="myproperty.lk" rel="home">
                     <img class="logo_img" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Real Expert" ></a>
                    </div>
                    <!--======= NAV =========-->
                    <nav>

                        <!--======= MENU START =========-->
                        <ul id="lnk_list" class="ownmenu">
                            <li class="active"><a href="<?php echo Yii::app()->request->baseUrl; ?>">Home</a></li>
                            <li id="lnk_about"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/about_us"> About Us </a></li>
                            <li id="lnk_services"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services">Services</a>

                                <!--======= MEGA MENU =========-->
                                <div class="megamenu full-width">
                                    <h6>Our Services</h6>
                                    <div class="row nav-post">
                                        <div class="col-sm-4 boder-da-r">
                                            <ul>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services#marketing">Project Marketing </a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services#brokerage">Property Brokerage</a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services#management">Property Management</a></li>
                                                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/services#investment">Investment Advisory</a></li>
                                                <!--<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/sold">Sold</a></li>-->
                                            </ul>
                                        </div>
                                        <div class="col-sm-4"> <img class="absu"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/nav-image.png" alt="" > </div>
                                    </div>
                                </div>

                            </li>
                            

                            <li id="lnk_buy"><a href="#.">Buy</a>
                                 <ul class="dropdown">
                                 <li ><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/buy">Residential</a></li>
                                 <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sale">Commercial</a></li>
                                 </ul>
                            </li> 
                            
                            <li id="lnk_rent"><a href="#.">Rent</a>
                                 <ul class="dropdown">
                                 <li id="lnk_rent"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/rent">Residential</a></li>
                                 <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/lease">Commercial</a></li>
                                 </ul>
                             </li>
                            <li id="lnk_overseas"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/Overseas_Investments">Overseas Investments</a></li>
                            <li id="lnk_contact"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/contact">Contact us</a></li>
                            
                        </ul>

                        <!--======= SUBMIT COUPON =========-->
                        <div class="sub-nav-co"> <a href="#."><i class="fa fa-search"></i></a> </div>
                    </nav> 
                </div>
                
            </header>
            


            <div class="row">    
            <?php echo $content; ?>
               <div class="clearfix"></div>
            </div>
            
            <!-- ===========FOOTER===========-->
            
            <div id="footer_main" class="row" >
                
               <footer id="footer">
                
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
                    <div class="container_f">
                        <div class="row-fluid mobile-footer" style="margin-left : 195px">
                         <div id="pages-2" class="span2 widget widget_pages">
                                <h3 class="widget-title">Quick Links</h3>
                                <ul>
                                    <li class="page_item page-item-18"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/buy">Buy</a></li>
                                    <li class="page_item page-item-115"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/rent">Rent</a></li>
                                    <li class="page_item page-item-1864"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/sold">Sold</a></li>
                                    
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
                        
                            <div id="blog-widget-2" class="span5 widget">
                           <!-- <div  class="span4 widget widget_text">-->
                                <h3 class="widget-title" style="padding-left: 12px;" >Contact Us</h3>
                                
                                <ul class="footer-blog span6">
                                    <li> <i class="fa fa-map-marker" style="margin-right: 5px; padding-top: 3px; float: left;"></i>
                                        <span style="float: left;">
                                            Level 3,IBM Building <br>No:48,<br> Nawam Mawatha, <br> 
                                            Colombo 02, <br> Sri Lanka.  </span>
                                    </li>
                                    
                                    <ul class="footer-social" style="margin-top: 115px;">
                                            <li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u=http://www.myproperty.lk/index.php" target="_blank"><i class="fa fa-facebook"></i> </a></li>
                                            <li class="twitter"> <a href="https://twitter.com/share?url=http://www.myproperty.lk/index.php" target="_blank"><i class="fa fa-twitter"></i>  </a></li>
                                            <!--<li class="linkedin"> <a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i> </a></li>-->
                                            <li class="rss"> <a href="http://feeds.feedburner.com/" tittle="RSS" target="_blank"><i class="fa fa-rss" ></i> </a></li>
                                            <li class="googleplus"><a href="http://www.plus.google.com/" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>                                
                            
                                </ul>
                                
                                <ul class="footer-blog span5" >
                                    <li>
                                        <i class="fa fa-clock-o"style="margin-right: 3px; padding-top: 3px; float: left;"></i><span style="padding-right:10px">Week Days : 9:00 AM - 5:00 PM </span>   
                                    </li>
                                    <li>
                                         <a href="mailto:info@dwellingsgroup.com.au">
                                             <i class="fa fa-envelope"></i> info@myproperty.lk
                                         </a>
                                    </li>
                                    <li>
                                         <a href="#">
                                             <i class="fa fa-phone"></i> +94 112 314 100
                                         </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                             <i class="fa fa-mobile" style="font-size: 18px"></i> +94 777 348 648
                                        </a>
                                    </li>
                                   </ul>
                            </div>
                         </div>
                    </div>
                </div><!-- /.footer-widget-wrapper -->
            </section><!-- #footer_widgets -->

            
                <div class="container clearfix">  
                    <div class="footer-left">Copyright © 2014, Designed & Developed by SNT3.</div>
                    <div class="footer-img">
                        <a href="http://www.dwellingsgroup.com.au/" target="_blank"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dwg.png"> </a>
                    </div>
                    <div class="footer-center"><a href="http://www.dwellingsgroup.com.au/" target="_blank">MyProperty.lk is member of Dwellings Group.</div>
                    <div class="footer-right">
                        
                        <ul class="footer-social" >
                                    
                                    <li>     
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/terms_conditions.pdf" target="_blank">Terms and Conditions</a>
                                    </li>
                                    <span>|</span>
                                    <li>
                                         <a href="<?php echo Yii::app()->request->baseUrl; ?>/privacy_policy.pdf" target="_blank">Privacy Policy</a>
                                     </li>
                                 </ul>

                    </div>
                </div>
            </footer>  
            </div>    
            <!--======= FOOTER =========-->
     
        </div>
<!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.0.min.js"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/wow.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-select.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.stellar.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.flexslider-min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/owl.carousel.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.sticky.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/own-menu.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.nouislider.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>
