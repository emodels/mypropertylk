
<script type="text/javascript">

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

</script>
<style type="text/css">

    .list-view .summary {
        display: none;
    }

    .list-view .empty {
        display: none;
    }

</style>
<?php
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
    'Register',
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
                                <div class="property-list-title">Register</div>
                            </div>
                            <div class="span5 offset1">
                                <p class="alert alert-danger alertb">Please fill the following fields to register with myproperty.lk....!</p>
                                <div class="form">
                                    <?php $form=$this->beginWidget('CActiveForm', array(
                                        'id'=>'register-form',
                                        'enableClientValidation'=>true,
                                        'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                            'validateOnChange'=>true,
                                            'afterValidate' => 'js:formSend',
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
                                            
                                            <a href="<?php echo Yii::app()->baseUrl; ?>" class="btn btn-info">Cancel</a>
                                        </div>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            </div>
                            <div class="span5">
                                <div class="alert alert-success alert-block">
                                    <h4>Register as a Member</h4>
                                    You can publish your Property Advertisements under Standard, Featured or Premier category.
                                </div>
                                <div class="alert alert-info alert-block">
                                    <h4>Register as an Agent</h4>
                                    Become a Agent and you will able to publish large volume of Property advertisements within a short period using our Bulk Upload facility.
                                </div>
                                <div class="alert alert-warning">
                                    <h4>Register as an Advertiser</h4>
                                    You can publish Banner Advertisements at our web site. Simply select preferred Banner size, page location and enter URL link for your banner and then complete your payment using PAYPAL to activate instantly.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span3 hidden-phone">
                        <div class="row-fluid">
                            <?php

                            $condition = '(page = 7 AND (size = 2 OR size = 4 OR size = 6) AND status = 1) AND expiredate >= CURDATE()';

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

