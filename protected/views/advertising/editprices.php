<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });
</script>
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span12">
            <h3>Edit Prices</h3>
        </div>
    </div>
    <div class="span12" style="margin-left: 0;">
        <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'editprice-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal'),
            )); ?>
            <div class="form_bg span">
                <div class="control-group-admin">
                    <label>Select Page</label>
                    <div>
                        <?php echo $form->dropDownList($model, 'page', CHtml::listData(Adpages::model()->findAll(), 'id', 'page'), array('empty'=>'Pages')); ?><span class="star">*</span>
                        <?php echo $form->error($model,'page'); ?>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Size & Location</label>
                    <div>
                        <?php echo $form->dropDownList($model, 'size', CHtml::listData(Adsizes::model()->findAll(), 'id', 'size'), array('empty'=>'Ad Sizes')); ?><span class="star">*</span>
                        <?php echo $form->error($model,'size'); ?>
                    </div>
                </div>
                <div class="control-group-admin">
                    <?php echo $form->textField($model,'price', array('placeholder'=>'Price')); ?>
                    <?php echo $form->error($model,'price'); ?><span class="star">*</span>
                </div>
                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>&nbsp;
                        <?php echo CHtml::submitButton('Cancel', array('class' => 'btn btn-info')); ?>
                    </div>
                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
