<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="content-wrapper clearfix">

        <div class="span9 pull-left">
            <div class="content-holder">
                <div id="title-listing" class="container">
                    <div class="property-list-title">Login</div>
                </div>
                <div class="span-12 offset1">
                    <div class="form" style="padding-top: 10px;">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableClientValidation'=>true,
                            'clientOptions'=>array(
                                'validateOnSubmit'=>true,
                            ),
                            'htmlOptions'=>array('class'=>'form-horizontal'),
                            'focus'=>array($model,'username')
                        )); ?>

                            <div class="control-group">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-user"></i></span>
                                    <?php echo $form->textField($model,'username', array('placeholder'=>'Username')); ?>
                                </div>
                                <?php echo $form->error($model,'username'); ?>
                            </div>
                            <div class="control-group">
                                <div class="input-prepend">
                                    <span class="add-on"><i class="icon-lock"></i></span>
                                    <?php echo $form->passwordField($model,'password', array('placeholder'=>'Password')); ?>
                                </div>
                                <?php echo $form->error($model,'password'); ?>
                            </div>
                            <div class="control-group">
                                <div>
                                    <?php echo $form->checkBox($model,'rememberMe', array('class' => 'checkbox inline')); ?>
                                    <?php echo $form->label($model,'rememberMe', array('class' => 'checkbox inline', 'style'=> 'margin:-10px')); ?>
                                </div>
                                <?php echo $form->error($model,'rememberMe'); ?>
                            </div>
                            <div class="control-group">
                                <div class="span1" style="margin-left: 0px;">
                                    <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
                                </div>
                                <div class="span-3" style="margin-left: 10px; padding-top: 5px;">
                                    Not a Member? <a href="<?php echo Yii::app()->request->baseUrl; ?>/register">Register</a>
                                </div>
                            </div>
                            <div class="control-group">
                                <a href="#">Forgot Your Password ?</a>
                            </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3 hidden-phone">
            <div class="row-fluid">
                <div calss="ads_placeholder span6" style="padding-top: 30px;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ad.jpg" alt="advertiesment" class="img-thumb"/>
                </div>
                <div calss="ads_placeholder_half span6" style="padding-top: 10px;">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/geico-banner.jpg" alt="advertiesment" class="img-thumb"/>
                </div>
            </div>
        </div>
</div>
