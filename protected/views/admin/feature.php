<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_feature').addClass('active');
    });

    //---------------Form Send Function----//
    function formSend(form, data, hasError){

        if (hasError) {

            if ($('.error:first').length > 0){

                $(window).scrollTop($('.error:first').offset().top);
            }

            return false;
        }

        return true;
    }
</script
<?php
$this->pageTitle=Yii::app()->name . ' - Feature Control';
$this->breadcrumbs=array(
    'Feature Control',
);
?>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="min-height: 400px">
        <div class="content-holder">
            <legend>
                <h3>Admin Feature Control</h3>
            </legend>
            <div class="span10 offset1">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'feature-control-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                            'validateOnChange'=>true,
                            'afterValidate' => 'js:formSend',
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data')
                    )); ?>
                    <div class="span9">
                        <div class="control-group">
                            <label>Featured Property Expiration Dates</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'featured_property_expire_dates', array('placeholder'=>'Number of days to expire')); ?>
                            </div>
                            <?php echo $form->error($model,'featured_property_expire_dates'); ?>
                        </div>
                        <div class="control-group">
                            <label>Featured Property Display Limit</label>
                            <div class="input-prepend">
                                <?php echo $form->textField($model,'featured_property_display_count', array('placeholder'=>'Number of Properties to Display')); ?>
                            </div>
                            <?php echo $form->error($model,'featured_property_display_count'); ?>
                        </div>
                        <div class="control-group">
                            <div>
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
