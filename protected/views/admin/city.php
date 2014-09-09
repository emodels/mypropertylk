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
                    )
                )); ?>
                <input type="submit" id="DeleteButton" name="DeleteButton" value="Delete Selected Cities"/>
                <?php echo CHtml::dropDownList('Selected_District', $selected_district, CHtml::listData(District::model()->findAll(), 'id', 'name'), array('empty'=>'Select District', 'onChange'=>'js:$("form").submit();')); ?>
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'grid_city',
                    'dataProvider' => $dataProvider,
                    'ajaxUpdate' => false,
                    'enablePagination' => true,
                    'selectableRows' => 2,
                    'columns' => array(
                        array(
                            'type'=>'raw',
                            'name'=>'District',
                            'value'=>'$data->district . " or adjoining District in same Province"'
                        ),
                        array(
                            'name'=>'City',
                            'value'=>'$data->name'
                        ),
                        array(
                            'id' => 'selectedIds',
                            'class' => 'CCheckBoxColumn'
                        ),
                    )));
                ?>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>