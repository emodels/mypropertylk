<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    //---------------Form Send Function----//

    function formSend(form, data, hasError){

        if ($('#Homeideas_imagename').val() != ''){

            var path = $('#Homeideas_imagename').val();
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
    <div>
        <h3 style="margin-top: 0; border-bottom: solid 1px silver">Add Home Ideas</h3>
    </div>

    <div id="form" class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'addhomeideas-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data'),
        )); ?>
        <div>
            <div class="span12">
                <div class="form_bg control-group-admin">
                    <?php
                    $array_category = array(1 => 'Livingrooms',
                                            2 => 'Diningrooms',
                                            3 => 'Bedrooms',
                                            4 => 'Bathrooms',
                                            5 => 'Kitchens',
                                            6 => 'Outdoor',
                                            7 => 'Pools',
                                            8 => 'Gardens',
                                            9 => 'Facades');
                    ?>
                    <?php echo $form->dropDownList($model, 'category', $array_category, array('empty'=>'Category')); ?><span class="star">*</span>
                    <?php echo $form->error($model, 'category', array('style'=>'width: auto')); ?>
                </div>
                <div class="form_bg control-group-admin">
                    <div class="control-group">
                        <label>Home Idea Image <span class="star">*</span></label>
                        <?php echo $form->fileField($model, 'imagename'); ?>
                    </div>
                    <?php echo $form->error($model,'imagename'); ?>
                </div>
                <div class="form_bg control-group-admin">
                    <div class="control-group">
                        <?php echo $form->textField($model,'title', array('placeholder'=>'Image Title', 'class' => 'span8')); ?><span class="star">*</span>
                    </div>
                    <?php echo $form->error($model,'title'); ?>
                </div>
            </div>
        </div>
        <div>
            <div class="span8" style="padding-bottom: 10px;">
                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Add Home Ideas', array('class' => 'btn btn-primary')); ?>
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
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
