<script type="text/javascript" xmlns="http://www.w3.org/1999/html">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_adv').addClass('active');
        $('.img-prev').click(function () {
            $('#modal-img').attr('src',$(this).attr('data-href'));
            $('#myModal').modal();
        });
    });

    //---------------Form Send Function----//

    function formSend(form, data, hasError){

        if ($('#Adprice_adsample').val() != ''){

            var path = $('#Adprice_adsample').val();
            var arrSplit = path.split('.');
            var extension = arrSplit[1].toLowerCase();

            if ($.inArray(extension, ['jpg','jpeg','png','gif']) == -1) {

                alert('Invalid Image File Type');
                hasError = true;
            }
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
<div class="col_right" style="padding-top: 0;">
    <div class="span12" style="border-bottom: solid 1px silver">
        <div class="span12">
            <h3>Add Prices</h3>
        </div>
    </div>
    <div class="span12" style="margin-left: 0;">
        <div class="form">
            <?php $form = $this->beginWidget('CActiveForm', array(
                'id'=>'addprice-form',
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
                    <?php echo $form->textField($model,'price', array('placeholder'=>'Price')); ?>
                    <?php echo $form->error($model,'price'); ?><span class="star">*</span>
                </div>
                <div class="control-group-admin">
                    <label>Select an Advertisement Sample Image</label>
                    <div>
                        <?php echo $form->fileField($model, 'adsample'); ?>
                    </div>
                </div>
                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Add', array('class' => 'btn btn-primary')); ?>
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
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>
