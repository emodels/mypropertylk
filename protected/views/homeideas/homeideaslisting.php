<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vlightbox1.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/visuallightbox.css" type="text/css" media="screen" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/visuallightbox.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_homeideas').addClass('active');
    });

    function Delete_Homeideas(id){
        if (confirm('Are you sure want to delete?'))
        {
            $.ajax({
                type: "GET",
                url: 'homeideaslisting/mode/DELETE/id/' + id,
                success: function(data){
                    if (data == 'done'){
                        window.document.location.reload();
                    } else {
                        alert(data);
                    }
                }
            });
        }

    }


</script>
<div class="col_right" style="padding-top: 0; min-height: 400px;">
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
            <div class="span10" style="padding-right: 10px; padding-left: 10px;">
                <div class="btn-group">
                    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> Sort by Category <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/0">All Categories</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/1">Livingrooms</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/2">Diningrooms</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/3">Bedrooms</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/4">Bathrooms</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/5">Kitchens</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/6">Outdoor</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/7">Pools</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/8">Gardens</a></li>
                        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/homeideas/homeideaslisting/cid/9">Facades</a></li>
                    </ul>
                </div>
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
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <div class="container row-fluid">
                <?php
                $cid = 0;
                $condition =  '';

                if (Yii::app()->user->usertype != 0) {
                    $condition =  'userid = ' . Yii::app()->user->id ;

                    if (isset($_GET['cid'])) {

                        $condition .= ' AND ' . (($_GET['cid'] == 0) ? 'category > 0' : 'category = ' . $_GET['cid']);
                    }

                } else {

                    if (isset($_GET['cid'])) {

                        $condition .= (($_GET['cid'] == 0) ? 'category > 0' : 'category = ' . $_GET['cid']);
                    }
                }


                $this->widget('zii.widgets.CListView', array(
                    'id' => 'list_homeideas',
                    'dataProvider'=>new CActiveDataProvider('Homeideas', array('criteria'=>array('condition'=> $condition,'order' => 'dateadded DESC' ),'pagination'=>array('pageSize'=>15))),
                    'itemView' => '_homeideas_image_list_view',
                    'template'=>'{items}<div class="span12" style="margin-left: 0">{pager}</div>',
                    'afterAjaxUpdate'=>'function(id,options){window.scroll(0,0);}',
                ));
                ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/thumbscript1.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vlbdata1.js" type="text/javascript"></script>
