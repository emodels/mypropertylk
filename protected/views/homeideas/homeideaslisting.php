<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/visuallightbox.css" type="text/css" media="screen" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/visuallightbox.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_homeideas').addClass('active');
    });
</script>
<div class="col_right" style="padding-top: 0;">
    <div class="form">
        <div class="span12" style="border-bottom: solid 1px silver">

            <div class="span9">
                <h3>Your Listings</h3>
            </div>
            <div class="span3" style="padding-top: 20px;">
                <div class="btn-group">
                    <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/addhomeideas" style="text-decoration: none; color: #ffffff">Add New Home Ideas</a></button>
                </div>
            </div>
        </div>
        <div class="span12" style="padding-top: 10px; padding-bottom:10px; margin-left: 0; background-color: #f7f7f7;border-bottom: solid 1px silver">
            <div class="span8" style="padding-right: 10px; padding-left: 10px;">
                <div class="btn-group">
                    <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Category <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">Livingrooms</a></li>
                        <li><a href="#">Diningrooms</a></li>
                        <li><a href="#">Bedrooms</a></li>
                        <li><a href="#">Bathrooms</a></li>
                        <li><a href="#">Kitchens</a></li>
                        <li><a href="#">Outdoor</a></li>
                        <li><a href="#">Pools</a></li>
                        <li><a href="#">Gardens</a></li>
                        <li><a href="#">Facades</a></li>
                    </ul>
                </div>
            </div>
            <div class="span4" style="text-align: right; padding-right: 10px">
                <select class="btn-small" style="width: auto;">
                    <option>Sort By</option>
                    <option>Date</option>
                </select>
            </div>
        </div>
        <div class="span12" style="margin-left: 0 ">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'homeideaslisting-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <div class="container row-fluid">
                <?php
                if (Yii::app()->user->usertype != 0) {
                    $condition =  'userid = ' . Yii::app()->user->id ;
                } else {
                    $condition =  '';
                }

                $this->widget('zii.widgets.CListView', array(
                    'id' => 'list_homeideas',
                    'dataProvider'=>new CActiveDataProvider('Homeideas', array('criteria'=>array('condition'=> $condition,'order' => 'dateadded DESC'),'pagination'=>array('pageSize'=>5))),
                    'itemView' => '_homeideas_image_list_view',
                    'template'=>'{items}<div class="span12" style="margin-left: 0">{pager}</div>'
                ));
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/thumbscript1.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vlbdata1.js" type="text/javascript"></script>
