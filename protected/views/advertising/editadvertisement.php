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
        <div class="span7">
            <h3>Edit Advertisement</h3>
        </div>
        <div class="offset2 span2">
            <div class="hidden-phone" style="padding-top: 20px;"></div>
            <!---------( For Add NewUsers )------------------>
            <div class="btn-group" style="padding-bottom: 5px;">
                <button class="btn btn-primary"><a href="<?php echo Yii::app()->request->baseUrl; ?>/advertising/addadvertisement" style="text-decoration: none; color: #ffffff">Add New Advertisement</a></button>
            </div>
            </div>
    </div>
    <div class="span12" style="margin-left: 0;">
        <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'editadvertisement-form',
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'validateOnChange' => true,
                    'afterValidate' => 'js:formSend',
                ),
                'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data'),
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
                    <label>Select an Advertiser</label>
                    <div>
                        <?php echo $form->dropDownList($model, 'advertiser', $advertiserListData, array('empty'=>'Advertiser')); ?><span class="star">*</span>
                        <?php echo $form->error($model, 'advertiser', array('style'=>'width:auto')); ?>
                    </div>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Image</label>
                    <div>
                        <?php echo $form->fileField($model, 'adimage');
                        if(isset($model->adimage))
                        {
                            echo CHtml::image(Yii::app()->controller->createUrl('upload/adimages/'.$model->adimage), "No Image",array('style'=>'border:solid 1px silver;'));
                        }
                        ?>
                    </div>
                    <div style="margin-bottom: 0; padding: 8px; margin-top: 10px; color: rgba(128, 0, 0, 0.57); background-color: rgba(255, 149, 132, 0.44); border: solid 1px rgba(177, 41, 36, 0.50); border-radius: 5px;">
                        <strong>Warning!</strong><br/> Please check your Advertisement Image width and height is similar to selected ad size, before uploading ...!
                    </div>
                </div>
                <div class="control-group-admin">
                    <?php echo $form->textField($model,'adlink', array('placeholder'=>'Advertisement Link')); ?>
                    <?php echo $form->error($model,'adlink'); ?><span class="star">*</span>
                </div>
                <div class="control-group-admin">
                    <label>Advertisement Expiration Date</label>
                    <?php
                    if (Yii::app()->user->usertype == 0) {

                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model'=>$model,
                            'attribute'=>'expiredate',
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
                    } else {
                    ?>

                    <?php echo $form->textField($model,'expiredate', array('readonly'=>'readonly')); ?>

                    <?php } ?>
                    <?php echo $form->error($model, 'expiredate', array('style'=>'width: auto')); ?><span class="star">*</span>
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
