<?php
$this->pageTitle=Yii::app()->name . ' - EditProperty';
$this->breadcrumbs=array(
    'EditProperty',
);

?>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

        $('#Propertytyperelation_typeid').change(function () {
            if ($(this).val() == null){
                $(this).parent().removeClass('success').addClass('error');
                $(this).parent().find('.errorMessage').css('display','block');
            } else {
                $(this).parent().removeClass('error').addClass('success');
                $(this).parent().find('.errorMessage').css('display','none');
            }
        });
    });

    function formSend(form, data, hasError){

        if ($('#Propertytyperelation_typeid').val() == null){
            $('#Propertytyperelation_typeid').parent().removeClass('success').addClass('error');
            $('#Propertytyperelation_typeid').parent().find('.errorMessage').css('display','block');
            hasError = true;
        }

        if (hasError) {

            if ($('.error:first').length > 0){
                $(window).scrollTop($('.error:first').offset().top);
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
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab1.png" style="width: 942px; height: 37px;">
        </div>
    </div>
    <div style="padding: 10px; 0">
        <p style="font-size: 11px;">Mandatory information is marked with an asterisk <span class="star">*</span></p>
    </div>
    <div>
            <legend>
                About The Listings
            </legend>
            <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'editproperty1-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <div class="span8">
                <div class="form_bg">
                    <div class="control-group-admin">
                        <label>Property Type</label>
                        <?php $this->widget('ext.bootstrap-select.TbSelect',array(
                            'model' => $modeltype,
                            'attribute' => 'typeid',
                            'data' => CHtml::listData(Propertytype::model()->findAll(),'id','proptype'),
                            'htmlOptions' => array(
                                'multiple' => true,
                                'multiple title'=> 'Property Type'
                            ),
                        )); ?><span class=star>*</span>
                        <div class="errorMessage" style="display: none">Property Type cannot be blank.</div>
                    </div>
                    <div class="control-group-admin">
                        <div class="row">
                            <div class="compactRadioGroup" style="margin: 0px 0 0;">
                                <?php echo $form->radioButtonList($model,'propcondition',array(1 =>'Established Property <span class=star>*</span>',2 =>'New Construction <span class=star>*</span>'), array('labelOptions' => array('style'=>'display:inline; margin-bottom:10px;'),'style'=>'margin: 0.2em 0 0.5em 0;')); ?>
                                <?php echo $form->error($model, 'propcondition'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="control-group-admin">
                        <label>Agents</label>
                        <?php echo $form->dropDownList($model, 'agent', $agentListData, array('empty'=>'Agents')); ?><span class="star">*</span>
                        <a href="#" data-toggle="tooltip" title="The agent name list is maintained in 'Your Profile - Agents' section." data-placement="right" class="tooltip-custom"></a>
                        <?php echo $form->error($model, 'agent', array('style'=>'width:auto')); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Other Agents</label>
                        <?php echo $form->dropDownList($model, 'otheragent', $otherAgentListData, array('empty'=>'Other Agents')); ?>
                        <a href="#" data-toggle="tooltip" title="The agent name list is maintained in 'Your Profile - Agents' section." data-placement="right" class="tooltip-custom"></a>
                    </div>
                    <!---------( For Rental )------------------>
                    <?php if ($model->type == 3 || $model->type == 5){  ?>
                        <div class="control-group-admin">
                            <label>Rental Per Week</label>
                            <?php echo $form->textField($model,'weeklyrent', array('placeholder'=>'Rental Per Week')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'weeklyrent'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Rental Per Calendar Month</label>
                            <?php echo $form->textField($model,'monthlyrent', array('placeholder'=>'Rental Per Calendar Month')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'monthlyrent'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Security Bond</label>
                            <?php echo $form->textField($model,'securebond', array('placeholder'=>'Security Bond')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'securebond'); ?>
                        </div>
                    <?php } ?>
                    <!--------( End Rental)----------------->
                    <?php if ($model->type == 1 || $model->type == 2 || $model->type == 4){  ?>
                    <div class="control-group-admin">
                        <label>Price</label>
                        <?php echo $form->textField($model,'price', array('placeholder'=>'Price')); ?><span class="star">*</span>
                        <a href="#" data-toggle="tooltip" title="Price is used to determine the listing's relevance in search results. Price will display on the property unless the option to hide price is used." data-placement="right" class="tooltip-custom"></a>
                        <?php echo $form->error($model,'price'); ?>
                    </div>
                    <div class="control-group-admin">
                        <label>Display Price :</label>
                        <div class="row">
                            <div class="compactRadioGroup" style="margin: 0px 0 0;">
                                <?php echo $form->radioButtonList($model,'dispalyprice',array(1 =>'Show actual price.',
                                        2 =>'Show text instead of price.<a href=# data-toggle=tooltip title="The price entered will be shown on the website. You can enter alternative price display text in the Optional Price Text field or hide the price on the website and Contact agent will be shown in place of the price if preferred." data-placement=right class=tooltip-custom></a>',
                                        3 => 'Hide the Price and Dispaly <b>Contact Agent</b>.<a href=# data-toggle=tooltip title="If you elect to hide the price on the website, Contact agent will be shown in place of the price. You can enter alternative price display text in the Optional Price Text field if preferred" data-placement=right class=tooltip-custom></a>'),
                                    array('labelOptions' => array('style'=>'display:inline; margin-bottom:10px;'),'style'=>'margin: 0.2em 0 0.5em 0;')); ?>
                                <?php echo $form->error($model, 'dispalyprice'); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!---------( For Rental )------------------>
                    <?php if ($model->type == 3){  ?>
                        <div class="control-group-admin">
                            <label>Available Date</label>
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model'=>$model,
                                'attribute'=>'availabledate',
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    'dateFormat'=>'yy-mm-dd',
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                                    'constrainInput' => 'false',
                                    'yearRange' => 'c-15:c+15'
                                ),
                                'htmlOptions'=>array(
                                    'style'=>'width: 300px',
                                    'readonly'=>'readonly'
                                ),
                            ));
                            ?>
                            <?php echo $form->error($model, 'availabledate', array('style'=>'width: auto')); ?><span class="star">*</span>
                            <?php echo CHtml::submitButton('Available Now', array('class' => 'btn btn-primary')); ?>
                        </div>
                    <?php } ?>
                    <!--------( End Rental)----------------->
                </div>
            </div>

            <!---------( For Home Sales, Land Sales )------------------>
            <?php if ($model->type == 1 || $model->type == 2){  ?>
                <legend>
                    Vendor Details
                </legend>
            <?php } ?>
            <!--------( End Home Sales, Land Sales)----------------->
            <!---------( For Rental )------------------>
            <?php if ($model->type == 3){  ?>
                <legend>
                    Landlord Details
                </legend>
            <?php } ?>
            <!--------( End Rental)----------------->
            <div>
                <div class="span8">
                    <div class="form_bg">
                        <div class="control-group-admin">
                            <label>Name</label>
                            <?php echo $form->textField($model,'vendorname', array('placeholder'=>'Name')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'vendorname'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Eamil Address</label>
                            <?php echo $form->textField($model,'vendoremail', array('placeholder'=>'Eamil Address')); ?><span class="star">*</span>
                            <a href="#" data-toggle="tooltip" title="You may enter multiple email addresses separated by a comma (e.g. mary@email.com, john@email.com)." data-placement="right" class="tooltip-custom"></a>
                            <?php echo $form->error($model,'vendoremail'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Phone Number</label>
                            <?php echo $form->textField($model,'vendorphone', array('placeholder'=>'Phone Number')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'vendorphone'); ?>
                        </div>
                        <div class="control-group-admin <?php echo Yii::app()->user->usertype != 0 ? ' hide' : ''; ?>">
                            <label class="checkbox">
                                <?php echo $form->checkBoxList($model,'sendemail', array(1 => 'Show vendor details instead of Agent details'), array('labelOptions'=> array('class'=>'span9'))); ?>
                                <a href="#" data-toggle="tooltip" title="The Property detail page will display Vendors contact information, instead of Agent's contact information." data-placement="right" class="tooltip-custom"></a>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <p>The vendor information gathered is not displayed on the website. This information allows you to send communications directly to the vendor of the property in the following emails:</p>
                </div>
            </div>
            <legend>
                Property Address
            </legend>
            <div>
                <div class="span8">
                    <div class="form_bg">
                        <!---------( For Home Sales, Land Sales )------------------>
                        <?php if ($model->type == 1 || $model->type == 3){  ?>
                            <div class="control-group-admin">
                                <label>Unit Number</label>
                                <?php echo $form->textField($model,'unitnum', array('placeholder'=>'Unit Number')); ?><span class="star">*</span>
                                <?php echo $form->error($model,'unitnum'); ?>
                            </div>
                        <?php } ?>
                        <!---------( End Home Sales, Land Sales )------------------>
                        <!---------( For Home Sales, Land Sales )------------------>
                        <?php if ($model->type == 2){  ?>
                            <div class="control-group-admin">
                                <label>Lot Number</label>
                                <?php echo $form->textField($model,'lotnum', array('placeholder'=>'Lot Number')); ?><span class="star">*</span>
                                <?php echo $form->error($model,'lotnum'); ?>
                            </div>
                        <?php } ?>
                        <!---------( End Home Sales, Land Sales )------------------>
                        <div class="span12 control-group-admin" style="margin-left: 0">
                            <div class="span2">
                                <label>Number</label>
                                <?php echo $form->textField($model,'number', array('placeholder'=>'Number', 'class'=>'span11')); ?>
                                <?php echo $form->error($model,'number'); ?>
                            </div>
                            <div class="span10">
                                <label>Street Address</label>
                                <?php echo $form->textField($model,'streetaddress', array('placeholder'=>'Street Address')); ?><span class="star">*</span>
                                <?php echo $form->error($model,'streetaddress'); ?>
                            </div>
                        </div>
                        <div class="control-group-admin">
                            <label>Area Name</label>
                            <?php echo $form->textField($model,'areaname', array('placeholder'=>'Area Name')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'areaname'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Town Name</label>
                            <?php echo $form->textField($model,'townname', array('placeholder'=>'Town Name')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'townname'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Communication Preferences:</label>
                            <label class="checkbox">
                                <?php echo CHtml::checkBoxList('sendemail','', array(1 => 'Hide street address on listing.'), array('labelOptions'=> array('class'=>'span5'))); ?>
                                <a href="#" data-toggle="tooltip" title="If you elect to hide the street address, only the suburb will be shown on the website and the street view will be disabled automatically." data-placement="right" class="tooltip-custom"></a>
                            </label>
                        </div>
                        <div class="control-group-admin">
                            <label>District</label>
                            <?php echo $form->dropDownList($model, 'district', CHtml::listData(District::model()->findAll(), 'id', 'name'), array('empty'=>'District')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'district'); ?>
                        </div>
                        <div class="control-group-admin">
                            <label>Province</label>
                            <?php echo $form->dropDownList($model, 'province', CHtml::listData(Province::model()->findAll(), 'id', 'name'), array('empty'=>'Province')); ?><span class="star">*</span>
                            <?php echo $form->error($model,'province'); ?>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <p>The District selected cannot be changed once you purchase any additional upgrade options for your listing.</p>
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
</div>
