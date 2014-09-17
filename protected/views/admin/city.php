<style type="text/css">
    .listing-row{
        height: 80px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-stacked a').removeClass('active');
        $('#admin_city').addClass('active');
    });

    function ValidateCSVFile() {

        if ($('#csv').val() == '') {

            alert('Please select CSV file');
            return false;

        } else if ($('#csv').val().indexOf(".csv") <= -1) {

            alert('Selected file does not have ".csv" extension');
            return false;

        } else {

            return true;
        }
    }
</script>

<div class="col_right" style="padding-top: 0;">
    <div class="span12">
        <div class="span12">
            <legend>
                <h3>City List</h3>
            </legend>
        </div>
    </div>
    <div class="span12" style="margin-left: 0 ">
        <div class="container row-fluid span12">
            <div class="form">
                <?php $form = $this->beginWidget('CActiveForm', array(
                    'id'=>'form-city-list',
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                        'validateOnChange' => true,
                    ),
                    'htmlOptions' => array('enctype' => 'multipart/form-data')
                )); ?>
                <?php echo CHtml::dropDownList('Selected_District', $selected_district, CHtml::listData(District::model()->findAll(), 'id', 'name'), array('empty'=>'Select District', 'onChange'=>'js:$("form").submit();')); ?>
                <?php echo CHtml::dropDownList('Selected_Status', $selected_status, array('0'=>'InActive','1'=>'Active'), array('empty'=>'Select Status', 'onChange'=>'js:$("form").submit();')); ?>
                <div class="well" style="margin-top: 10px">
                    <label>CSV File :</label>
                    <input type="file" id="csv" name="csv"/>
                    <input type="submit" id="ActivationButton" name="ActivationButton" value="Activate Cities in CSV file" onclick="javascript:return ValidateCSVFile();"/>
                </div>
                <?php if(count($activated_city_list) > 0){ ?>
                    <div class="well" style="background-color: #edffa0">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Following Cities are Activated :</h4>
                        <?php foreach($activated_city_list as $city){ ?>
                            <div><?php echo $city->name; ?></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'grid_city',
                    'dataProvider' => $dataProvider,
                    'ajaxUpdate' => false,
                    'enablePagination' => true,
                    'columns' => array(
                        array(
                            'type'=>'raw',
                            'name'=>'District',
                            'value'=>'$data->district . " or adjoining District in same Province"'
                        ),
                        array(
                            'name'=>'City',
                            'value'=>'$data->name'
                        )
                    )));
                ?>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>