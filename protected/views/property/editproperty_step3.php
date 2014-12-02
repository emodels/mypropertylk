<script type="text/javascript">

    function Delete_Image(id){
        if (confirm('Are you sure want to delete?'))
        {

            $.ajax({
                type: "GET",
                url: 'editproperty_step3/mode/DELETE/type/PROP/id/' + id,
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiListView.update('list_images_house');
                        $.fn.yiiListView.update('list_images_floor');
                        setTimeout(function(){$('#flshMsg').fadeOut("slow");}, 3000);
                    } else {
                        alert(data);
                    }
                }
            });
        }

    }

    function SetPrimary_Image_Property(id){
        $.ajax({
            type: "GET",
            url: 'editproperty_step3/mode/PRIMARY/type/PROP/id/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_images_house');
                } else {
                    alert(data);
                }
            }
        });

    }

    function SetPrimary_Image_Floor(id){
        $.ajax({
            type: "GET",
            url: 'editproperty_step3/mode/PRIMARY/type/FLOOR/id/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_images_floor');
                } else {
                    alert(data);
                }
            }
        });

    }

    function formSend(form, data, hasError){

        if (hasError) {

            if ($('.error :first').length > 0){
                $(window).scrollTop($('.error :first').offset().top);
            }

            return false;
        }

        return true;
    }
</script>
<style type="text/css">
    div.form label {
        font-weight: normal;
        font-size: 0.9em;
        display: block;
    }
