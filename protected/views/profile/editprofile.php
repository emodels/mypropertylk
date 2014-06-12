<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_editprof').addClass('active');
    });
</script
<?php
$this->pageTitle=Yii::app()->name . ' - Edit Profile';
$this->breadcrumbs=array(
    'Edit Profile',
);
?>
<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="content-holder">
            <legend>
                <h3>Edit Your Profile</h3>
            </legend>
            <div class="span10 offset1">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'editprof-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                            'validateOnChange'=>true
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data')
                    )); ?>
                    <div class="span9">
                        <div class="control-group">
                            <label>FirstName</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'fname', array('placeholder'=>'FirstName')); ?>
                            </div>
                            <?php echo $form->error($model,'fname'); ?>
                        </div>
                        <div class="control-group">
                            <label>LastName</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'lname', array('placeholder'=>'LastName')); ?>
                            </div>
                            <?php echo $form->error($model,'lname'); ?>
                        </div>
                       <div class="control-group">
                           <label>Phone</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'phone', array('placeholder'=>'Phone')); ?>
                            </div>
                            <?php echo $form->error($model,'phone'); ?>
                        </div>
                        <div class="control-group">
                            <label>Address</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'address', array('placeholder'=>'Address')); ?>
                            </div>
                            <?php echo $form->error($model,'address'); ?>
                        </div>
                        <div class="control-group">
                            <label>EmailAddress</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'email', array('placeholder'=>'EmailAddress')); ?>
                            </div>
                            <?php echo $form->error($model,'email'); ?>
                        </div>
                        <div class="control-group">
                            <label>Profile Image (<i>optional</i>)</label>
                            <?php echo $form->fileField($model, 'userimage',array(),array('tabindex'=>13));
                            if(isset($model->userimage))
                            {
                                echo CHtml::image(Yii::app()->controller->createUrl('upload/userimages/'.$model->userimage), "No Image",array('style'=>'width:90pxs; height:100px; border:solid 1px silver;'));
                            }
                            ?>

                        </div>
                        <div class="control-group">
                            <div>
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
                                &nbsp;
                                <?php echo CHtml::submitButton('Cancel', array('class' => 'btn btn-info')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
