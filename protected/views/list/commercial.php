
<script type="text/javascript">
    $(document).ready(function(){
        $('#menu-primary-menu li').removeClass('current_page_item');
        $('#menu-primary-menu li#commercial').addClass('current_page_item');

        if (<?php echo $_GET['type']?> == all) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#all').addClass('active');
        } else if (<?php echo $_GET['type']?> == sale) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#sale').addClass('active');
        } else if (<?php echo $_GET['type']?> == leased) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#leased').addClass('active');
        } else if (<?php echo $_GET['type']?> == sold) {
            $('.nav-tabs li').removeClass('active');
            $('.nav-tabs li#sold').addClass('active');
        }

    });
</script>
<style>
    .nav-tabs {
        border-bottom: 1px solid #fcb30f;
    }
    .nav-tabs a{
        color: #131326;
        background-color:  #f7f7f9;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f;
    }
    .nav-tabs > .active > a,
    .nav-tabs > .active > a:focus {
        color: #fff;
        background-color: #FFB013;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f!important;
    }
    .nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
        color: #fff;
        background-color: #FFB013;
        border: 1px solid #fcb30f !important;
        border-bottom-color: #fcb30f!important;
    }
</style>
<div class="content-wrapper clearfix">
    <div class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'commercial-form',
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
                <div class="container row-fluid">
                    <div class="span12">
                        <div id="title-listing" class="container" style="margin-left: 28px;">
                            <div class="property-list-title">Commercial Properties</div>
                        </div>
                        <div>
                            <ul class="nav nav-tabs" style="margin-left: 28px;">
                                <li id="all" class="active">
                                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/all">All</a>
                                </li>
                                <li id="sale"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sale">For Sale</a></li>
                                <li id="lease"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/leased">For Lease</a></li>
                                <li id="sold"><a href="<?php echo Yii::app()->request->baseUrl; ?>/list/commercial/type/sold">Sold / Leased</a></li>
                            </ul>
                        </div>
                        <div style="margin-left: 28px;">
                            <?php
                            if($_GET['type'] == "all"){
                                $condition = '(type = 4 OR type = 5 ) AND status = 1';
                            } elseif($_GET['type'] == "sale"){
                                $condition = 'type = 4 AND status = 1';
                            } elseif($_GET['type'] == "leased"){
                                $condition = 'type = 5 AND status = 1';
                            } elseif($_GET['type'] == "sold"){
                                $condition = '(type = 4 OR type = 5 ) AND status = 2';
                            }

                            $this->widget('zii.widgets.CListView', array(
                                'id' => 'list_commercial',
                                'dataProvider'=>new CActiveDataProvider('Property', array('criteria'=>array('condition'=> $condition,'order' => 'pid DESC'),'pagination'=>array('pageSize'=>10))),
                                'itemView' => '_commercial_list_view',
                                'template'=>'{items}<div class="span12"></div>{pager}<div class="span12"></div>'
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--Advertiesments--->
            <div class="span3 hidden-phone">
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
