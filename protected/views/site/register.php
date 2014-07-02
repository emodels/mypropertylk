<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
    'Register',
);
?>
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="content-wrapper clearfix">
                    <div class="span9">
                        <div class="content-holder">
                            <div id="title-listing" class="container">
                                <div class="property-list-title">Register</div>
                            </div>
                            <div class="span-12 offset1">
                                <p>Please fill the following fields to register with myproperty.lk:</p>
                                <div class="form">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'register-form',
                                        'enableClientValidation'=>true,
                                        'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                            'validateOnChange'=>true
                                        ),
                                        'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data')
                                    )); ?>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->textField($model,'fname', array('placeholder'=>'FirstName')); ?>
                                        </div>
                                        <?php echo $form->error($model,'fname'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->textField($model,'lname', array('placeholder'=>'LastName')); ?>
                                        </div>
                                        <?php echo $form->error($model,'lname'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->textField($model,'phone', array('placeholder'=>'Phone')); ?>
                                        </div>
                                        <?php echo $form->error($model,'phone'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->textField($model,'address', array('placeholder'=>'Address')); ?>
                                        </div>
                                        <?php echo $form->error($model,'address'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->textField($model,'email', array('placeholder'=>'EmailAddress')); ?>
                                        </div>
                                        <?php echo $form->error($model,'email'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->textField($model,'username', array('placeholder'=>'Username')); ?>
                                        </div>
                                        <?php echo $form->error($model,'username'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
                                        </div>
                                        <?php echo $form->error($model,'password'); ?>
                                    </div>
                                    <div class="control-group">
                                        <div class="input-prepend">
                                            <?php echo $form->passwordField($model,'passwordconf', array('placeholder'=>'Re-EnterPassword')); ?>
                                        </div>
                                        <?php echo $form->error($model,'passwordconf'); ?>
                                    </div>
                                    <div class="control-group">
                                        <label>Profile Image (<i>optional</i>)</label>
                                        <?php echo $form->fileField($model, 'userimage'); ?>
                                    </div>
                                    <div class="control-group">
                                        <p>Please Select the User Type:</p>
                                        <div class="row">
                                            <div class="compactRadioGroup" style="margin: 0px 0 0;">
                                                <?php
                                                echo $form->radioButtonList($model,'usertype', array(1=>'Member', 2=>'Agent', 3=>'Advertiser'), array('labelOptions' => array('style'=>'display:inline;'), 'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;'));
                                                ?>
                                                <?php echo $form->error($model, 'usertype'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div>
                                            <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-primary')); ?>&nbsp;
                                            <?php echo CHtml::submitButton('Cancel', array('class' => 'btn btn-info', 'onClick'=>'history.go(-1);return true;')); ?>
                                        </div>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span3 hidden-phone">
                        <div class="row-fluid">
                            <div calss="ads_placeholder span6" style="padding-top: 30px;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad.jpg" alt="advertiesment"/>
                            </div>
                            <div calss="ads_placeholder span6" style="padding-top: 10px;">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/Advertise-Here.jpg" alt="advertiesment"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

