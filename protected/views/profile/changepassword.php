<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_home').addClass('active');
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
                <h3>Change Your Password</h3>
            </legend>
            <div class="span12 offset1">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'changepwd-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                            'validateOnChange'=>true
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal')
                    )); ?>
                    <div>
                        <div class="control-group">
                            <div class="input-prepend">
                                <?php echo $form->passwordField($model,'password', array('placeholder'=>'Current Password')); ?>
                            </div>
                            <?php echo $form->error($model,'password'); ?>
                        </div>
                        <div class="control-group">
                            <div class="input-prepend">
                                <?php echo $form->passwordField($model,'password', array('placeholder'=>' New Password')); ?>
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
