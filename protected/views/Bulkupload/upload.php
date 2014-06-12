<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_editprof').addClass('active');

        $('#btn_import').click(function () {
            $.ajax({
                type: 'POST',
                url: 'upload/import/true',
                data: $('#bulkupload-form').serialize(),
                success: function(data){
                    if (data == 'done'){
                        alert('done');
                    } else {
                        alert(data);
                    }
                }
            });
        });
    });
</script
<?php
$this->pageTitle=Yii::app()->name . ' - Bulk Upload';
$this->breadcrumbs=array(
    'Bulk Upload',
);
?>
<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="content-holder">
            <legend>
                <h3>Bulk Upload</h3>
            </legend>
            <div class="span10">
                <div class="form">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'bulkupload-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                            'validateOnSubmit'=>true,
                            'validateOnChange'=>true
                        ),
                        'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data','style'=>'margin:0px')
                    )); ?>
                    <div class="span11">
                        <h5 class="text-warning">Make sure following criteria meets, before you upload and import new properties</h5>
                        <div class="alert alert-block">
                            <li>Do NOT include previously uploaded, existing property information in Excel sheet</li>
                            <li>Excel file should be name exactly as "property" and format must be ".xlsx"</li>
                            <li>Make sure images are kept in separate folder named with appropriate property ID</li>
                            <li>Do NOT include large scale high resolution images and maximum 800px X 600px scale recommended</li>
                        </div>
                        <?php if (Yii::app()->user->usertype == 0) { ?>
                        <div class="control-group">
                            <label>Property Owner</label>
                            <?php echo CHtml::dropDownList('user', $user_id, CHtml::listData(User::model()->findAll('usertype = 0 OR usertype = 2'), 'id', 'fname')); ?>
                        </div>
                        <?php } ?>
                        <div class="control-group">
                            <label>Upload ZIP file</label>
                            <?php echo CHtml::fileField('zipfile');?>
                        </div>
                        <div class="control-group">
                            <div>
                                <?php echo CHtml::submitButton('Upload ZIP file', array('class' => 'btn btn-primary')); ?>
                                &nbsp;
                                <?php echo CHtml::button('Import Property Information', array('class' => 'btn btn-primary', 'id'=>'btn_import', 'disabled'=> ($enable_import ? '' : 'disabled'))); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
