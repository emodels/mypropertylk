<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_uplaod').addClass('active');

        $('#bulkupload-form').submit(function() {

            if ($('#zipfile').val() == '') {

                alert('Please enter ZIP file to upload');
                return false;

            } else {

                $('#waitModalWindow').modal({ keyboard: false });
                return true;
            }
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
            <?php if (count($warningsArray) > 0){ ?>
            <div class="span11">
                <h4>Following errors are encountered during bulk upload process</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Property ID #</th>
                            <th style="text-align: center">Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($warningsArray as $value) { ?>
                            <tr class="<?php echo $value->type; ?>">
                                <td><?php echo $value->id; ?></td>
                                <td style="text-align: center"><?php echo ($value->type == 'warning') ? '<i style="color: orange" class="icon-exclamation-sign"></i>' : '<i style="color: #ff0000" class="icon-warning-sign"></i>'; ?></td>
                                <td><?php echo $value->desc; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
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
                            <li>Property images must be 800px X 600px scale</li>
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
                            <div><?php echo CHtml::submitButton('Upload ZIP file and Import Property Information', array('class' => 'btn btn-primary')); ?></div>
                        </div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="waitModalWindow" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Bulk Upload in progress...</h3>
    </div>
    <div class="modal-body">
        <h6 class="text-center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/loading.gif" style="padding-right: 10px"/> Please wait and do not close or refresh your browser window...</h6>
    </div>
</div>