<script type="text/javascript">
    function Delete_Inspection_Time(id){
        $.ajax({
            type: "GET",
            url: 'addproperty_step4/mode/DELETE/id/' + id,
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
                data: $('#addproperty4-form').serialize(),
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
        <!---------( For Home Sales )------------------>
        <?php if ($model->property0->type == 1){  ?>
            <h3 style="margin-top: 0;">Add a Home Sales Listing</h3>
        <?php } ?>
        <!---------( End Home Sales )------------------>
        <!---------( For Land Sales )------------------>
        <?php if ($model->property0->type == 2){  ?>
            <h3 style="margin-top: 0;">Add a Land Sales Listing</h3>
        <?php } ?>
        <!---------( End Land Sales )------------------>
        <!---------( For Rental )------------------>
        <?php if ($model->property0->type == 3){  ?>
            <h3 style="margin-top: 0;">Add a Rental Listing</h3>
        <?php } ?>
        <!---------( End Rental )------------------>
        <!---------( For Commercial Sales )------------------>
        <?php if ($model->property0->type == 4){  ?>
            <h3 style="margin-top: 0;">Add a Commercial Sales Listing</h3>
        <?php } ?>
        <!---------( End Commercial Sales)------------------>
        <!---------( For Commercial Leased)------------------>
        <?php if ($model->property0->type == 5){  ?>
            <h3 style="margin-top: 0;">Add a Commercial Leased Listing</h3>
        <?php } ?>
        <!---------( End Commercial Leased)------------------>
    </div>
    <div style="text-align: center;">
        <div>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab4.png" style="width: 942px; height: 37px;">
        </div>
    </div>
    <div style="padding: 10px; 0">
        <p style="font-size: 11px;">Mandatory information is marked with an asterisk *</p>
    </div>
    <div id="form" class="form">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id'=>'addproperty4-form',
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
                                'id' => 'pickdate',
                                'attribute'=>'date',
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
                                'id' => 'pickstarttime',
                                'attribute'=>'starttime',
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
                                'id' => 'pickendtime',
                                'attribute'=>'endtime',
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
                    <p style="font-size: 14px; font-weight: bold">Activation of your Property Advertisement</p>
                    <p>
                        Please note that in order to maintain our quality of service, we will review and authorize each submitted advertisement before it going live.
                        We will make sure your advertisement will be published and go live within next 24 hours. If you have any question please <a href="site/contact">contact us</a> here.
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="span8" style="padding-bottom: 10px;">
                <div class="control-group-admin-btn">
                    <div class="span12" style="padding-top: 5px;">
                        <?php echo CHtml::submitButton('Save & Publish', array('class' => 'btn btn-primary')); ?>
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
