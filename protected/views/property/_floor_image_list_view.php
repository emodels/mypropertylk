<style type="text/css">
    .qq-upload-list {
        display: none;
    }
    .list-view .summary {
        display: none;
    }
</style>
<div style="text-align: left; float: left; padding-top: 10px;">
    <a href="#">
        <ul style="float: left;">
            <li>
                <div>
                    <img class="prop-img-upload" src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'.$data->imagename; ?>" style="padding: 3px; width: 107px; height: 107px; <?php echo (($data->primaryimg == 1) ? 'border:dashed 2px #990000;' : '') ?>"/>
                </div>
                <div class="span12" style="padding-top: 5px; margin-left: 0; padding-left: 10px; color: #">
                    <div class="row-fluid">
                        <div class="span6" style="">
                            <a href="javascript:Delete_Image(<?php echo $data->id; ?>);" style="text-decoration: none;" title="remove"><i class="icon-trash icon_gap"></i></a>
                        </div>
                        <div class="span5" style="text-align: right">
                            <a href="javascript:SetPrimary_Image_Floor(<?php echo $data->id; ?>);" style="text-decoration: none;" title="set as primary"><i class="icon-picture icon_gap"></i></a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </a>
</div>

