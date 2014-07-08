<style type="text/css">

    .list-view .summary {
        display: none;
    }

    .list-view .empty {
        display: none;
    }

</style>
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
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
                                <div class="property-list-title">Login</div>
                            </div>
                            <div class="span12 offset1">
                                <div class="container-fluid">
                                    <div class="row-fluid">
                                        <div class="span5">
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
                                                        <?php echo $form->textField($model,'username', array('placeholder'=>'Username', 'style' => 'width:auto !important')); ?>
                                                    </div>
                                                    <?php echo $form->error($model,'username'); ?>
                                                </div>
                                                <div class="control-group">
                                                    <div class="input-prepend">
                                                        <span class="add-on"><i class="icon-lock"></i></span>
                                                        <?php echo $form->passwordField($model,'password', array('placeholder'=>'Password', 'style' => 'width:auto !important')); ?>
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
                                        <div class="span6">
                                            <div class="panel panel-default">
                                                <div class="alert alert-info"  style="padding: 20px">
                                                    <h4>Before <b>POST YOUR FREE AD</b> you need to Login first...!!</h4><br/>
                                                    If you are not a <b>Registered Member of 'myproperty.lk'</b> click here to Register Now..!
                                                    <br/><br/>
                                                    <div class="text-center">
                                                        <a class="btn btn-info" href="<?php echo Yii::app()->request->baseUrl; ?>/register">Register</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span3 hidden-phone">
                        <div class="row-fluid">
                            <?php

                            $condition = '(page = 6 AND (size = 1 OR size = 3 OR size = 5) AND status = 1) AND expiredate >= CURDATE()';

                            $this->widget('zii.widgets.CListView', array(
                                'id' => 'list_advertisement',
                                'dataProvider'=>new CActiveDataProvider('Advertising', array('criteria'=>array('condition'=> $condition,'order' => 'entrydate DESC'),'pagination'=>false)),
                                'itemView' => '_ads_list_view'
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

