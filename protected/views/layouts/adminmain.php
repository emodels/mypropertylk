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
    <link rel='stylesheet' id='admin-style-css'  href='<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo Yii::app()->request->baseUrl; ?>/css/form.css' type='text/css' media='all' />
    <script type="text/javascript">
        $(document).ready(function () {
            if ($(window).width() > 320) {
                $('.col_left_bg').css('height', $('.col_right_bg').css('height'));
            }
        });

        $(window).resize(function() {
            if ($(window).width() > 320) {
                $('.col_left_bg').css('height', $('.col_right_bg').css('height'));
            }
        });
    </script>

</head>
<body class="body-bg">
<div class="container-full">
    <header id="header" role="banner">
        <div class="admin-banner">
            <div class="container admin-controls">
                <div class="span4">
                    <div class="logo">Admin Control</div>
                </div>
                <div class="client-controls">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Welcome <?php echo ucwords(Yii::app()->user->username); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/profile/changepassword">Change Password</a></li>
                            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container shadow" style="border-left: solid 1px silver; border-right: solid 1px silver">
            <div class="row-fluid">
                <div class="content_bg">
                    <div>
                        <div id="flshMsg">
                            <?php
                            $flashMessages = Yii::app()->user->getFlashes();
                            if ($flashMessages) {
                                //echo '<div class="alert alert-success">';
                                foreach($flashMessages as $key => $message) {
                                    echo '<div class="alert alert-' . $key . '">' . $message;
                                    echo '<button id="flashbtn" type="button" class="close" data-dismiss="alert">&times;</button></div>';
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
                    <div>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>" title="myproperty.lk" rel="home">
                            <img class="site-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Real Expert" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #header -->
    <div class="container shadow" style="border-left: solid 1px silver; border-right: solid 1px silver">
        <div class="container-fluid" style="padding: 0;">
            <div class="row-fluid" style="background-color: #FFF;">
                <div class="span2 col_left_bg">
                    <!--Sidebar content-->
                    <div class="col_left">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a id="admin_home" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/home" class="active"><i class="icon-home icon_gap"></i>Home</a></li>
                            <li><a id="admin_list" href="<?php echo Yii::app()->request->baseUrl; ?>/property/propertylisting?type=0"><i class="icon-list icon_gap"></i>Listings</a></li>
                            <li><a id="admin_homeideas" href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting"><i class="icon-camera icon_gap"></i>Home Ideas</a></li>
                            <li><a id="admin_editprof" href="<?php echo Yii::app()->request->baseUrl. '/profile/editprofile?id='. Yii::app()->user->id;?>"><i class="icon-edit icon_gap"></i>Edit Profile</a></li>
                            <li><a id="admin_manage" href="<?php echo Yii::app()->request->baseUrl; ?>/profile/manageusers"><i class="icon-user icon_gap"></i>Manage Users</a></li>
                            <li><a id="admin_price" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/pricelist"><span class="add-on icon_gap" style="padding-left: 2px"><b>$</b></span> Price List</a></li>
                            <li><a id="admin_adv" href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/advertisement"><i class="icon-bullhorn icon_gap"></i>Advertising</a></li>
                            <li><a id="admin_transact" href="<?php echo Yii::app()->request->baseUrl; ?>/transactions/transaction"><i class="icon-retweet icon_gap"></i>Transactions</a></li>
                            <li><a id="admin_uplaod" href="<?php echo Yii::app()->request->baseUrl; ?>/bulkupload/upload"><i class="icon-upload icon_gap"></i>Bulk Upload</a></li>
                        </ul>
                    </div>
                </div>
                <div class="span10 col_right_bg" style="margin-left: 0; border-left: solid 1px silver;">
                    <!--Body content-->
                    <div>
                        <?php echo $content; ?>
                    </div>
                    <div class="span12" style="margin-left: 0;">
                        <div>
                            <div class="footer_bg">
                                myproperty.lk Administration © SNT3 Team 2014, All rights reserved
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .container-full -->
<script type='text/javascript' src='<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tooltip.js'></script>
</body>
</html>