</style>
<div class="col_right" style="padding-top: 0;">
    <div>
        <h3 style="margin-top: 0;">Edit Property</h3>
    </div>
    <div class="edit-header">
        <h1 id="listing-address-title"><?php echo $model->headline ?></h1>
        <h2 id="listing-address-subtitle"><?php echo $model->number . ',' . $model->streetaddress . ','. $model->areaname . ',' . $model->townname ?></h2>
        <?php
        $imgname = "";

        if (count($model->propertyimages) > 0) {

            foreach ($model->propertyimages as $value) {

                if ($value->primaryimg == 1 && $value->imagetype == 0) {

                    $imgname = $value->imagename;
                }
            }

            if ($imgname != "") {?>

                <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>" class="listing-background-image">

            <?php
            } else{ ?>

                <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $model->propertyimages[0]->imagename ?>" class="listing-background-image">

            <?php
            }
        } else{ ?>

            <img src="<?php echo Yii::app()->baseUrl;?> . /upload/propertyimages/prop_no_img.jpg" class="listing-background-image">
        <?php } ?>
    </div>
    <div style="text-align: center;">
        <div style="position: relative">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab3.png" style="width: 942px; height: 37px;">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/property/editproperty?pid=<?php echo $model->pid; ?>" style="position: absolute; top: 0px; left: 0px; height: 37px; width: 235px">&nbsp;</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/property/editproperty_step2" style="position: absolute; top: 0px; left: 240px; height: 37px; width: 235px">&nbsp;</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/property/editproperty_step3" style="position: absolute; top: 0px; left: 475px; height: 37px; width: 235px">&nbsp;</a>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/property/editproperty_step4" style="position: absolute; top: 0px; left: 710px; height: 37px; width: 235px">&nbsp;</a>
        </div>
    </div>
    <div style="padding: 10px; 0">
        <p style="font-size: 11px;">Mandatory information is marked with an asterisk <span class="star">*</span></p>
    </div>
    <div id="form" class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'editproperty3-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data'),
        )); ?>
        <legend>
            Listing Copy
            <a href="javascript:history.back();" class="pull-right" style="font-size: 16px; color: #000000"><i class="icon-hand-left"></i> Back to Property Details</a>
        </legend>
        <div>
            <div class="span8">
                <div class="form_bg">
                    <div class="control-group-admin">
                        <label>Head Line</label>
                        <?php echo $form->textArea($model,'headline', array('placeholder'=>'Head Line', 'style' => 'margin-top: 15px', 'rows' => 4, 'class' => 'span8')); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'headline', array('style'=>'width: auto')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Description</label>
                        <?php echo $form->textArea($model,'desc', array('placeholder'=>'Description', 'style' => 'margin-top: 15px', 'rows' => 6, 'class' => 'span8')); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'desc', array('style'=>'width: auto')); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="span4">
            Agency/Agent name or contact details should not be entered into the headline field.
        </div>
    </div>
    <legend>
        Property Images
    </legend>
    <div>
        <div class="span12">
            <div class="form_bg control-group-admin" style="float: left;width: 95%">
                <p style="float: left">Drop an image in this area...</p>
                <a data-toggle="tooltip" title="Images should be in JPG, GIF or PNG format with a recommendation of a 4:3 ratio(for example, 800px * 600px image). Animated GIFs are not allowed. Displaying photos of properties other than the property for sale or lease is not acceptable. 'Too Early for Picture' or images of cartoon houses are also not acceptable.

                    Inserting a business or agency logo as a picture in a property listing is not acceptable unless it takes the form of a transparent watermark inserted in one corner of the image with dimensions no greater than 10% of the total image size." data-placement="right" class="tooltip-custom"></a>

                <div class="clearfix"></div>
                <div class="prop-img-div" class="span12">
                    <div style="padding-left: 25px">
                        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                            array(
                                'id'=>'upload_image_1',
                                'config'=>array(
                                    'action'=>Yii::app()->createUrl('property/propertyimageupload/id/'.$model->pid. '/type/0'),
                                    'allowedExtensions'=>array("jpg", "png"),
                                    'sizeLimit'=>10*1024*1024,
                                    'onComplete'=>'js:function(id, filename, responseJSON){
                                                        if (responseJSON.success == true){
                                                            $.fn.yiiListView.update("list_images_house");
                                                        } else {
                                                            $("#imageScaleErrorMessage p").html(responseJSON.message);
                                                            $("#imageScaleErrorMessage").show().animate({opacity: 1.0}, 3000).fadeOut("slow");
                                                        }
                                                      }'
                                )
                            )); ?>
                        <div id="imageScaleErrorMessage" class="alert alert-block alert-error fade in hide" style="margin-top: 10px;">
                            <h4 class="alert-heading">Oh.. You got an error!</h4>
                            <p></p>
                        </div>
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'id' => 'list_images_house',
                            'dataProvider'=>new CActiveDataProvider('Propertyimages', array('criteria'=>array('condition'=>'propertyid=' . $model->pid . ' AND imagetype = 0', 'order' => 'id ASC'), 'pagination' => false)),
                            'itemView' => '_property_image_list_view',
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------( For Home Sales & Home Rentals )------------------>
    <?php if ($model->type == 1 || $model->type == 3 || $model->type == 4 || $model->type == 5){  ?>
    <legend>
        Floor Plans
    </legend>
    <div>
        <div class="span12">
            <div class="form_bg control-group-admin" style="float: left;width: 95%"">
            <p>Drop a floor plan in this area...
                <a data-toggle="tooltip" title="Floorplans should be in JPG, GIF or PNG format. Animated GIFs are not allowed. Displaying photos of properties other than the property for sale or lease is not acceptable. 'Too Early for Picture' are also not acceptable.

                        Inserting a business or agency logo as a picture in a property listing is not acceptable unless it takes the form of a transparent watermark inserted in one corner of the floorplan with dimensions no greater than 10% of the total floorplan size." data-placement="right" class="tooltip-custom"></a>
            </p>
            <div class="prop-img-div">
                <div class="clearfix"></div>
                <div class="prop-img-div" class="span12">
                    <div style="padding-left: 25px">
                        <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                            array(
                                'id'=>'upload_floor_images',
                                'config'=>array(
                                    'action'=>Yii::app()->createUrl('property/propertyimageupload/id/'.$model->pid . '/type/1'),
                                    'allowedExtensions'=>array("jpg", "png"),
                                    'sizeLimit'=>10*1024*1024,
                                    'onComplete'=>'js:function(id, filename, responseJSON){
                                                        if (responseJSON.success == true){
                                                            $.fn.yiiListView.update("list_images_floor");
                                                        } else {
                                                            $("#imageScaleErrorMessage p").html(responseJSON.message);
                                                            $("#imageScaleErrorMessage").show().animate({opacity: 1.0}, 3000).fadeOut("slow");
                                                        }
                                                      }'
                                )
                            )); ?>
                        <div id="imageScaleErrorMessage" class="alert alert-block alert-error fade in hide" style="margin-top: 10px;">
                            <h4 class="alert-heading">Oh.. You got an error!</h4>
                            <p></p>
                        </div>
                        <?php
                        $this->widget('zii.widgets.CListView', array(
                            'id' => 'list_images_floor',
                            'dataProvider'=>new CActiveDataProvider('Propertyimages', array('criteria'=>array('condition'=>'propertyid=' . $model->pid . ' AND imagetype = 1', 'order' => 'id ASC'), 'pagination' => false)),
                            'itemView' => '_floor_image_list_view',
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!---------( End Home Sales & Hoe Rentals )------------------>
<legend>
    Links
</legend>
<div>
    <div class="span8">
        <div class="form_bg">
            <div class="control-group-admin">
                <label>Video URL</label>
                <?php echo $form->textField($model,'vediourl', array('class' => 'span6')); ?>
                <a onclick="this.href+=document.getElementById('Property_vediourl').value; return true;" class="btn btn-primary" target="_blank">Check Link</a>
            </div>
            <div class="control-group-admin">
                <label>Online Tour 1</label>
                <?php echo $form->textField($model,'onlinetour1', array('class' => 'span6')); ?>
                <a onclick="this.href+=document.getElementById('Property_onlinetour1').value; return true;" class="btn btn-primary" target="_blank">Check Link</a>
            </div>
            <div class="control-group-admin">
                <label>Online Tour 2 </label>
                <?php echo $form->textField($model,'onlinetour2', array('class' => 'span6')); ?>
                <a onclick="this.href+=document.getElementById('Property_onlinetour2').value; return true;" class="btn btn-primary" target="_blank">Check Link</a>
            </div>
        </div>
    </div>
    <div class="span4">
        <u>Video url</u><br/>
        Include a video in your listing and give potential buyers more information about your property.
    </div>
</div>
<div>
    <div class="span8" style="padding-bottom: 10px;">
        <div class="control-group-admin-btn">
            <div class="span12" style="padding-top: 5px;">
                <?php echo CHtml::submitButton('Save & Continue', array('class' => 'btn btn-primary')); ?>
                &nbsp;
                <?php
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
                <a href="<?php echo $url; ?>" class="btn btn-info">Cancel</a>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
</div>
</div>
