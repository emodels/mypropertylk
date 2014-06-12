<div data-id="<?php echo $data->id; ?>" style="margin-left: 0px; padding-bottom: 10px; text-align: center; background-color: #f7f7f7; border: solid 1px silver; border-top: none; " class="container row-fluid span listing-row">
    <div class="span4">
        <?php echo Yii::app()->dateFormatter->formatDateTime($data->date, 'full', null); ?>
    </div>
    <div class="span4">
        <?php echo Yii::app()->dateFormatter->formatDateTime($data->starttime, null, 'short'). ' - '. Yii::app()->dateFormatter->formatDateTime($data->endtime, null, 'short'); ?>
    </div>
    <div class="span3">
        <a href="javascript:Delete_Inspection_Time(<?php echo $data->id; ?>);" title="delete" style="font-size: 16px; text-decoration: none; color: #ff0000;"><i class="icon-remove icon_gap"></i></a>
    </div>
</div>

