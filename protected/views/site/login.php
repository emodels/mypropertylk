<style type="text/css">

    .list-view .summary {
        display: none;
    }

    .list-view .empty {
        display: none;
    }

</style>
<script type="text/javascript">

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function RequestPassword() {

        $('#error_request_password').html('');
        $('#success_request_password').hide();
        $('#ajax_progress').hide();

        var email = $('#email').val();

        if (email !== '') {

            if (!IsEmail(email)) {

                $('#error_request_password').html('Please enter valid email address');
                return;
            }

            $.ajax({
                url: "site/Requestpassword",
                type: "POST",
                data: { email : email },
                dataType: 'json',
                beforeSend: function() {

                    $('#ajax_progress').show();
                },
                success: function (data) {

                    if (data.status == 1) {

                        $('#success_request_password').show();

                    } else {

                        $('#error_request_password').html('Email address not found in our records, please enter valid email address');
                    }
                },
                complete: function () {

                    $('#ajax_progress').hide();
                }
            });

        } else {

            $('#error_request_password').html('Email address can not be blank');
        }
    }
</script>
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
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
                                <div class="property-list-title">Login</div>
                            </div>
                            <div class="span12 offset1">
                                <div class="container-fluid">
                                    <div class="row-fluid">
                                        <div class="span5">
                                            <div class="form" style="padding-top: 10px;">
                                                <?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'login-form',
                                                    'enableClientValidation'=>true,
                                                    'clientOptions'=>array(
                                                        'validateOnSubmit'=>true,
                                                    ),
                                                    'htmlOptions'=>array('class'=>'form-horizontal'),
                                                    'focus'=>array($model,'username')
                                                )); ?>

                                                <div class="control-group">
                                                    <div class="input-prepend">
                                                        <span class="add-on"><i class="icon-user"></i></span>
                                                        <?php echo $form->textField($model,'username', array('placeholder'=>'Username', 'style' => 'width:auto !important')); ?>
                                                    </div>
                                                    <?php echo $form->error($model,'username'); ?>
                                                </div>
                                                <div class="control-group">
                                                    <div class="input-prepend">
                                                        <span class="add-on"><i class="icon-lock"></i></span>
                                                        <?php echo $form->passwordField($model,'password', array('placeholder'=>'Password', 'style' => 'width:auto !important')); ?>
                                                    </div>
                                                    <?php echo $form->error($model,'password'); ?>
                                                </div>
                                                <div class="control-group">
                                                    <div>
                                                        <?php echo $form->checkBox($model,'rememberMe', array('class' => 'checkbox inline')); ?>
                                                        <?php echo $form->label($model,'rememberMe', array('class' => 'checkbox inline', 'style'=> 'margin:-10px')); ?>
                                                    </div>
                                                    <?php echo $form->error($model,'rememberMe'); ?>
                                                </div>
                                                <div class="control-group">
                                                    <div class="span1" style="margin-left: 0px;">
                                                        <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
                                                    </div>
                                                    <div class="span-3" style="margin-left: 10px; padding-top: 5px;">
                                                        Not a Member? <a href="<?php echo Yii::app()->request->baseUrl; ?>/register">Register</a>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <a href="javascript:$('#password_request').toggle();">Forgot Your Password ?</a>
                                                </div>
                                                <div id="password_request" class="well" style="padding: 5px 25px 5px 25px; display: none">
                                                    <h5>Enter your email address</h5>
                                                    <div class="control-group">
                                                        <div class="input-prepend">
                                                            <span class="add-on"><i class="icon-envelope"></i></span>
                                                            <?php echo CHtml::textField('email','', array('placeholder'=>'Your Email Address', 'style' => 'width:auto !important')); ?>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <?php echo CHtml::Button('Request Password', array('class' => 'btn btn-primary', 'onClick' => 'js:RequestPassword();')); ?>
                                                    </div>
                                                    <label id="error_request_password" class="errorMessage"></label>
                                                    <label id="success_request_password" class="hide" style="color: green">Your password has been sent to your email address.</label>
                                                    <label id="ajax_progress" class="hide" style="color: blue"><img src="images/loading.gif"/> Please wait...</label>
                                                </div>
                                                <?php $this->endWidget(); ?>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="panel panel-default">
                                                <div class="alert alert-info"  style="padding: 20px">
                                                    <h4>Before <b>POST YOUR FREE AD</b> you need to Login first...!!</h4><br/>
                                                    If you are not a <b>Registered Member of 'myproperty.lk'</b> click here to Register Now..!
                                                    <br/><br/>
                                                    <div class="text-center">
                                                        <a class="btn btn-info" href="<?php echo Yii::app()->request->baseUrl; ?>/register">Register</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span3 hidden-phone">
                        <div class="row-fluid">
                            <?php

                            $condition = '(page = 6 AND (size = 2 OR size = 4) AND status = 1) AND expiredate >= CURDATE()';

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

