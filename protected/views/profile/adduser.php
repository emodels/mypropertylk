<?php
$this->pageTitle=Yii::app()->name . ' - AddUser';
$this->breadcrumbs=array(
    'AddUser',
);
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_manage').addClass('active');
    });

</script>

<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="content-holder">
            <legend>
                <h3>Add New User</h3>
            </legend>
            <div class="span10 offset1">
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
                        <div style="margin-bottom: 0; padding: 8px; margin-top: 10px; color: rgba(128, 0, 0, 0.57); background-color: rgba(255, 149, 132, 0.44); border: solid 1px rgba(177, 41, 36, 0.50); border-radius: 5px;">
                            <strong>Warning!</strong><br/> Please check your Profile Image width and height is 90px and 100px before uploading ...!
                        </div>
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
</div>
