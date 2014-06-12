<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/visuallightbox.css" type="text/css" media="screen" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/visuallightbox.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#menu-primary-menu li').removeClass('current_page_item');
        $('#menu-primary-menu li#homeideas').addClass('current_page_item');

        if (<?php echo $_GET['cid']?> == 0) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#all').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 1) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#living').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 2) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#dining').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 3) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#bed').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 4) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#bath').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 5) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#kitchens').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 6) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#outdoor').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 7) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#pools').addClass('active');
        } else if ( <?php echo $_GET['cid']?> == 8) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#garden').addClass('active');
        } else if (<?php echo $_GET['cid']?> == 9) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#facades').addClass('active');
        }

    });
</script>
<style>
    .nav-tabs {
        border-bottom: 1px solid #ff4b23;
    }
    .nav-tabs a{
        color: #131326;
        background-color: #f7f7f9;
        border: 1px solid #ff4b23 !important;
        border-bottom-color: #ff4b23;
    }
    .nav-tabs > .active > a,
    .nav-tabs > .active > a:focus {
        color: #fff;
        background-color: #ff4b23;
        border: 1px solid #ff4b23 !important;
        border-bottom-color: #ff4b23!important;
    }
    .nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
        color: #fff;
        background-color: #ff4b23;
        border: 1px solid #ff4b23 !important;
        border-bottom-color: #ff4b23!important;
    }
</style>
<div class="content-wrapper clearfix">
    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'addproperty1-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal'),
        )); ?>
            <div class="span9">
                <div id="title-listing" class="container" style="margin-left: 25px">
                    <div class="property-list-title">Home Ideas</div>
                </div>
                <ul class="nav nav-tabs" style="margin-left: 25px;">
                    <li id="all" class="active">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/0">All</a>
                    </li>
                    <li id="living"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/1">Livingrooms</a></li>
                    <li id="dining"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/2">Diningrooms</a></li>
                    <li id="bed"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/3">Bedrooms</a></li>
                    <li id="bath"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/4">Bathrooms</a></li>
                    <li id="kitchens"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/5">Kitchens</a></li>
                    <li id="outdoor"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/6">Outdoor</a></li>
                    <li id="pools"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/7">Pools</a></li>
                    <li id="garden"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/8">Garden</a></li>
                    <li id="facades"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/homeideas/cid/9">Facades</a></li>
                </ul>
                <div class="container row-fluid">
                    <?php
                    $condition =  (($_GET['cid'] == 0) ? 'category > 0' : 'category = ' . $_GET['cid']);

                    $this->widget('zii.widgets.CListView', array(
                        'id' => 'list_homeideas',
                        'dataProvider'=>new CActiveDataProvider('Homeideas', array('criteria'=>array('condition'=> $condition,'order' => 'id DESC'),'pagination'=>array('pageSize'=>5))),
                        'itemView' => '_homeideas_image_list_view',
                        'template'=>'{items}<div class="span12" style="margin-left: 0">{pager}</div>'
                    ));
                    ?>
                </div>
            </div>
            <!--Advertiesments--->
            <div class="span3 hidden-phone hidden-tablet">
                <div class="row-fluid">
                    <div calss="ads_placeholder span6" style="padding-top: 30px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad.jpg" alt="advertiesment"/>
                    </div>
                    <div calss="ads_placeholder span6" style="padding-top: 20px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Advertise-Here.jpg" alt="advertiesment"/>
                    </div>
                    <div calss="ads_placeholder span6"  style="padding-top: 20px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/zillow.png" alt="advertiesment"/>
                    </div>
                    <div calss="ads_placeholder_large span6"  style="padding-top: 20px;">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad_large.jpg" alt="advertiesment"/>
                    </div>
                </div>
            </div>
        <?php $this->endWidget(); ?>
    </div>
</div><!-- /.content-wrapper -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/thumbscript1.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vlbdata1.js" type="text/javascript"></script>
