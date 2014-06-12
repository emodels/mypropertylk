<div data-id="<?php echo $data->id; ?>" style="margin-left: 0px; font-size: 12px; min-height: 0; padding: 5px 0 0 0; margin-bottom: 0; text-align: center; background-color: #f7f7f7; border: solid 1px silver; border-top: none; " class="container row-fluid span">
    <div class="span6" style="text-align: left; padding-left: 20px;">
        <?php echo Yii::app()->dateFormatter->format('EEE, dd MMM yyyy', $data->date); ?>
    </div>
    <div class="span6">
        <?php echo Yii::app()->dateFormatter->formatDateTime($data->starttime, null, 'short'). ' - '. Yii::app()->dateFormatter->formatDateTime($data->endtime, null, 'short'); ?>
    </div>
</div>

