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
        <div class="container shadow" style="border-left: solid 1px silver; border-right: solid 1px silver">
            <div class="row-fluid">
                <div class="content_bg">
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
                <div class="span12" style="margin-left: 0; border-left: solid 1px silver;">
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
