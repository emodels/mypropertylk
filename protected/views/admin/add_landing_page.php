<style type="text/css">
    .error {
        color: red;
    }
</style>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span7">
            <h3>Add Landing Page</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="span12" style="margin-left: 0px">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id'=>'add-landingpage-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
            ),
            'htmlOptions'=>array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'),
        )); ?>
        <div class="container-fluid" style="padding: 0;">
            <div class="control-group-admin">
                <label>Page Title</label>
                <?php echo $form->textField($model,'title', array('class'=>'span6', 'placeholder'=>'Page Title')); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>
            <div class="control-group-admin">
                <label>Page Description</label>
                <?php echo $form->textArea($model,'description', array('rows'=>3, 'class'=>'span12', 'placeholder'=>'Page Description')); ?>
                <?php echo $form->error($model,'description'); ?>
            </div>
            <div class="control-group-admin">
                <label>Page Content - Text</label>
                <?php

                $this->widget('application.extensions.cleditor.ECLEditor', array(
                    'model'=>$model,
                    'attribute'=>'page_content', //Model attribute name. Nome do atributo do modelo.
                    'options'=>array(
                        'width'=>'100%',
                        'height'=>250,
                        'useCSS'=>true,
                    ),
                    'value'=>$model->page_content, //If you want pass a value for the widget. I think you will. Se você precisar passar um valor para o gadget. Eu acho irá.
                ));
                ?>
            </div>
            <div class="control-group-admin">
                <label>Page Content - Image</label>
                <?php echo $form->fileField($model, 'background_image'); ?>
            </div>
            <div class="control-group-admin">
                <label>Notification Email</label>
                <?php echo $form->textField($model,'notification_email', array('class'=>'span6', 'placeholder'=>'Notification Email')); ?>
                <?php echo $form->error($model,'notification_email'); ?>
            </div>
            <div class="control-group-admin-btn">
                <div class="span12" style="padding-top: 5px;">
                    <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-primary')); ?>
                    &nbsp;
                    <a href="<?php echo Yii::app()->baseUrl . '/admin/home'; ?>" class="btn btn-info">Cancel</a>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>