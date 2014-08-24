<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7 ]><html lang="en-US" class="no-js ie ie6 ie-lte7 ie-lte8 ie-lte9"><![endif]-->
<!--[if IE 7 ]><html lang="en-US" class="no-js ie ie7 ie-lte7 ie-lte8 ie-lte9"><![endif]-->
<!--[if IE 8 ]><html lang="en-US" class="no-js ie ie8 ie-lte8 ie-lte9"><![endif]-->
<!--[if IE 9 ]><html lang="en-US" class="no-js ie ie9 ie-lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en-US" class="no-js"><!--<![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="" />
    <meta name="keyword" content="" />
    <title>Real Estate Property & Homes For Sale - myproperty.lk</title>
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/fav-ico.ico" />
    <meta name='robots' content='noindex,nofollow' />
    <script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js'></script>
    <link rel='stylesheet' id='realexpert_bootstrap_main_css-css'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='realexpert_bootstrap_responsive_css-css'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.min.css' type='text/css' media='all' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' id='default-style-css'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/form.css' type='text/css' media='all' />
</head>
<body>
<div class="container-full">
    <header id="header" role="banner">
        <div class="header-background">
            <div class="container">
                <div class="span12 row-fluid">
                    <div class="offset4 span4">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>" title="myproperty.lk" rel="home">
                            <img class="site-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Real Expert" />
                        </a>
                    </div>
                    <div class="span4" style="float: right; text-align: right; padding:30px 35px 20px 0;">
                        <a class="btn btn-primary" href="<?php echo Yii::app()->request->baseUrl; ?>/property/addproperty?type=1" title="click here to post a free ad" rel="home">POST YOUR FREE AD</a>
                        <div style="padding-top: 10px; font-size: 12px;">
                            <?php if (Yii::app()->user->id != 0) {
                                $url = "";
                                switch (Yii::app()->user->usertype){
                                    case 0:
                                        $url = Yii::app()->baseUrl . '/admin/home';
                                        break;
                                    case 1:
                                        $url = Yii::app()->baseUrl . '/member/home';
                                        break;
                                    case 2:
                                        $url = Yii::app()->baseUrl . '/agent/home';
                                        break;
                                    case 3:
                                        $url = Yii::app()->baseUrl . '/advertiser/home';
                                        break;
                                }
                            ?>
                            <a href="<?php echo $url; ?>"> Welcome <?php echo Yii::app()->user->username; ?></a>&nbsp;&nbsp; | &nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Sign Out</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-background">
            <div class="container" id="nav-bar">
                <div class="clearfix navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </a>
                            <div class="nav-collapse collapse">
                                <nav id="nav-main" role="navigation">
                                    <ul id="menu-primary-menu" class="nav">
                                        <li id="menu-item-1536" style=" border-bottom: solid 2px #000099" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home "><a id="home" href="<?php echo Yii::app()->request->baseUrl; ?>/">Home</a></li>
                                        <li id="buy" style=" border-bottom: solid 2px #660099" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1866"><a id="buy" href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/buy">Buy</a></li>
                                        <li id="rent" style=" border-bottom: solid 2px #009900" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-1649"><a id="rent" href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/rent">Rent</a></li>
                                        <li id="sold" style=" border-bottom: solid 2px #cc0000" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-1648"><a id="sold" class="dropdown-toggle" href="<?php echo Yii::app()->request->baseUrl; ?>/list/property/type/sold">Sold</a></li>
                                        <li id="homeideas" style=" border-bottom: solid 2px #ff4b23" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown menu-item-1648"><a id="homeideas" class="dropdown-toggle" href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/0">Home Ideas</a></li>
                                        <li id="commercial" style=" border-bottom: solid 2px #ffb013" class="menu-item menu-item-type-post_type menu-item-object-page last_item menu-item-1592"><a id="commercial" href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/all">Commercial</a></li>

                                    </ul>
                                    <div id="social-network">
                                        <a class="signin" href="<?php echo Yii::app()->request->baseUrl; ?>/login" style="text-decoration: none; font-size: 15px">Sign In</a>
                                        <a class="join" href="<?php echo Yii::app()->request->baseUrl; ?>/register" style="text-decoration: none; font-size: 15px;">Join</a>
                                        <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=http://www.myproperty.lk/index.php" title="Facebook" target="_blank" style="line-height: inherit"><i class="icon-facebook" style="line-height: inherit;"></i></a>
                                        <a class="tw" href="https://twitter.com/share?url=http://www.myproperty.lk/index.php" title="Twitter" target="_blank" style="line-height: inherit"><i class="icon-twitter" style="line-height: inherit;"></i></a>
                                        <a class="rss" href="http://feeds.feedburner.com/" title="RSS" target="_blank" style="line-height: inherit"><i class="icon-rss" style="line-height: inherit;"></i></a>
                                        <a class="gp" href="http://www.plus.google.com/" title="Google Plus" target="_blank" style="line-height: inherit"><i class="icon-google-plus" style="line-height: inherit;"></i></a>
                                    </div>
                                </nav> <!-- #nav-main -->
                            </div>

                        </div>

                    </div>
                </div><!-- .navbar -->
            </div>
        </div>
        <div>
            <div id="flshMsg">
                <?php
                $flashMessages = Yii::app()->user->getFlashes();
                if ($flashMessages) {
                    //echo '<div class="alert alert-success">';
                    foreach($flashMessages as $key => $message) {
                        echo '<div class="alert alert-' . $key . '">' . $message;
                        echo '<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
                    }
                    //echo '</div>';
                    Yii::app()->clientScript->registerScript(
                        'myHideEffect',
                        '$(".alert").animate({opacity: 1.0}, 3000).fadeOut("slow");',
                        CClientScript::POS_READY
                    );
                }
                ?>
            </div>
        </div>
    </header><!-- #header -->
    <?php echo $content; ?>
    <section id="footer_widgets">
        <div classs="span12">
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
                            <p>myproperty.lk is most trusted property portal to promote Sri Lankan real-estate business locally and internationally.</p>
                            <p>Our aim is to create one common platform to satisfy all real-estate needs of buyers and sellers.
                                We hope that you would take the maximum advantage of this breath catching opportunity to make your transaction happen at your fingertips.
                            </p>
                        </div>
                    </div>
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
                    <div id="blog-widget-2" class="span4 widget blog">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="textwidget">
                            Sri Lanka's most trusted property portal to promote Sri Lankan real-estate business locally and internationally....
                        </div>
                        <ul class="footer-blog">
                            <li>
                                <a href="#">
                                    <i class="icon-phone"></i> +61431 108 137
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-print"></i> +61425 732 711
                                </a>
                            </li><li>
                                <a href="mailto:info@dwellingsgroup.com.au">
                                    <i class="icon-envelope"></i> info@myproperty.lk
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /.footer-widget-wrapper -->
    </section><!-- #footer_widgets -->
    <footer id="footer">
        <div class="container cleafix">
            <p class="pull-left" style="font-size: 12px;">Copyright © 2014, All Rights Reserved by <a href="http://www.snt3.com/">SNT3 Team.</a></p>
            <div class="span6" style="text-align: center">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/dwg.png" style="width: 100px; height: 40px;"/> MyProperty.lk is member of Dwellings Group.
            </div>
            <div class="pull-right">
                <ul class="footer-social">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://www.myproperty.lk/index.php" title="Facebook"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://twitter.com/share?url=http://www.myproperty.lk/index.php" title="Twitter"><i class="icon-twitter"></i></a></li>
                    <li><a href="http://feeds.feedburner.com/" title="RSS"><i class="icon-rss"></i></a></li>
                    <li><a href="http://www.plus.google.com/" title="Google Plus"><i class="icon-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div><!-- .container-full -->
</body>
</html>
