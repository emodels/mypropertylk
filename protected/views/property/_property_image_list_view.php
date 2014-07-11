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
                <div class="prop-img-upload">
                    <img src="<?php echo Yii::app()->baseUrl . '/upload/propertyimages/'.$data->imagename; ?>" style="width: 107px; height: 107px;"/>
                </div>
                <div class="span12" style="padding-top: 5px; margin-left: 0; padding-left: 10px;">
                    <div class="row-fluid">
                        <div class="span6" style="">
                            <a href="javascript:Delete_Image(<?php echo $data->id; ?>);" style="text-decoration: none; cursor: default;" title="remove"><i class="icon-trash icon_gap"></i></a>
                        </div>
                        <div class="span5" style="text-align: right">
                            <a href="javascript:SetPrimary_Image(<?php echo $data->id; ?>);" style="text-decoration: none; cursor: default;" title="set as primary"><i class="icon-picture icon_gap"></i></a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </a>
</div>

