<script type="text/javascript">
    function Delete_Inspection_Time(id){
        $.ajax({
            type: "GET",
            url: 'editproperty_step4/mode/DELETE/id/' + id,
            success: function(data){
                if (data == 'done'){
                    $.fn.yiiListView.update('list_inspect_time');
                } else {
                    alert(data);
                }
            }
        });

    }

    function AddInspectionTime() {
        var isValid = true;

        if ($('#Inspecttime_date').val() == ''){

            $('#Inspecttime_date').parent().removeClass('success').addClass('error');
            $('#Inspecttime_date').parent().next('.errorMessage').html('Inspection Date can not be blank').css('display','block');
            isValid = false;

        } else {

            $('#Inspecttime_date').parent().removeClass('error').addClass('success');
            $('#Inspecttime_date').parent().next('.errorMessage').html('').css('display','none');
        }

        if ($('#Inspecttime_starttime').val() == ''){

            $('#Inspecttime_starttime').parent().removeClass('success').addClass('error');
            $('#Inspecttime_starttime').parent().next('.errorMessage').html('Start Time can not be blank').css('display','block');
            isValid = false;

        } else {

            $('#Inspecttime_starttime').parent().removeClass('error').addClass('success');
            $('#Inspecttime_starttime').parent().next('.errorMessage').html('').css('display','none');
        }

        if ($('#Inspecttime_endtime').val() == ''){

            $('#Inspecttime_endtime').parent().removeClass('success').addClass('error');
            $('#Inspecttime_endtime').parent().next('.errorMessage').html('End Time can not be blank').css('display','block');
            isValid = false;

        } else {

            $('#Inspecttime_endtime').parent().removeClass('error').addClass('success');
            $('#Inspecttime_endtime').parent().next('.errorMessage').html('').css('display','none');
        }

        if (isValid) {

            $.ajax({
                type: "POST",
                data: $('#editproperty4-form').serialize(),
                success: function(data){
                    if (data == 'done'){
                        $.fn.yiiListView.update('list_inspect_time');
                    } else {
                        alert(data);
                    }
                }
            });
        }
    }
</script>
<style type="text/css">
    .list-view .summary
    {
        margin: 0 0 0px 0;
    }
</style>
<div class="col_right" style="padding-top: 0;">
    <div>
        <h3 style="margin-top: 0;">Edit Property</h3>
    </div>
    <div class="edit-header">
        <h1 id="listing-address-title"><?php echo $model->property0->headline ?></h1>
        <h2 id="listing-address-subtitle"><?php echo $model->property0->number . ',' . $model->property0->streetaddress . ','. $model->property0->areaname . ',' . $model->property0->townname ?></h2>
        <?php
        $imgname = "";

        if (count($model->property0->propertyimages) > 0) {

            foreach ($model->property0->propertyimages as $value) {

                if ($value->primaryimg == 1 && $value->imagetype == 0) {

                    $imgname = $value->imagename;
                }
            }

            if ($imgname != "") {?>

                <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $imgname ?>" class="listing-background-image">

            <?php
            } else{ ?>

                <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/' . $model->property0->propertyimages[0]->imagename ?>" class="listing-background-image">

            <?php
            }
        } else{ ?>

            <img src="<?php echo Yii::app()->baseUrl;?> . /upload/propertyimages/prop_no_img.jpg" class="listing-background-image">
        <?php } ?>
    </div>
    <div style="text-align: center;">
        <div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab4.png" style="width: 942px; height: 37px;">
        </div>
    </div>
    <div style="padding: 10px; 0">
        <p style="font-size: 11px;">Mandatory information is marked with an asterisk *</p>
    </div>
    <div id="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'editproperty4-form',
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'afterValidate' => 'js:formSend',
            ),
            'htmlOptions'=>array('class'=>'form-horizontal', 'enctype' => 'multipart/form-data'),
        )); ?>
        <legend>
            Create Inspection Times
        </legend>
        <div>
            <div class="span12" style="padding-bottom: 20px;">
                <div class="form_bg span">
                    <div class="control-group-admin span">
                        <div class="span3">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model'=>$model,
                                'attribute'=>'date',
                                'id' => 'pickdate',
                                'language' => 'en-GB',
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    'dateFormat'=>'yy-mm-dd',
                                    'changeMonth' => 'true',
                                    'changeYear' => 'true',
                                    'constrainInput' => 'false',
                                    'yearRange' => 'c-15:c+15'
                                ),
                                'htmlOptions'=>array(
                                    'class'=>'span8',
                                    'readonly'=>'readonly'
                                ),
                            ));
                            ?>
                            <label>Pick a Date</label>
                        </div>
                        <div class="span3">
                            <?php
                            $this->widget('ext.jui.EJuiDateTimePicker', array(
                                'model'=>$model,
                                'attribute'=>'starttime',
                                'id' => 'pickstarttime',
                                'mode'    => 'time',
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    'timeFormat' => 'hh:mm tt',//'hh:mm tt' default
                                ),
                                'htmlOptions'=>array(
                                    'class'=>'span6',
                                    'readonly'=>'readonly'
                                ),
                            ));
                            ?>
                            <label>Star Time</label>
                        </div>
                        <div class="span3">
                            <?php
                            $this->widget('ext.jui.EJuiDateTimePicker', array(
                                'model'=>$model,
                                'attribute'=>'endtime',
                                'id' => 'pickendtime',
                                'mode'    => 'time',
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    'timeFormat' => 'hh:mm tt',//'hh:mm tt' default
                                ),
                                'htmlOptions'=>array(
                                    'class'=>'span6',
                                    'readonly'=>'readonly'
                                ),
                            ));
                            ?>
                            <label>End Time</label>
                        </div>
                        <div class="span3">
                            <?php echo CHtml::button('Add', array('class' => 'btn btn-primary', 'onClick' => 'js:AddInspectionTime();')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span12" style="margin-left: 0; margin-bottom: 10px;">
                <div style="background-color: #E6E6E6; border: solid 1px silver; color: #C21814; margin: 0; line-height: 28px; font-weight: bold; border-top-left-radius: 5px; border-top-right-radius: 5px; text-align: center;">Open for Inspection Times</div>
                <?php
                $this->widget('zii.widgets.CListView', array(
                    'id' => 'list_inspect_time',
                    'dataProvider' => new CActiveDataProvider('Inspecttime', array('criteria'=>array('condition'=>'property=' . $model->property0->pid , 'order' => 'date ASC'), 'pagination' => false)),
                    'itemView' => '_inspect_time_view',
                    'summaryText'=> ''
                ));
                ?>
            </div>
        </div>
        <div>
            <div class="span12">
                <div class="box-info">
                    <p style="font-size: 14px; font-weight: bold">Display inspections in Saturday's Herald Sun*</p>
                    <p>
                        Weekend Open for Inspections, loaded before 5pm every Monday will automatically appear*.
                        There will also be a number of properties selected to be featured with photo and full details.
                        Reach the readers of Sri Lanka's biggest-selling newspaper at no cost.
                    </p>
                    <p>
                        *Please note: Open for Inspection times will be displayed subject to the availability of advertising space.
                        Herald Sun does not guarantee that all properties will appear in the Weekend Open for Inspection section
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="span8" style="padding-bottom: 10px;">
                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Save & Publish', array('class' => 'btn btn-primary')); ?>
                        <?php echo CHtml::submitButton('Cancel', array('class' => 'btn btn-info')); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
</div>
