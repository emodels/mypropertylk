<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_editprof').addClass('active');
    });

    //---------------Form Send Function----//

    function formSend(form, data, hasError){

        if ($('#User_userimage').val() != ''){

            var path = $('#User_userimage').val();
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
                            'validateOnChange'=>true,
                            'afterValidate' => 'js:formSend',
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
                                echo CHtml::image(Yii::app()->controller->createUrl('upload/userimages/'.$model->userimage), "No Image",array('style'=>'width:90pxs; height:90px; border:solid 1px silver;'));
                            }
                            ?>
                            <div style="margin-bottom: 0; padding: 8px; margin-top: 10px; color: rgba(128, 0, 0, 0.57); background-color: rgba(255, 149, 132, 0.44); border: solid 1px rgba(177, 41, 36, 0.50); border-radius: 5px;">
                                <strong>Warning!</strong><br/> Please check your Profile Image width and height is 90px and 100px before uploading ...!
                            </div>
                        </div>
                        <div class="control-group">
                            <div>
                                <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
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
    </div>
</div>
