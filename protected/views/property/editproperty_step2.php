<?php
$this->pageTitle=Yii::app()->name . ' - EditProperty-step2';
$this->breadcrumbs=array(
    'EditProperty-step2',
);
?>
<script type="text/javascript">

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
        <div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab2.png" style="width: 942px; height: 37px;">
        </div>
    </div>
    <div style="padding: 10px; 0">
        <p style="font-size: 11px;">Mandatory information is marked with an asterisk <span class="star">*</span></p>
    </div>
    <div id="form" class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id'=>'editproperty2-form',
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'validateOnChange' => true
        ),
        'htmlOptions'=>array('class'=>'form-horizontal'),
    )); ?>
    <legend>
        About The Property
    </legend>
    <div>
        <div class="span8">
            <div class="form_bg">
                <!---------( For Home Sales & Home Rentals )------------------>
                <?php if ($model->type == 1 || $model->type == 3){  ?>
                    <div class="control-group-admin">
                        <label>Bed Rooms</label>
                        <?php
                        $array_bedrooms= array(1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                            6 => '6',
                            7 => '7',
                            8 => '8',
                            9 => '9',
                            10 => '10');
                        ?>
                        <?php echo $form->dropDownList($model, 'bedrooms', $array_bedrooms, array('empty'=>'Bed Rooms')); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'bedrooms', array('style'=>'width: auto')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Bath Rooms</label>
                        <?php
                        $array_bathrooms= array(1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                            6 => '6',
                            7 => '7',
                            8 => '8',
                            9 => '9',
                            10 => '10');
                        ?>
                        <?php echo $form->dropDownList($model, 'bathrooms', $array_bathrooms, array('empty'=>'Bath Rooms')); ?><span class="star">*</span> <lable>including ensuites</lable>
                        <?php echo $form->error($model, 'bathrooms', array('style'=>'width: auto')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Ensuites</label>
                        <?php echo $form->textField($model,'ensuites', array('placeholder'=>'Ensuites')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Toilets</label>
                        <?php echo $form->textField($model,'toilets', array('placeholder'=>'Toilets')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Parking - Garage Spaces</label>
                        <?php echo $form->textField($model,'parkgaragespaces', array('placeholder'=>'Parking - Garage Spaces')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Parking - Carpet Spaces</label>
                        <?php echo $form->textField($model,'parkcarpetspaces', array('placeholder'=>'Parking - Carpet Spaces')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Parking - Open Spaces</label>
                        <?php echo $form->textField($model,'parkopenspaces', array('placeholder'=>'Parking - Open Spaces')); ?>
                        <a href="#" data-toggle="tooltip" title="The number of car spaces available on the property that are neither a garage nor carport (e.g. A paved uncovered tandem parking space would be considered 2 open spaces)" data-placement="right" class="tooltip-custom"></a>
                    </div>
                    <div class="control-group-admin">
                        <label>Living Areas</label>
                        <?php echo $form->textField($model,'livingarea', array('placeholder'=>'Living Areas')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>House Size</label>
                        <?php echo $form->textField($model,'housesize', array('placeholder'=>'House Size')); ?>
                        <?php echo $form->error($model,'housesize'); ?>
                        <?php
                        $array_housesq= array(1 => 'Square Feet', 2 => 'Square Meters');
                        ?>
                        <?php echo $form->dropDownList($model, 'housesquares', $array_housesq); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'housesquares', array('style'=>'width: auto')); ?>
                    </div>
                <?php } ?>
                <!---------( End Home Sales & Home Rentals )------------------>
                <!---------( For Home Sales, Land Sales, Commercial Sales & Commercial Leased )------------------>
                <?php if ($model->type == 1 || $model->type == 2 || $model->type == 4 || $model->type == 5){  ?>
                    <div class="control-group-admin">
                        <?php echo $form->textField($model,'landsize', array('placeholder'=>'Land Size')); ?>
                        <?php echo $form->error($model,'landsize'); ?>
                        <?php
                        $array_landsq= array(1 => 'Square Feet', 2 => 'Square Meters', 3 => 'Hectares', 4 => 'Acres');
                        ?>
                        <?php echo $form->dropDownList($model, 'landsquares', $array_landsq); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'landsquares', array('style'=>'width: auto')); ?>
                    </div>
                <?php } ?>
                <!---------( End Home Sales, Land Sales, Commercial Sales & Commercial Leased )------------------>
                <!---------( For Commercial Sales & Commercial Leased )------------------>
                <?php if ($model->type == 4 || $model->type == 5){  ?>
                    <div class="control-group-admin">
                        <label>Floor Area</label>
                        <?php echo $form->textField($model,'floorarea', array('placeholder'=>'Floor Area')); ?><span class="star">*</span>
                        <?php echo $form->error($model,'floorarea'); ?>
                        <?php
                        $array_landsq= array(1 => 'Square Feet', 2 => 'Square Meters', 3 => 'Hectares', 4 => 'Acres');
                        ?>
                        <?php echo $form->dropDownList($model, 'floorsquares', $array_landsq); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'floorsquares', array('style'=>'width: auto')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Tenure Type</label>
                        <?php echo $form->textField($model,'tenuretype', array('placeholder'=>'Tenure Type')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Building</label>
                        <?php echo $form->textField($model,'building', array('placeholder'=>'Building')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Parking Spaces</label>
                        <?php
                        $array_parkingspaces= array(1 => '1',
                            2 => '2',
                            3 => '3',
                            4 => '4',
                            5 => '5',
                            6 => '6',
                            7 => '7',
                            8 => '8',
                            9 => '9',
                            10 => '10',
                            11 => 'More Than 10',
                            12 => 'More Than 15',
                            13 => 'More Than 20',
                            14 => 'More Than 25');
                        ?>
                        <?php echo $form->dropDownList($model, 'parkingspaces', $array_parkingspaces, array('empty'=>'Parking Spaces')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Parking Comments</label>
                        <?php echo $form->textField($model,'parkcomment', array('placeholder'=>'Parking Comments')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Zoning</label>
                        <?php echo $form->textField($model,'zoning', array('placeholder'=>'Zoning')); ?>
                    </div>
                <?php } ?>
                <!---------( End Commercial Sales & Commercial Leased )------------------>
                <!---------( For Commercial Leased )------------------>
                <?php if ($model->type == 5){  ?>
                    <div class="control-group-admin">
                        <label>Outgoings</label>
                        <?php echo $form->textField($model,'outgoings', array('placeholder'=>'Outgoings')); ?>
                    </div>
                <?php } ?>
                <!---------( End Commercial Leased )------------------>
                <!---------( For Home Sales & Home Rentals )------------------>
                <?php if ($model->type == 1 || $model->type == 3){  ?>
                    <div class="control-group-admin">
                        <label>Energy Efficiency Rating</label>
                        <?php
                        $array_parkingspaces= array(1 => '0',
                            2 => '0.5',
                            3 => '1',
                            4 => '1.5',
                            5 => '2',
                            6 => '2.5',
                            7 => '3',
                            8 => '3.5',
                            9 => '4',
                            10 => '4.5',
                            11 => '5',
                            12 => '5.5',
                            13 => '6',
                            14 => '6.5',
                            15 => '7',
                            16 => '7.5',
                            17 => '8',
                            18 => '8.5',
                            19 => '9',
                            20 => '9.5',
                            21 => '10');
                        ?>
                        <?php echo $form->dropDownList($model, 'eer', $array_parkingspaces, array('empty'=>'Energy Efficiency Rating')); ?>
                    </div>
                <?php } ?>
                <!---------( End Home Sales & Home Rentals )------------------>
            </div>
        </div>
    </div>
    <!---------( For Home Sales & Home Rentals )------------------>
    <?php if ($model->type == 1 || $model->type == 3){  ?>
        <legend>
            Search Refinement Options
        </legend>
        <div>
            <div class="span8">
                <div class="form_bg">
                    <div class="span12 bottom-line">
                        <label><b>Outdoor Features:</b></label>
                        <div  class="span5">
                            <div class="control-group-admin">
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'balcony',array('value'=>1, 'uncheckValue'=>0));?> Balcony
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'deck',array('value'=>1, 'uncheckValue'=>0));?> Deck
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'oea',array('value'=>1, 'uncheckValue'=>0));?> Outdoor Entertainment Area
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'remotegarage',array('value'=>1, 'uncheckValue'=>0));?> Remote Garage
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'shed',array('value'=>1, 'uncheckValue'=>0));?> Shed
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'swimpool',array('value'=>1, 'uncheckValue'=>0));?> Swimming Pool
                                </label>
                            </div>
                        </div>
                        <div  class="span6">
                            <div class="control-group-admin">
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'courtyard',array('value'=>1, 'uncheckValue'=>0));?> Courtyard
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'fullyfenced',array('value'=>1, 'uncheckValue'=>0));?> Fully Fenced
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'outsidespa',array('value'=>1, 'uncheckValue'=>0));?> Outside Spa
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'securepark',array('value'=>1, 'uncheckValue'=>0));?> Secure Parking
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'tenniscourt',array('value'=>1, 'uncheckValue'=>0));?> Tennis Court
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'spabovroundeg',array('value'=>1, 'uncheckValue'=>0));?> Swimming Pool - Above Ground
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="span12 bottom-line" style="margin-left: 0px; padding-top: 10px;">
                        <label><b>Indoor Features:</b></label>
                        <div  class="span5">
                            <div class="control-group-admin">
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'alarmsys',array('value'=>1, 'uncheckValue'=>0));?> Alarm System
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'biltinwardrobes',array('value'=>1, 'uncheckValue'=>0));?> Built in Wardrobes
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'dvs',array('value'=>1, 'uncheckValue'=>0));?> Ducted Vacuum System
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'gym',array('value'=>1, 'uncheckValue'=>0));?> Gym
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'intercom',array('value'=>1, 'uncheckValue'=>0));?> Intercom
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'rumpusroom',array('value'=>1, 'uncheckValue'=>0));?> Rumpus Room
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'workshop',array('value'=>1, 'uncheckValue'=>0));?> Workshop
                                </label>
                            </div>
                        </div>
                        <div  class="span6">
                            <div class="control-group-admin">
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'broadbandinternet',array('value'=>1, 'uncheckValue'=>0));?> Broadband Internet Available
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'dishwasher',array('value'=>1, 'uncheckValue'=>0));?> Dishwasher
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'floorboards',array('value'=>1, 'uncheckValue'=>0));?> Floorboards
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'insidespa',array('value'=>1, 'uncheckValue'=>0));?> Inside Spa
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'paytv',array('value'=>1, 'uncheckValue'=>0));?> Pay TV Access
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'study',array('value'=>1, 'uncheckValue'=>0));?> Study
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="span12 bottom-line" style="margin-left: 0px; padding-top: 10px;">
                        <label><b>Heating / Cooling:</b></label>
                        <div  class="span5">
                            <div class="control-group-admin">
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'ac',array('value'=>1, 'uncheckValue'=>0));?> Air Conditioning
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'heating',array('value'=>1, 'uncheckValue'=>0));?> Heating
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'cooling',array('value'=>1, 'uncheckValue'=>0));?> Cooling
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="span12 bottom-line" style="margin-left: 0px; padding-top: 10px;">
                        <label><b>Eco Friendly Features:</b></label>
                        <div  class="span5">
                            <div class="control-group-admin">
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'solarpower',array('value'=>1, 'uncheckValue'=>0));?> Solar Panels
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'solarhotwater',array('value'=>1, 'uncheckValue'=>0));?> Solar Hot Water
                                </label>
                                <label class="checkbox">
                                    <?php echo $form->checkBox($model,'watertank',array('value'=>1, 'uncheckValue'=>0));?> Water Tank
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="control-group-admin">
                        <label>Other Features...</label>
                        <?php echo $form->textArea($model,'otherfeatures', array('placeholder'=>'Other Features...', 'style' => 'margin-top: 5px', 'rows'=>3, 'class' => 'span8')); ?>
                    </div>
                </div>
            </div>
            <div class="span4">
                <p>Select applicable features to help website users refine their search.</p>
            </div>
        </div>
    <?php } ?>
    <!---------( End Home Sales & Hoe Rentals )------------------>
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
